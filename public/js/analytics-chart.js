window.onload = function() {
    var outlets = $.getJSON($(location).attr('host') + '/outlets'); //Example, array of outlets
    var transactions = $.getJSON($(location).attr('host') + '/transactions');
    var customers = $.getJSON($(location).attr('host') + '/customers');

    var currentChart = { //Object which holds data on current chart, modify using setter methods
        type: null,
        metric: null,
        user: 'None',
        tribe: 0,
        timePeriod: [], //Lower Bound, Now
        periodDefinition: null,
        outlets: []
    };

    var barChartData = {//each dataset will be a different outlet essentially
        labels: [],
        datasets: []
    };

    var startDatePicker = new Pikaday({
        field: document.getElementById('StartDate'),
        maxDate: moment().toDate(),
        onSelect: function() {
            currentChart.timePeriod[0] = this.getMoment().add(1,'hours');
        }
    });

    var endDatePicker = new Pikaday({
        field: document.getElementById('EndDate'),
        maxDate: moment().toDate(),
        onSelect: function() {
            currentChart.timePeriod[1] = this.getMoment().add(24, 'hours');
        }
    });

    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'line',
        data: barChartData,
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
        }
    });

}

function changeChartType(chartType) {
    currentChart.type = chartType;
}

function addOutlet(outletID) {
    currentChart.outlets.indexOf(outletID) === -1 ? currentChart.outlets.push(outletID) : currentChart.outlets.splice(currentChart.outlets.indexOf(outletID), 1);
}

function setMetric(metric) {
    currentChart.metric = metric;
}

function setTribe(tribe) {
    if (currentChart.tribe === tribe) {
        currentChart.tribe = 0;
    }
    else {
        currentChart.tribe = tribe;
    }
}
function setUser(user) {
    currentChart.user = user;
}

//narrow function in the future?
function buildChart() {
    barChartData = {
        labels: [],
        datasets: []
    };
    var calculations = [];
    var labelSetup = [];
    for (i in currentChart.outlets) {
        calculations.push(calculateData(currentChart.outlets[i]));
    }
    var lowerBound = moment(currentChart.timePeriod[0]);
    while (lowerBound.isSameOrBefore(currentChart.timePeriod[1])) {
        labelSetup.push(lowerBound.format('YYYY-MM-DD'));
        lowerBound = lowerBound.add(1, 'days');
    }
    for (j in calculations) { //sep method
        switch (currentChart.type) {
            case 'bar':
            case 'doughnut':
            var dataList = {
                label: null,
                backgroundColor: getRandomColor(),
                borderColor: '#000000',
                data: []
            };
            break;
            case 'radar':
            case 'line':
            var dataList = {
                label: null,
                borderColor: getRandomColor(),
                data: []
            };
            break;
            default:
            console.log("something went wrong");
            break;
        }
        for (k in outlets) {
            if (outlets[k].id === currentChart.outlets[j]) {
                dataList.label = outlets[k].name;
            }
        }
        for (var key in calculations[j]) {
            if (calculations[j].hasOwnProperty(key)) {
                if (barChartData.labels.indexOf(key) === -1) {
                    if (typeof key !== "undefined") {
                        barChartData.labels.push(key);
                    }
                }
                dataList.data.push(calculations[j][key]);
            }
        }

        barChartData.datasets.push(dataList);
    }
    myChart.destroy();
    myChart = new Chart(ctx, {
    type: currentChart.type,
        data: barChartData,
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
        }
    });
}

function calculateData(currentOutletID) {
    var metricCalculation = {};
    var transactionList = [];
    var lastTime;
    var sum = 0;
    for (i in transactions) {
        if (moment(transactions[i].date).isSameOrAfter(currentChart.timePeriod[0]) && moment(transactions[i].date).isSameOrBefore(currentChart.timePeriod[1])) {
            if (transactions[i].outlet_id === currentOutletID) {
                switch (currentChart.tribe) {
                    case 1:
                    if (minutesOfDay(moment(transactions[i].date)) > minutesOfDay(moment('2013-01-01T20:00:00.000'))) {
                        transactionList.push(transactions[i]);
                    }
                    break;
                    case 2:
                    if (minutesOfDay(moment(transactions[i].date)) < minutesOfDay(moment('2013-01-01T09:00:00.000'))) {
                        transactionList.push(transactions[i]);
                    }
                    break;
                    case 3:
                    if (transactions[i].total / 100 > 15) {
                        transactionList.push(transactions[i]);
                    }
                    default:
                    transactionList.push(transactions[i]);
                    break;
                }
            }
        }
    }
    var lower = moment(currentChart.timePeriod[0]);
    while (lower.isSameOrBefore(currentChart.timePeriod[1])) {
        metricCalculation[lower.format("YYYY-MM-DD")] = 0;
        lower = lower.add(1, 'days');
    }
    var initDate = false;
    for (j in transactionList) {
        if (currentChart.user !== 'None') {
            if (transactionList[j].customer_id !== currentChart.user) {
                continue;
            }
        }
        if (initDate === false) {
            lastTime = moment(transactionList[j].date).format("YYYY-MM-DD");
            initDate = true;
        }
        if (lastTime !== moment(transactionList[j].date).format("YYYY-MM-DD")) {
            metricCalculation[lastTime] = sum;
            sum = 0;
        }
        switch (currentChart.metric) {
             case 1:
             sum += transactionList[j].total / 100;
             break;
             case 2:
             sum += transactionList[j].discount / 100;
             break;
             case 3:
             sum += transactionList[j].spent / 100;
             break;
             case 4:
             sum += 1;
             break;
             case 5:
             if (transactionList[j].type === "Redemption") {
                 sum += 1;
             }
             break;
             case 6:
             if (transactionList[j].type === "Payment") {
                 sum += 1;
             }
             break;
             default:
             break;
        }
        lastTime = moment(transactionList[j].date).format("YYYY-MM-DD");
    }
    if (sum > 0) {
         metricCalculation[lastTime] = sum;
    }
    return metricCalculation;
}

//SOURCE: https://stackoverflow.com/questions/1484506/random-color-generator
function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
function minutesOfDay(m) {
    return m.minutes() + m.hours() * 60;
}
