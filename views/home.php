<?php

use app\core\Application;
use app\models\SuggestionModel;

?>

<section>
    <div class="text-center" data-bss-scroll-zoom="true" data-bss-scroll-zoom-speed="1" style="background-image: url(&quot;assets/img/Screenshot%202024-11-23%20202324.png&quot;);background-position: center;background-size: cover;">
        <div class="text-center d-flex flex-column justify-content-center align-items-center py-5 px-5 hero-content mt-0" data-bss-scroll-zoom="true" data-bss-scroll-zoom-speed="1" style="background-image: url(&quot;assets/img/Screenshot%202024-11-23%20202324.png&quot;);background-position: center;background-size: cover;">
            <h1 class="display-1" style="font-weight: bold;font-size: 46.64px;">compare computer components</h1>
            <p class="fs-3" style="font-weight: bold;">Graphics cards, processors, storage and more to come</p>
            <form role="form" method="post" action="/compare" class="text-center" style="width: 400px;">
                <div class="d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center"><input id="product1" class="bg-dark-subtle border rounded-pill form-control ms-0" type="search" placeholder="Type here to compare" style="width: 340px;height: 48px;padding-left: 10px;font-size: 20px;margin-right: 10px;"><input class="btn btn-primary" type="submit" value="Compare" style="margin-right: 0px;"></div>
                <ul id="suggestions1" class="list-group position-absolute mt-1" style="width: 340px; z-index: 1000;"></ul>
                <div id="secondProductBox" class="d-none mt-1"><input id="product2" class="bg-dark-subtle border rounded-pill form-control ms-0" type="search" placeholder="Type here to compare" style="width: 400px;height: 48px;padding-left: 10px;font-size: 20px;margin-right: 10px;margin-top: 4px;"></div>
                <ul id="suggestions2" class="list-group position-absolute mt-1" style="width: 340px; z-index: 1000;"></ul>
            </form>
        </div>
    </div>
</section>
<section style="height: 680px;">
    <section class="position-relative py-4 py-xl-5" style="height: 673.781px;">
        <?php
        if(Application::$app->session->get('user')){
            if($_SESSION['user'][0]['role'] == 'Admin'){
                echo "
                    <div class='card'>
    <div class='card-body'>
        <div class='row'>
            <div class='col-md-12'>
                <div class='row'>
                    <div class='col-md-6'>
                        <label for='from'>From:</label>
                        <input type='date' class='form-control date-helper-suggestions' placeholder='From' id='from'>
                    </div>
                    <div class='col-md-6'>
                        <label for='from'>To:</label>
                        <input type='date' class='form-control date-helper-suggestions' placeholder='To' id='to'>
                    </div>
                </div>
                <div class='chart'>
                    <div id='suggestions-per-product-canvas'>
                        <canvas id='suggestions-per-product'
                                style='min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 634px;'
                                class='chartjs-render-monitor'></canvas>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-6'>
                        <label for='from'>From:</label>
                        <input type='date' class='form-control date-helper-views' placeholder='From' id='fromView'>
                    </div>
                    <div class='col-md-6'>
                        <label for='from'>To:</label>
                        <input type='date' class='form-control date-helper-views' placeholder='To' id='toView'>
                    </div>
                </div>
                <div class='chart'>
                    <div id='views-per-gpu-canvas'>
                        <canvas id='views-per-gpu'
                                style='min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 634px;'
                                class='chartjs-render-monitor'></canvas>
                    </div>
                </div>
                <div class='chart'>    
                    <div id='views-per-cpu-canvas'>
                        <canvas id='views-per-cpu'
                                style='min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 634px;'
                                class='chartjs-render-monitor'></canvas>
                    </div>
                </div>
                <div class='chart'>
                    <div id='views-per-ssd-canvas'>
                        <canvas id='views-per-ssd'
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
                ";
            }
            else{
                echo "<div class='container position-relative' style='margin-top: 5px;'>
    <div class='row d-flex justify-content-center'>
        <div class='col-md-8 col-lg-6 col-xl-5 col-xxl-4'>
            <div class='card mb-5'>
                <div class='card-body p-sm-5' style='width: 419px;'>
                    <h2 class='text-center mb-4' style='font-size: 32px;'>Suggest a product</h2>
                    <form method='post' action='/addSuggestion'><span style='font-size: 20px;margin-top: 0px;margin-bottom: 0px;padding-bottom: 0px;'>Product name</span>
                        <input type='hidden' name='id_users' value='"; echo $_SESSION['user'][0]['id_user'] ?? 0; echo"'>
                        <div class='mb-3'><input class='form-control' type='text' id='name' name='name' placeholder='Write the name here'></div><span style='font-size: 20px;'>Sources (Optional)</span>
                        <div class='mb-3'><textarea class='form-control' id='source' name='source' rows='6' placeholder='Where can we find more inforamtion' style='max-height: 200px;min-height: 50px;height: 170;'></textarea></div>
                        <div><button class='btn btn-primary d-block w-100' type='submit'>Send</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>" ;
            }

        }
        else{
            echo"
     <div class='container position-relative' style='margin-top: 5px;'>
    <div class='row d-flex justify-content-center'>
        <div class='col-md-8 col-lg-6 col-xl-5 col-xxl-4'>
            <div class='card mb-5'>
                <div class='card-body p-sm-5' style='width: 419px;'>
                    <h2 class='text-center mb-4' style='font-size: 32px;'>Suggest a product</h2>
                    <form method='post' action='/addSuggestion'><span style='font-size: 20px;margin-top: 0px;margin-bottom: 0px;padding-bottom: 0px;'>Product name</span>
                        <input type='hidden' name='id_users' value='"; echo $_SESSION['user'][0]['id_user'] ?? 0; echo "'>
                        <div class='mb-3'><input class='form-control' type='text' id='name' name='name' placeholder='Write the name here'></div><span style='font-size: 20px;'>Sources (Optional)</span>
                        <div class='mb-3'><textarea class='form-control' id='source' name='source' rows='6' placeholder='Where can we find more inforamtion' style='max-height: 200px;min-height: 50px;height: 170;'></textarea></div>
                        <div><button class='btn btn-primary d-block w-100' type='submit'>Send</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
            ";
        }
        ?>

    </section>
