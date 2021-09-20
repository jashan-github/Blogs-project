<?php 

require 'public/partials/header.php';

require 'public/partials/admindashbar.php';

?>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card-header text-center">
                <h3> Update Blog</h3>
            </div>
            <div class="card shadow">

                <div class="card-body">
                    <?php if(isset($_GET['error'])) {?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_GET['error'] ?>
                    </div>
                    <?php }?>

                    <form method="POST" action="edit-blog">
                        <input type="hidden" value="<?php echo $blogData->id;?>" name="id">
                        <div class="form-group">
                            <label for="title "> Name of the Title </label>
                            <input type="title" name="title" value="<?php echo $blogData->title;?>" class="form-control"
                                placeholder="Enter your title"><br>
                        </div>
                        <div class="form-group">
                            <label for="content"> Content</label><br>
                            <textarea name="content" class="form-control"
                                placeholder="Type here your content"><?php echo $blogData->content;?></textarea><br>
                        </div>
                        <div class="form-group col mb-3">
                            <button type="submit" class="btn btn-primary">Update Blog</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 

require 'public/partials/footer.php'; ?>