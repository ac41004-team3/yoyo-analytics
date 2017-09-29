<script>
    import {Pie} from 'vue-chartjs';

    export default Pie.extend({
        mounted() {
            // Overwriting base render method with actual data.
            this.renderChart({
                labels: [
                    'January',
                    'February',
                    'March',
                    'April',
                    'May',
                    'June',
                    'July',
                    'August',
                    'September',
                    'October',
                    'November',
                    'December'],
                datasets: [
                    {
                        label: 'GitHub Commits',
                        backgroundColor: '#b84f57',
                        data: [40, 20, 12, 39, 10, 40, 39, 80, 40, 20, 12, 11],
                    },
                    {
                        label: 'BitBucket',
                        backgroundColor: '#2bb9a9',
                        data: [12, 23, 13, 28, 26, 23, 24, 57, 63, 41, 21, 12],
                    },
                    {
                        label: 'SVN',
                        backgroundColor: '#3f3aa9',
                        data: [122, 234, 130, 282, 262, 213, 214, 517, 163, 141, 121, 142],
                    },
                ],
            });
        },

    });
</script>