<?php
use app\core\Application;

$product1 = $params->product1;
$product2 = $params->product2;

// Helper function to normalize values to a 0-100 scale
function normalizeValue($value, $featureName) {
    // Convert string values to numbers
    $value = floatval($value);

    // Normalize based on feature type
    switch (strtolower($featureName)) {
        // For SSDs
        case 'sequential_read_speed':
            return ($value / 7500) * 100; // Normalize against typical max of 7500 MB/s

        case 'sequential_write_speed':
            return ($value / 7000) * 100; // Normalize against typical max of 7000 MB/s

        case 'random_read_speed':
            return ($value / 1200000) * 100; // Normalize IOPS against typical max of 1.2M IOPS

        case 'random_write_speed':
            return ($value / 1200000) * 100; // Normalize IOPS against typical max of 1.2M IOPS

        case 'storage':
            return ($value / 4096) * 100; // Normalize against 4TB (4096GB)

        case 'terabytes_written':
            return ($value / 5000) * 100; // Normalize against typical max of 5000TB written

        // For GPUs
        case 'gpu_clock_speed':
            return ($value / 3000) * 100;

        case 'gpu_turbo_speed':
            return ($value / 3000) * 100;

        case 'pixel_rate':
            return ($value / 500) * 100;

        case 'texture_mapping_units':
            return ($value / 500) * 100;

        case 'render_output_units':
            return ($value / 200) * 100;

        case 'vram_size':
            return ($value / 24) * 100;

        case 'memory_bus_width':
            return ($value / 384) * 100;

        // For CPUs
        case 'cpu_clock_speed':
            return ($value / 4.7) * 100;

        case 'cpu_turbo_speed':
            return ($value / 6.0) * 100;

        case 'semiconductor_size':
            return ($value / 10) * 100;

        case 'threads':
            return ($value / 32) * 100;

        case 'cores':
            return ($value / 24) * 100;

        case 'l1_cache':
            return ($value / 1024) * 10;

        case 'l2_cache':
            return ($value / 48) * 100;

        case 'l3_cache':
            return ($value / 128) * 100;

        case 'thermal_design_power':
            return ($value / 350) * 100;

        default:
            return $value;
    }
}

// Define features to exclude
$excludedFeatures = ['socket', 'chipset', ' socket', ' Socket', 'pcie_version'];

// Process features and exclude unwanted ones
$features1 = [];
$features2 = [];

foreach ($product1->features as $feature) {
    $featureName = trim(strtolower($feature['name']));
    if (!in_array($featureName, array_map('strtolower', $excludedFeatures))) {
        $features1[$feature['name']] = $feature['value'];
    }
}

foreach ($product2->features as $feature) {
    $featureName = trim(strtolower($feature['name']));
    if (!in_array($featureName, array_map('strtolower', $excludedFeatures))) {
        $features2[$feature['name']] = $feature['value'];
    }
}

// Get common features
$commonFeatures = array_intersect_key($features1, $features2);

// Prepare data for the chart
$labels = [];
$values1 = [];
$values2 = [];

foreach ($commonFeatures as $name => $value) {
    $labels[] = ucwords(str_replace('_', ' ', $name));
    $values1[] = normalizeValue($features1[$name], $name);
    $values2[] = normalizeValue($features2[$name], $name);
}

// Rest of your chart code remains the same...
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