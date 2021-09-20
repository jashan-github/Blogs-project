<?php 

require 'public/partials/header.php';

require 'public/partials/admindashbar.php';
?>
<br>

<hr>
<?php
          if(!empty($blogList)){
              foreach($blogList as $key=>$values){ ?>
<div class="col-md-4">
    Title : <?php echo $values['title'];?><br>
    Author : <?php echo $values['blogger'];?><br>
    content : <?php echo $values['content'];?><br>
    <a href="blogs">view</a>
</div>

<?php } 
          }else{ ?>
<div class="col-md-4">
    No record Found.
</div>
<?php }
        ?>

</div>