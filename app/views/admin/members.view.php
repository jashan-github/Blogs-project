<?php 

require 'public/partials/header.php';

require 'public/partials/admindashbar.php';

?>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="line" style="text-align: right;">
                <a href="add-member" class="btn btn-primary"> Add Member</a>
            </div><br>
            <div class="card-header text-center">
                <h2> Member's List </h2>
            </div>
            <div class="card-body">
                <?php if (!empty($members)) {?>
                <table class="table display responsive-table">
                    <thead>
                        <th> id</th>
                        <th> Name</th>
                        <th> Email Address</th>
                        <th> Phone</th>
                        <!-- <th> Password</th> -->
                        <th> Creation Date</th>
                        <th> Action</th>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        foreach($members as $key => $member) { ?>
                        <tr>
                            <td> <?php echo $i; ?></td>
                            <td> <?php echo $member->name; ?></td>
                            <td> <?php echo $member->email; ?></td>
                            <td> <?php echo $member->phone; ?></td>
                            <!-- <td> <?php echo $member->password;?></td> -->
                            <td> <?php echo $member->creation_date;?></td>
                            <td>
                                <a href="edit-member?id=<?php echo $member->id;?>" class="btn btn-primary">Edit
                                </a>
                                <a onclick="return confirm('Are you sure you want to delete this item?');"
                                    href="delete-member?id=<?php echo $member->id;?>" class="btn btn-danger">Delete
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