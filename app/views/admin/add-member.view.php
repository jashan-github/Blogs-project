<?php 

require 'public/partials/header.php';

require 'public/partials/admindashbar.php';

?>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card-header text-center">
                <h3> Add New member</h3>
            </div>
            <div class="card shadow">

                <div class="card-body">
                    <?php if(isset($_GET['error'])) {?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_GET['error'] ?>
                    </div>
                    <?php }?>

                    <form method="POST" action="add-member">

                        <div class="form-group">
                            <label for="name "> Name </label>
                            <input type="name" name="name" class="form-control" placeholder="Enter your name"><br>
                        </div>
                        <div class="form-group">
                            <label for="email "> Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email"><br>
                        </div>
                        <div class="form-group">
                            <label for="phone "> Phone number </label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter your phone No."><br>
                        </div>
                        <div class="form-group">
                            <label for=> Enter your password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Enter your password">
                        </div><br>
                        <div class="form-group mb-3">
                            <label for=> Enter your confirm password</label>
                            <input type="password" class="form-control" name="confirm_password" id="password"
                                placeholder="Enter your confirm password" required>
                        </div>

                        <!-- <div class="form-group">
                            <label for="city "> City </label>
                            <input type="text" name="city" class="form-control" placeholder="Enter your city"><br>
                        </div> -->

                        <div class="form-group col mb-3">
                            <button type="submit" name="add-btn" class="btn btn-primary">Add Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 

require 'public/partials/footer.php'; ?>