<main class="page" style="height: 669px;">
    <section class="clean-block clean-form dark">
        <div class="container d-flex justify-content-center align-items-center mt-5">
            <form role="form" method="post" class="text-start" style="margin-top: 120px;" action="/processRegistration">
                <div class="mb-3"><label class="form-label" for="username">Username</label><input class="form-control" type="text" name="username" id="username" value="<?php echo $params->username ?>" data-bs-theme="light">
                    <?php
                    if ($params != null && $params->errors != null) {
                        foreach ($params->errors as $attribute => $error) {
                            if ($attribute == 'username') {
                                echo "<span class='text-danger'>$error[0]</span>";
                            }
                        }
                    }
                    ?>
                </div>
                <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control item" type="email" name="email" id="email" value="<?php echo $params->email ?>" data-bs-theme="light">
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
                <div class="mb-3"><label class="form-label" for="password">Password</label><input class="form-control" type="password" name="passwordHash" id="password" value="<?php echo $params->passwordHash ?>" data-bs-theme="light">
                    <?php
                    if ($params != null && $params->errors != null) {
                        foreach ($params->errors as $attribute => $error) {
                            if ($attribute == 'passwordHash') {
                                echo "<span class='text-danger'>$error[0]</span>";
                            }
                        }
                    }
                    ?>
                </div>
                <div class="mb-3"></div><button class="btn btn-primary text-center align-items-xxl-center" type="submit">Sign Up</button>
            </form>
        </div>
    </section>
</main>