<?php
use app\core\Application;

$product = $params['product'];
$category = $params['category'];
$features = $params['features'];

// Helper function to get the appropriate image prefix based on category
function getImagePrefix($category, $productName) {
    switch ($category) {
        case 'cpu':
            return strpos(strtolower($productName), 'ryzen') !== false ? 'cpu_default_ryzen' : 'cpu_default_intel';
        case 'gpu':
            return 'gpu_default';
        case 'ssd':
            return 'ssd_default';
        default:
            return 'default';
    }
}
?>

<main class="page">
    <section class="clean-block clean-product dark">
        <div class="container">
            <div class="block-heading">
                <div style="text-align: center;margin-bottom: 20px;">
                    <div class="row">
                        <div class="col">
                            <div class="text-start" style="font-size: 19px;">
                                <i class="fa fa-home"></i>
                                <span><a href="/" style="color: black;">&nbsp;Home&nbsp;</a></span>
                                <span><i class="fa fa-angle-double-right"></i></span>
                                <span><a href="/<?php echo $category?>s" style="color: black;">&nbsp;<?php echo ucfirst($category)?>s&nbsp;</a></span>
                                <span><i class="fa fa-angle-double-right"></i></span>
                                <span><a href="#" style="color: black;">&nbsp;<?php echo $product->name ?>&nbsp;</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-content">
                <div class="product-info">
                    <div class="row d-lg-flex d-xxl-flex justify-content-lg-center align-items-lg-center justify-content-xxl-center">
                        <div class="col-md-6 d-lg-flex d-xxl-flex justify-content-lg-center align-items-lg-center justify-content-xxl-center align-items-xxl-center gallery" style="height: 400px;width: 400px;text-align: center;">
                            <div class="gallery">
                                <div id="product-preview" class="vanilla-zoom">
                                    <div class="zoomed-image"></div>
                                    <div class="d-xl-flex justify-content-xl-center align-items-xl-center sidebar">
                                        <img class="img-fluid small-preview"
                                             src="assets/img/<?php echo getImagePrefix($category, $product->name) ?>.jpg"
                                             width="376" height="196" style="margin-top: 0px;">
                                    </div>
                                </div>
                                <p class="text-center" style="color: var(--bs-emphasis-color);font-size: 30px;margin-top: 50px;">
                                    <?php echo $product->name ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div class="d-flex d-xxl-flex justify-content-center align-items-center justify-content-xxl-center align-items-xxl-center" style="height: auto;border-top-style: groove;border-top-color: var(--bs-emphasis-color);">
                <div class="row">
                    <div class="col-md-9 col-lg-12 col-xl-12" style="width: auto;">
                        <div class="products" style="border-color: var(--bs-emphasis-color);">
                            <div class="row g-0 d-flex d-lg-flex justify-content-center align-items-center justify-content-lg-center align-items-lg-center" style="width: auto;">
                                <?php foreach ($features as $feature): ?>
                                    <div class="col-12 col-md-6 col-lg-4 d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center" style="height: 250px;width: auto;margin-right: 50px;">
                                        <div class="border-light-subtle clean-product-item">
                                            <div class="bg-primary-subtle border rounded-pill border-4 border-primary shadow image" style="border: 3px solid var(--bs-emphasis-color);font-size: 26px;height: 80px;">
                                                <p class="d-xl-flex justify-content-xl-start align-items-xl-center" style="height: 75px;width: 275px;font-size: 22px;margin-bottom: 0px;margin-right: 0px;margin-left: 20px;">
                                                    <?php
                                                    $formattedName = ucwords(str_replace('_', ' ', $feature['name']));
                                                    echo $formattedName . ': ' . $feature['value'] . $feature['measurement_units'];
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews Section -->
            <div class="d-flex d-sm-flex d-md-flex d-lg-flex justify-content-center align-items-center justify-content-sm-center justify-content-md-center justify-content-lg-center align-items-lg-center" style="height: 400px;border-top-style: groove;border-top-color: var(--bs-emphasis-color);">
                <div class="d-lg-flex justify-content-lg-center align-items-xxl-center" style="width: 500px;height: 300px;">
                    <div style="width: 500px;height: 250px;margin-top: 50px;">
                        <form method="post" action="/addReview" style="width: 500px;">
                            <div class="d-sm-flex justify-content-sm-center">
                                <h1 class="d-flex" style="font-size: 30px;width: 360px;">Rate the product</h1>
                            </div>
                            <div class="d-flex d-md-flex justify-content-lg-center align-items-lg-center div-review">
                                <p class="d-lg-flex align-items-lg-center p-review" style="font-size: 22px; margin-right: 30px; margin-top: 20px">
                                    <?php echo $product->name ?>
                                </p>
                                <div>
                                    <select name="rating" class="form-select" style="width: 110.203px;padding: 12px 72px 12px 24px;height: 55px;margin-right: 9px;">
                                        <optgroup label="Rating">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </optgroup>
                                    </select>
                                    <input type="hidden" name="product_id" value="<?php echo $product->id ?>">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center" style="margin-top: 20px;">
                                <button class="btn btn-primary d-flex d-xxl-flex justify-content-xxl-center align-items-xxl-center" type="submit">
                                    Submit Review
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</main>