<div x-data="{
    init() {
            let chart = this.initChart(this.$wire.dataset)

            this.$watch('dataset', () => {
                this.updateChart(chart, this.$wire.dataset)
            })
        },
        initChart(dataset) {
            const ctx = this.$wire.$el.querySelector('canvas');

            let { labels, values } = dataset;

            new Chart(ctx, {
                type: this.$wire.chartType,
                data: {
                    labels: labels,
                    datasets: [{
                        data: values,
                        borderWidth: 1
                    }]
                },
                options: this.$wire.options
            });
        },
        updateChart(chart, dataset) {
            let { labels, values } = dataset;

            chart.data.labels = labels;
            chart.data.datasets[0].data = values;
            chart.update;
        }
}">
    <div class="w-full h-[20rem] relative" wire:ignore>
        <canvas class="w-full"></canvas>
    </div>
</div>

@assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets
