<?php
use app\core\Application;

$product1 = $params->product1;
$product2 = $params->product2;

// Helper function to normalize values to a 0-100 scale
function normalizeValue($value, $featureName) {
    $maxValues = [
        'gpu_clock_speed' => 3000, // MHz
        'gpu_turbo_speed' => 3000, // MHz
        'pixel_rate' => 500, // GPixel/s
        'texture_mapping_units' => 500,
        'render_output_units' => 200,
        'vram_size' => 24, // GB
        'memory_bus_width' => 384, // bit
        'cpu_clock_speed' => 4.7, // GHz
        'cpu_turbo_speed' => 6.0, // GHz
        'threads' => 32,
        'cores' => 24,
        'l1_cache' => 1024, // KB
        'l2_cache' => 48, // MB
        'l3_cache' => 128, // MB
        'sequential_read_speed' => 7500, // MB/s
        'random_read_speed' => 1200000, // IOPS
        'sequential_write_speed' => 7000, // MB/s
        'random_write_speed' => 1200000, // IOPS
        'storage' => 4096, // GB
        'thermal_design_power' => 350 // W
    ];

    if (isset($maxValues[$featureName])) {
        return ($value / $maxValues[$featureName]) * 100;
    }
    return $value;
}

// Get features for both products
$features1 = array_column($product1->features, 'value', 'name');
$features2 = array_column($product2->features, 'value', 'name');

// Define features to exclude
$excludedFeatures = ['socket', 'chipset'];

// Filter out excluded features
$features1_filtered = array_filter($features1, function($key) use ($excludedFeatures) {
    return !in_array(strtolower($key), array_map('strtolower', $excludedFeatures));
}, ARRAY_FILTER_USE_KEY);

$features2_filtered = array_filter($features2, function($key) use ($excludedFeatures) {
    return !in_array(strtolower($key), array_map('strtolower', $excludedFeatures));
}, ARRAY_FILTER_USE_KEY);

// Get common features
$commonFeatures = array_intersect_key($features1_filtered, $features2_filtered);

// Prepare data for the chart
$labels = [];
$values1 = [];
$values2 = [];

foreach ($commonFeatures as $name => $value) {
    $labels[] = ucwords(str_replace('_', ' ', $name));
    $values1[] = normalizeValue($features1_filtered[$name], $name);
    $values2[] = normalizeValue($features2_filtered[$name], $name);
}

?>

<!-- Basic product information display -->
<div class="block-content">
    <div class="product-info">
        <div class="row d-lg-flex d-xxl-flex justify-content-lg-center align-items-lg-center justify-content-xxl-center">
            <!-- Product 1 -->
            <div class="col-md-6 col-xxl-3 d-lg-flex d-xxl-flex justify-content-lg-center align-items-lg-center justify-content-xxl-center align-items-xxl-center gallery" style="height: 425px;width: 400px;text-align: center;">
                <div class="gallery">
                    <div id="product-preview" class="vanilla-zoom">
                        <div class="zoomed-image"></div>
                        <div class="d-xl-flex justify-content-xl-center align-items-xl-center sidebar">
                            <img class="img-fluid small-preview" src="assets/img/<?php echo $product1->image; ?>.jpg" width="322" height="168" style="margin-top: 50px;">
                        </div>
                    </div>
                    <p class="text-center" style="color: var(--bs-emphasis-color);font-size: 30px;margin-top: 30px;">
                        <?php echo $product1->manufacturer . ' ' . $product1->name; ?>
                    </p>
                </div>
            </div>

            <!-- VS Image -->
            <div class="col-md-6 d-lg-flex d-xxl-flex justify-content-lg-center align-items-lg-center justify-content-xxl-center align-items-xxl-center" style="height: 425px;width: 150px;">
                <div class="gallery">
                    <div id="product-preview-2" class="vanilla-zoom">
                        <div class="d-xl-flex justify-content-xl-center align-items-xl-center sidebar">
                            <img class="img-fluid d-lg-flex small-preview" src="assets/img/vs.jpg" width="216" height="216" style="margin-top: 0;margin-bottom: 0px;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="col-md-6 d-lg-flex d-xxl-flex justify-content-lg-center align-items-lg-center justify-content-xxl-center align-items-xxl-center gallery" style="height: 425px;width: 400px;text-align: center;">
                <div class="gallery">
                    <div id="product-preview-3" class="vanilla-zoom">
                        <div class="zoomed-image"></div>
                        <div class="d-xl-flex justify-content-xl-center align-items-xl-center sidebar">
                            <img class="img-fluid small-preview" src="assets/img/<?php echo $product2->image; ?>.jpg" width="326" height="170" style="margin-top: 50px;">
                        </div>
                    </div>
                    <p class="text-center" style="color: var(--bs-emphasis-color);font-size: 30px;margin-top: 30px;">
                        <?php echo $product2->manufacturer . ' ' . $product2->name; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart Section -->
<div class="d-xxl-flex justify-content-xxl-center align-items-xxl-center" style="height: 800px; border-top-style: groove; border-top-color: var(--bs-emphasis-color);">
    <div style="width: 90%; height: 90%; max-width: 750px; max-height: 750px; padding: 20px;">
        <canvas id="comparisionChart"></canvas>
    </div>
</div>

<script>
    // Create the radar chart only if we have data
    <?php if (!empty($labels) && !empty($values1) && !empty($values2)): ?>
    const ctx = document.getElementById('comparisionChart').getContext('2d');
    new Chart(ctx, {
        type: 'radar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [
                {
                    label: <?php echo json_encode($product1->manufacturer . ' ' . $product1->name); ?>,
                    data: <?php echo json_encode($values1); ?>,
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgb(54, 162, 235)',
                    pointBackgroundColor: 'rgb(54, 162, 235)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(54, 162, 235)'
                },
                {
                    label: <?php echo json_encode($product2->manufacturer . ' ' . $product2->name); ?>,
                    data: <?php echo json_encode($values2); ?>,
                    fill: true,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    pointBackgroundColor: 'rgb(255, 99, 132)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(255, 99, 132)'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            elements: {
                line: {
                    borderWidth: 3
                }
            },
            scales: {
                r: {
                    angleLines: {
                        display: true,
                        color: 'rgba(0, 0, 0, 0.1)',
                        lineWidth: 1
                    },
                    suggestedMin: 0,
                    suggestedMax: 100,
                    pointLabels: {
                        font: {
                            size: 14
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        font: {
                            size: 16
                        },
                        padding: 20
                    }
                },
                title: {
                    display: true,
                    text: 'Product Comparison',
                    font: {
                        size: 24
                    },
                    padding: 20
                }
            }
        }
    });
    <?php endif; ?>
</script>