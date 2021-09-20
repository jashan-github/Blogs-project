<?php

require 'public/partials/header.php';

require 'public/partials/navbar.php';
?>

<br><br>
<div class="container">
    <div class="row">
    </div>
    <div class="jumbotron">
        <h3>public blogs view</h3>
    <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile-first projects on the web.</p> 
    </div>
    <hr>
    <div class="row">
       <?php foreach($blogs as $blog){?>
        <li> <?php echo $blog->title; ?></li>
       <?php  } ?>
    </div>
</div>

<?php require 'public/partials/footer.php'; ?>