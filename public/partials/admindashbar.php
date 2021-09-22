<?php 
use DevCoder\SessionManager;
require 'header.php';


?>
<link rel="stylesheet" href="/public/css/navbarcss.css">
    <nav>
        <label class="logo"> CMS </label>
        <ul>
            <li><a href="/dashboard">Home</a></li>
            <li><a href="/add-blog">Add-Blog</a></li>
            <!-- <li><a href="/members">Users-List</a></li> -->
            <?php
            $sessionManager = new SessionManager();
            $userData = $sessionManager->get("userData");
            if($userData['role_id']==1)
            {?>
                <li><a href="/members">Users-List</a></li>
            <?php } ?> 
                       
            <li><a href="/logout">logout</a></li>
        </ul>

    </nav>
</body>

</html>