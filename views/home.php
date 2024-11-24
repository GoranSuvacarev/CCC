<?php

use app\core\Application;
use app\models\SuggestionModel;

?>

<section>
    <div class="text-center" data-bss-scroll-zoom="true" data-bss-scroll-zoom-speed="1" style="background-image: url(&quot;assets/img/Screenshot%202024-11-23%20202324.png&quot;);background-position: center;background-size: cover;">
        <div class="text-center d-flex flex-column justify-content-center align-items-center py-5 px-5 hero-content mt-0" data-bss-scroll-zoom="true" data-bss-scroll-zoom-speed="1" style="background-image: url(&quot;assets/img/Screenshot%202024-11-23%20202324.png&quot;);background-position: center;background-size: cover;">
            <h1 class="display-1" style="font-weight: bold;font-size: 46.64px;">compare computer components</h1>
            <p class="fs-3" style="font-weight: bold;">Graphics cards, processors, storage and more to come</p>
            <form class="text-center" style="width: 400px;">
                <div class="d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center"><input class="bg-dark-subtle border rounded-pill form-control ms-0" type="search" placeholder="Type here to compare" autocomplete="on" style="width: 340px;height: 48px;padding-left: 10px;font-size: 20px;margin-right: 10px;"><input class="btn btn-primary" type="submit" value="Compare" style="margin-right: 0px;"></div>
                <div class="invisible"><input class="bg-dark-subtle border rounded-pill form-control ms-0" type="search" placeholder="Type here to compare" autocomplete="on" style="width: 400px;height: 48px;padding-left: 10px;font-size: 20px;margin-right: 10px;margin-top: 4px;"></div>
            </form>
        </div>
    </div>
</section>
<section style="height: 680px;">
    <section class="position-relative py-4 py-xl-5" style="height: 673.781px;">
        <div class="container position-relative" style="margin-top: 5px;">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card mb-5">
                        <div class="card-body p-sm-5" style="width: 419px;">
                            <h2 class="text-center mb-4" style="font-size: 32px;">Suggest a product</h2>
                            <form method="post" action="/addSuggestion"><span style="font-size: 20px;margin-top: 0px;margin-bottom: 0px;padding-bottom: 0px;">Product name</span>
                                <input type="hidden" name="id_users" value="<?php echo ($_SESSION['user'][0]['id_user'] ?? 0) ?>">
                                <div class="mb-3"><input class="form-control" type="text" id="name" name="name" placeholder="Write the name here"></div><span style="font-size: 20px;">Sources (Optional)</span>
                                <div class="mb-3"><textarea class="form-control" id="source" name="source" rows="6" placeholder="Where can we find more inforamtion" style="max-height: 200px;min-height: 50px;height: 170;"></textarea></div>
                                <div><button class="btn btn-primary d-block w-100" type="submit">Send</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>