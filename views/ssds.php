<?php
use app\core\Application;
?>
<section class="clean-block clean-catalog dark" style="background: var(--bs-body-bg);">
    <div class="container">
        <div style="text-align: center;">
            <div class="row">
                <div class="col">
                    <div class="text-start" style="font-size: 19px;"><i class="fa fa-home"></i><span><a href="index.html" style="color: black;">&nbsp;Home&nbsp;</a></span><span><i class="fa fa-angle-double-right"></i></span><span><a href="#" style="color: black;">&nbsp;Storage</a></span></div>
                </div>
            </div>
        </div>
        <div class="block-heading">
            <h2 style="color: var(--bs-emphasis-color);">Storage comparison</h2>
            <p></p>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="d-none d-md-block">
                        <div class="filters">
                            <div style="margin-bottom: 20px;">
                                <h3><strong>Sort by:</strong></h3><select>
                                    <option value="14" selected="">Release date</option>
                                    <option value="12">Price (low to high)</option>
                                    <option value="13">Price (high to low)</option>
                                </select>
                            </div>
                            <div class="filter-item" style="margin-bottom: 20px;font-size: 26px;">
                                <h3><strong>manufacturer</strong></h3>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-11"><label class="form-check-label" for="formCheck-11" style="color: rgb(0,0,0);font-size: 22px;">Samsung</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-12"><label class="form-check-label" for="formCheck-12" style="color: rgb(0,0,0);font-size: 22px;">WD</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-13"><label class="form-check-label" for="formCheck-13" style="color: rgb(0,0,0);font-size: 22px;">Seagate</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-14"><label class="form-check-label" for="formCheck-14" style="color: rgb(0,0,0);font-size: 22px;">Kingston</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-15"><label class="form-check-label" for="formCheck-15" style="color: rgb(0,0,0);font-size: 22px;">Crucial</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-10"><label class="form-check-label" for="formCheck-10" style="color: rgb(0,0,0);font-size: 22px;">Patriot</label></div>
                            </div>
                            <div class="filter-item" style="margin-bottom: 20px;">
                                <h3 style="margin-bottom: 10px;">Performance</h3>
                                <div style="margin-bottom: 20px;">
                                    <p><label class="form-label" for="amount-1" style="margin-bottom: 0px;font-size: 22px;">Sequential read speed:</label></p><input type="text" id="seq-read-amount" readonly="" style="border-width: 0px;width: 260px;">
                                    <div id="slider-seq-read" style="height: 13px;background: var(--bs-body-bg);width: 186px;"></div>
                                </div>
                                <div style="margin-bottom: 20px;">
                                    <p><label class="form-label" for="amount-1" style="margin-bottom: 0px;font-size: 22px;">Sequential write speed:</label></p><input type="text" id="seq-write-amount" readonly="" style="border-width: 0px;width: 260px;">
                                    <div id="slider-seq-write" style="height: 13px;background: var(--bs-body-bg);width: 186px;"></div>
                                </div>
                                <div style="margin-bottom: 20px;">
                                    <p><label class="form-label" for="amount-1" style="margin-bottom: 0px;font-size: 22px;">Terabytes written:</label></p><input type="text" id="tb-written-amount" readonly="" style="border-width: 0px;width: 260px;">
                                    <div id="slider-tb-written" style="height: 13px;background: var(--bs-body-bg);width: 186px;"></div>
                                </div>
                                <div style="margin-bottom: 20px;">
                                    <p><label class="form-label" for="amount-1" style="margin-bottom: 0px;font-size: 22px;">Storage size:</label></p><input type="text" id="storage-size-amount" readonly="" style="border-width: 0px;width: 260px;">
                                    <div id="slider-storage-size" style="height: 13px;background: var(--bs-body-bg);width: 186px;"></div>
                                </div>
                            </div>
                            <div class="filter-item" style="margin-bottom: 20px;">
                                <h3 style="margin-bottom: 10px;">Price</h3>
                                <div>
                                    <p><label class="form-label" for="amount" style="margin-bottom: 0px;font-size: 22px;">Price range:</label></p><input type="text" id="ssd-price-amount" readonly="" style="border-width: 0px;width: 260px;">
                                    <div id="slider-ssd-price" style="height: 13px;background: var(--bs-body-bg);width: 186px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="products" style="border-color: var(--bs-emphasis-color);">
                        <div class="row g-0">
                            <?php
                            if(Application::$app->session->get('user')){
                                if($_SESSION['user'][0]['role'] == 'Admin'){
                                    echo "<div class='col-12 col-md-6 col-lg-4'>
                                            <div class='border-light-subtle clean-product-item'>
                                            <div class='image'><a href='/addSSD'><img class='img-fluid d-block mx-auto' src='assets/img/ssd_default.jpg' style='width: 190px;margin: 0px;margin-top: 24px;height: 190px;margin-bottom: 24px;'></a></div>
                                            <div class='product-name'><a href='/addSSD' style='font-size: 26px;font-weight: bold;'>Add new</a></div>
                                            <div class='about'>
                                                <div class='price'>
                                                    <h3></h3>
                                                </div>
                                            </div>
                                        </div>
                                      </div>";
                                }
                            }
                            foreach($params['items'] as $param){
                                echo "<div class='col-12 col-md-6 col-lg-4'>
                                            <div class='border-light-subtle clean-product-item'>
                                            <div class='image'><a href="; echo"/ssd?id=$param[id]"; echo "><img class='img-fluid d-block mx-auto' src='assets/img/"; echo"$param[image].jpg'"; echo"style='width: 230px;margin: 0px;margin-top: 24px;height: 120px;margin-bottom: 24px;'></a></div>
                                            <div class='product-name'><a href="; echo"/ssd?id=$param[id]"; echo " style='font-size:26px;font-weight: bold;'>$param[name]</a></div>
                                            <div class='about'>";
                                if(Application::$app->session->get('user')){
                                    if($_SESSION['user'][0]['role'] == 'Admin'){
                                        echo "<div><a href="; echo "/deleteProduct?id=$param[id]&id_category=$param[id_category]"; echo">Delete</a></div>";
                                    }
                                }
                                echo "<div class='price'>
                                                    <h3>$$param[price]</h3>
                                                </div>
                                            </div>
                                        </div>
                                      </div>";
                            }
                            ?>
                        </div>
                        <nav class="d-flex d-xl-flex d-xxl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center" style="margin-top: 30px;">
                            <ul class="pagination">
                                <?php
                                $pagination = $params['pagination'];
                                $currentPage = $pagination->getCurrentPage();
                                $totalPages = $pagination->getTotalPages();

                                // Previous button
                                if ($pagination->hasPreviousPage()) {
                                    echo '<li class="page-item"><a class="page-link" href="?page='.($currentPage-1).'" aria-label="Previous"><span aria-hidden="true">«</span></a></li>';
                                } else {
                                    echo '<li class="page-item disabled"><a class="page-link" aria-label="Previous"><span aria-hidden="true">«</span></a></li>';
                                }

                                // Page numbers
                                foreach ($pagination->getPageNumbers() as $page) {
                                    $activeClass = ($page == $currentPage) ? 'active' : '';
                                    echo '<li class="page-item '.$activeClass.'"><a class="page-link" href="?page='.$page.'">'.$page.'</a></li>';
                                }

                                // Next button
                                if ($pagination->hasNextPage()) {
                                    echo '<li class="page-item"><a class="page-link" href="?page='.($currentPage+1).'" aria-label="Next"><span aria-hidden="true">»</span></a></li>';
                                } else {
                                    echo '<li class="page-item disabled"><a class="page-link" aria-label="Next"><span aria-hidden="true">»</span></a></li>';
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>