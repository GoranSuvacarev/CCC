<div class="card card-plain">
    <div class="card-header pb-0 text-start">
        <h4 class="font-weight-bolder">Compare</h4>
    </div>
    <div class="card-body">
        <form role="form" method="post" action="/compare">
            <div class="mb-3">
                <input type="text" name="text" class="form-control form-control-lg" placeholder="Product 1" aria-label="Text">
                <?php
                if ($params != null && $params->errors != null) {
                    foreach ($params->errors as $attribute => $error) {
                        if ($attribute == 'email') {
                            echo "<span class='text-danger'>$error[0]</span>";
                        }
                    }
                }
                ?>
            </div>
            <div class="mb-3">
                <input type="text" name="text" class="form-control form-control-lg" placeholder="Product 2" aria-label="Text">
                <?php
                if ($params != null && $params->errors != null) {
                    foreach ($params->errors as $attribute => $error) {
                        if ($attribute == 'password') {
                            echo "<span class='text-danger'>$error[0]</span>";
                        }
                    }
                }
                ?>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Compare</button>
            </div>
        </form>
    </div>
</div>