</section>
<script>
    $(document).ready(function () {
        generateSuggestionsPerProduct();
        generateViewsPerGPU();
        generateViewsPerCPU();
        generateViewsPerSSD();

        $(".date-helper-suggestions").change(function () {
            generateSuggestionsPerProduct();
        });
        $(".date-helper-views").change(function () {
            generateViewsPerGPU();
            generateViewsPerCPU();
            generateViewsPerSSD();
        });
    });

    function generateSuggestionsPerProduct() {
        $("#suggestions-per-product-canvas").empty();
        $("#suggestions-per-product-canvas").append(
            ' <canvas id="suggestions-per-product"' +
            'style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 634px;"' +
            'class="chartjs-render-monitor"></canvas>'
        );

        let from = $("#from").val();
        let to = $("#to").val();

        let url = `/getSuggestionsPerProduct?from=${from}&to=${to}`;

        $.getJSON(url, function (result) {
            let labels = result.map(function (e) {
                return e.name;
            });

            let values = result.map(function (e) {
                return e.counter;
            });

            let setData = {
                labels: labels,
                datasets: [
                    {
                        label: "Suggestions per product",
                        data: values
                    }]
            }

            let options = {}

            let graph = $("#suggestions-per-product").get(0).getContext('2d');

            createGraph(setData, graph, 'pie', options);
        });
    }
    function generateViewsPerGPU() {
        $("#views-per-gpu-canvas").empty();
        $("#views-per-gpu-canvas").append(
            ' <canvas id="views-per-gpu"' +
            'style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 634px;"' +
            'class="chartjs-render-monitor"></canvas>'
        );

        let from = $("#fromView").val();
        let to = $("#toView").val();

        let url = `/getViewsPerGPU?from=${from}&to=${to}`;

        $.getJSON(url, function (result) {
            let labels = result.map(function (e) {
                return e.name;
            });

            let values = result.map(function (e) {
                return e.counter;
            });

            let setData = {
                labels: labels,
                datasets: [
                    {
                        label: "Views per gpu",
                        data: values
                    }]
            }

            let options = {}

            let graph = $("#views-per-gpu").get(0).getContext('2d');

            createGraph(setData, graph, 'pie', options);
        });
    }

    function generateViewsPerCPU() {
        $("#views-per-cpu-canvas").empty();
        $("#views-per-cpu-canvas").append(
            ' <canvas id="views-per-cpu"' +
            'style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 634px;"' +
            'class="chartjs-render-monitor"></canvas>'
        );

        let from = $("#fromView").val();
        let to = $("#toView").val();

        let url = `/getViewsPerCPU?from=${from}&to=${to}`;

        $.getJSON(url, function (result) {
            let labels = result.map(function (e) {
                return e.name;
            });

            let values = result.map(function (e) {
                return e.counter;
            });

            let setData = {
                labels: labels,
                datasets: [
                    {
                        label: "Views per cpu",
                        data: values
                    }]
            }

            let options = {}

            let graph = $("#views-per-cpu").get(0).getContext('2d');

            createGraph(setData, graph, 'pie', options);
        });
    }
    function generateViewsPerSSD() {
        $("#views-per-ssd-canvas").empty();
        $("#views-per-ssd-canvas").append(
            ' <canvas id="views-per-ssd"' +
            'style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 634px;"' +
            'class="chartjs-render-monitor"></canvas>'
        );

        let from = $("#fromView").val();
        let to = $("#toView").val();

        let url = `/getViewsPerSSD?from=${from}&to=${to}`;

        $.getJSON(url, function (result) {
            let labels = result.map(function (e) {
                return e.name;
            });

            let values = result.map(function (e) {
                return e.counter;
            });

            let setData = {
                labels: labels,
                datasets: [
                    {
                        label: "Views per ssd",
                        data: values
                    }]
            }

            let options = {}

            let graph = $("#views-per-ssd").get(0).getContext('2d');

            createGraph(setData, graph, 'pie', options);
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