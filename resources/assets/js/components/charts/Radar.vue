<script>
    import {Radar, mixins} from 'vue-chartjs';

    export default Radar.extend({
        mixins: [mixins.reactiveProp],
        props: ['chartData', 'options'],
        mounted() {
            this.renderChart(this.chartData, this.options);
        },

    });
</script>