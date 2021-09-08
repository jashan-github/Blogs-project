<?php 

require 'public/partials/header.php';

require 'public/partials/admindashbar.php';

?>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="line" style="text-align: right;">
                <a href="add-member" class="btn btn-primary"> Add Blog</a>
            </div><br>
            <div class="card-header text-center">
                <h2> Blog's List </h2>
            </div>
            <div class="card-body">
                <?php if (!empty($blogs)) {?>
                <table class="table display responsive-table">
                    <thead>
                        <th> id</th>
                        <th> Title</th>
                        <th> Blog Content</th>
                        <!-- <th> Phone</th> -->
                        <!-- <th> Password</th> -->
                        <th> Publish Date</th>
                        <th> Action</th>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        foreach($blogs as $key => $blog) { ?>
                        <tr>
                            <td> <?php echo $i; ?></td>
                            <td> <?php echo $blog->title; ?></td>
                            <td> <?php echo $blog->content; ?></td>
                            <!-- <td> <?php echo $blog->phone; ?></td> -->
                            <!-- <td> <?php echo $blog->password;?></td> -->
                            <td> <?php echo $blog->publish_date;?></td>
                            <td>
                                <a href="edit-blog?id=<?php echo $blog->id;?>" class="btn btn-primary">Edit
                                </a>
                                <a onclick="return confirm('Are you sure you want to delete this item?');"
                                    href="delete-blog?id=<?php echo $blog->id;?>" class="btn btn-danger">Delete
                                </a>
                            </td>
                        </tr>

                        <?php $i++; } ?>
                    </tbody>
                </table>
                <?php }else{?>
                <h4>No Record Found.</h4>
                <?php } ?>


            </div>
        </div>
    </div>
</div>

<?php 

require 'public/partials/footer.php'; ?>