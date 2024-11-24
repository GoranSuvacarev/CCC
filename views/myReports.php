<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="chart">
                    <div id="number-of-reservations-per-month-canvas">
                        <canvas id="number-of-reservations-per-month"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 634px;"
                                class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        generateNumberOfReservationsPerMonth();
        //getPricePerMonth();
    });

    function generateNumberOfReservationsPerMonth() {
        let url = `/getNumberOfReservationsPerMonth`;

        $.getJSON(url, function (result) {
            let labels = result.map(function (e) {
                return e.month;
            });

            let values = result.map(function (e) {
                return e.number_of_reservations;
            });

            let setData = {
                labels: labels,
                datasets: [
                    {
                        label: "Number of reservations per month",
                        data: values
                    }]
            }

            let options = {}

            let graph = $("#number-of-reservations-per-month").get(0).getContext('2d');

            createGraph(setData, graph, 'bar', options);
        });
    }
    function createGraph(setData, graph, chartType, options) {
        new Chart(graph, {
            type: chartType,
            data: setData,
            options: options
        });
    }
</script>
