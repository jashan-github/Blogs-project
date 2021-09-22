<?php

use DevCoder\SessionManager;

require 'public/partials/header.php';

require 'public/partials/navbar.php';
?>
<br><br>

<div class="container">
    <?php 
             $sessionManager = new SessionManager();
             $message =  $sessionManager->get("message");
             
             if(!empty($message)){?>

    <div class="alert alert-success" role="alert">
        <?php echo $message;?>
    </div>
    <?php } ?>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card-header text-center">
                <h2> Blog's List </h2>
            </div>
            <div class="card-body">
                <?php if (!empty($blogs)) {?>
                <table class="table display responsive-table">
                    <thead>
                        <th> id</th>
                        <th> Title</th>
                        <th> Content</th>
                        <th> Author Name</th>
                        <th> Action</th>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($blogs as $key=> $blog){ ?>
                        <tr>
                            <td> <?php echo $key+1; ?></td>
                            <td> <?php echo $blog['title']; ?></td>
                            <td> <?php                            
                            
                            // strip tags to avoid breaking any html
                            $string = strip_tags($blog['content']);
                            if (strlen($string) > 50) {

                                // truncate string
                                $stringCut = substr($string, 0, 50);
                                $endPoint = strrpos($stringCut, ' ');

                                //if the string doesn't contain any space then it will cut without word basis.
                                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                //$string .= "... <a href='view-blog?id=".$blog['id']."'>Read More</a>";
                                
                            }
                            echo $string;
                            ?></td>
                            <td> <?php echo $blog['blogger'];?></td>
                            <td>
                                <a href="publicblog?id=<?php echo $blog['id']?>" class="btn btn-primary">View
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php }else{?>
                <h4>No Record Found.</h4>
                <?php } ?>

            </div>
        </div>
    </div>
</div>