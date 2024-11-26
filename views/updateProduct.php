<div class='card'>
    <div class='card-body'>
        <div class='row'>
            <div class='col-md-6'>
                <div class='row'>
                    <div class='col-md-6'>
                        <label for='from'>From:</label>
                        <input type='date' class='form-control date-helper' placeholder='From' id='from'>
                    </div>
                    <div class='col-md-6'>
                        <label for='from'>To:</label>
                        <input type='date' class='form-control date-helper' placeholder='To' id='to'>
                    </div>
                </div>
                <div class='chart'>
                    <div id='price-per-user-canvas'>
                        <canvas id='price-per-user'
                                style='min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 634px;'
                                class='chartjs-render-monitor'></canvas>
                    </div>
                </div>
            </div>
            <div class='col-md-6'>
            </div>
        </div>
    </div>
</div>