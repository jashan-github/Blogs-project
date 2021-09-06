<?php

require 'public/partials/header.php';

require 'public/partials/navbar.php';
?>
<h2> All users</h2>
<ul>
    <?php foreach ($users as $user) : ?>
    <li> <?php echo $user->name; ?></li>
    <?php endforeach; ?>
</ul>
<h1> Submit your name</h1>

<form method="POST" action="/users">
    <input name="name"></input>
    <button type="submit"> Submit</button>
</form>




<?php require 'public/partials/footer.php'; ?>