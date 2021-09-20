<?php

use DevCoder\SessionManager;

require 'public/partials/header.php';

require 'public/partials/usernavbar.php';
?>
<br><br>
<div class="container">
    <div class="row">
        <?php 
             $sessionManager = new SessionManager();
             $message =  $sessionManager->get("message");
             
             if(!empty($message)){?>
           
                <div class="alert alert-success" role="alert">
                    <?php echo $message;?>
                </div>

             <?php
             }

        ?>
    </div>
    <div class="jumbotron">
        <h3>Blogger Dashboard</h3>
        <!-- <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile-first projects on the web.</p> -->
    </div>
    <hr>
    <div class="row">
         <?php for($i = 0; $i<=5;$i++){?>
            <div class="col-md-3">
              Blog List data
            </div>
         <?php } ?>
         
    </div>
</div>
