<!-- <?php

use DevCoder\SessionManager;

require 'public/partials/header.php';

require 'public/partials/admindashbar.php';
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
        <h3>Admin Dashboard</h3>
    </div>
    <hr>
    <div class="row">

        <?php
          if(!empty($blogList)){
              foreach($blogList as $key=>$values){ ?>
        <div class="col-md-4">
            Title : <?php echo $values['title'];?><br>
            Author : <?php echo $values['blogger'];?><br>
            Content : <?php echo $values['content'];?><br>
            <a href="blogs">view</a>
        </div>

        <?php } 
          }else{ ?>
        <div class="col-md-4">
            No record found.
        </div>
        <?php }
        ?>

    </div>
</div> -->