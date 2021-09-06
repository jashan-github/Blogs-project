<?php

require 'public/partials/header.php';

require 'public/partials/navbar.php';
?>
welcome to index dashboard

<!-- <ul>
    <?php foreach ($tasks as $task) : ?>
    <li>
        <?php if($task->completed) : ?>
        <strike><?=$task->description; ?> </strike>
        <?php else: ?>

        <?= $task->description; ?>
        <?php endif;?>
    </li>
    <?php endforeach; ?>
</ul> -->

<?php require 'public/partials/footer.php'; ?>