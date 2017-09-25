<template>
    <div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Chart Options</h3>
                </div>
                <div class="panel-body">
                    <select v-model="chart">
                        <option disabled value="">Please select one</option>
                        <option value="line">Line Graph</option>
                        <option value="bar">Bar Chart</option>
                        <option value="pie">Pie Chart</option>
                        <option value="radar">Radar Chart</option>
                    </select>
                    <select v-model="type">
                        <option disabled value="">Please select one</option>
                        <option value="quantity"># Transactions</option>
                        <option value="takings">£ Transactions</option>
                        <option value="average">Avg £/Transaction</option>
                    </select>
                    <!--<ul>-->
                    <!--<li v-for="outlet in outlets">-->
                    <!--<label><input type="checkbox" :name="'select-' + outlet.id"-->
                    <!--v-model="outlet.checked"/>{{ outlet.name }}</label>-->
                    <!--</li>-->
                    <!--</ul>-->
                    <div>
                        From:
                        <datepicker v-model="date.from"></datepicker>
                        To:
                        <datepicker v-model="date.to"></datepicker>
                    </div>
                    <button @click="load">Load</button>

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ moment(date.from).format('Do MMM[,] YYYY') }} to {{ moment(date.to).
                        format('Do MMM[,] YYYY') }}</h3>
                </div>
                <div class="panel-body">
                    <LineChart v-if="chart == 'line'" :chartData="collection" :options="options"></LineChart>
                    <BarChart v-if="chart == 'bar'" :chartData="collection" :options="options"></BarChart>
                    <PieChart v-if="chart == 'pie'" :chartData="collection" :options="options"></PieChart>
                    <RadarChart v-if="chart == 'radar'" :chartData="collection" :options="options"></RadarChart>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import LineChart from './charts/Line.vue';
    import BarChart from './charts/Bar.vue';
    import PieChart from './charts/Pie.vue';
    import RadarChart from './charts/Radar.vue';

    import axios from 'axios';
    import moment from 'moment';

    export default {
        components: {LineChart, BarChart, PieChart, RadarChart},
        props: {
            outlets: {
                type: Array,
            },
        },
        data() {
            return {
                pos: 0,
                collection: [],
                options: [],
                type: 'quantity',
                chart: 'line',
                date: {
                    from: this.moment().subtract(5, 'week').format(),
                    to: this.moment().add(-3, 'week').format(),
                },
            };
        },
        mounted() {
            this.load();
        },
        methods: {
            load() {
                axios.post(this.uri()).then(response => {
                    this.collection = response.data.data;
                    this.options = response.data.options;
                });
            },
            ids() {
                var ids = [];
                this.outlets.forEach(outlet => {
                    ids.push(outlet.id);
                });
                return ids;
            },
            moment(date) {
                return moment(date);
            },
            uri() {
                return '/api/charts?outlets=' + this.ids()
                    + '&chart=' + encodeURIComponent(this.chart)
                    + '&type=' + encodeURIComponent(this.type)
                    + '&from=' + encodeURIComponent(this.moment(this.date.from).format())
                    + '&to=' + encodeURIComponent(this.moment(this.date.to).format());
            },
        },
    };
</script>