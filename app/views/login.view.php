<?php

require 'public/partials/header.php';

require 'public/partials/navbar.php';
?>

<link rel="stylesheet" href="public/css/login.css">
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card-shadow">
                <div class="card-header text-center">
                    <h2> Welcome To Admin Panel</h2>
                </div>
                <div class="card-body">
                    <?php if(isset($_SESSION['error'])) {?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['error'] ?>
                    </div>
                    <?php }?>
                    <form method="POST" action="/login">
                        <div class="form-group mb-3">
                            <label for=> E-mail address</label>
                            <input type="email" class="form-control" name="email" id="e-mail"
                                placeholder="Enter your e-mail">
                        </div>

                        <div class="form-group mb-3">
                            <label for=> Enter your password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Enter your password">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

<?php require 'public/partials/footer.php'; ?>