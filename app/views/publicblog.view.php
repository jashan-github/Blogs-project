<?php 
use DevCoder\SessionManager;

require 'public/partials/header.php';

require 'public/partials/navbar.php';
?>
<br>
<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="title">
                    <h3>
                        Name of the Title: <?php echo $publicData->title; ?>
                    </h3> <br>
                    <!-- By: <?php echo $publicData->user_id;?> -->
                    <h4> Content of the blog:</h4> <?php echo $publicData->content; ?><br>
                    Publish Date: <?php echo $publicData->publish_date;?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'public/partials/footer.php'; ?>