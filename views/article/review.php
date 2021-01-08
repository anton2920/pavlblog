<?php
use App\Models\admin\Admin;
?>
<!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Post Content Column -->
            <div class="col-lg-8">
                <!-- Title -->
                <h1 class="mt-4"><?php echo $data['article']['title'];?></h1>
                <!-- Author -->
                <p class="lead">
                    by
                    <bold><?php echo $data['article']['author'];?></bold>
                </p>
                <hr>
                <!-- Date/Time -->
                <p>Posted on <?php echo $data['article']['datepublished'];?></p>
                <?php if(isset($data['article']['datalastedit'])) echo 'Modifed on ' . $data['article']['datalastedit'];?>
                <hr>
                <!-- Preview Image -->
                <img class="img-fluid rounded" src="<?=defineUrlImage($data['article']['img'])?>" >
                <hr>
                <!-- Post Content -->
                <p>
                    <?php echo $data['article']['content'];?>
                </p>

                <hr>
                <?php if(Admin::isAdmin()): ?>
                    <a href="/admin/article/editpage/?id=<?=$data['article']['id']?>" class="btn btn-primary">Edit</a>
                    <a href="/admin/article/delete/?id=<?=$data['article']['id']?>" class="btn btn-primary">Delete</a>
                <?php endif; ?>
                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <form action="/article/addcomment/?article=<?=$data['article']['id']?>" method="post">
                            <div class="form-group">
                                <input class="form-control" type="text" name="author" placeholder="Name" required>
                                <hr>
                                <textarea class="form-control" name="message" placeholder="Comment" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <?php foreach($data['comments'] as $item): ?>
                    <!-- Single Comment -->
                    <div class=" card media mb-4">
                        <div class=" card-body media-body">
                            <h5 class="mt-0"> - <?=$item['author']?></h5>
                            <p><?=$item['message']?></p>
                            <?php if(Admin::isAdmin()): ?>
                                <hr>
                                <a href="/admin/article/deletecomment/?id=<?=$item['id']?>&article=<?=$data['article']['id']?>" class="btn btn-primary">Delete</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="col-md-4">
                <br>
                <!-- Search Widget -->
                <?php require_once "../views/widget/widget-search.php"; ?>
                <!-- Categories Widget -->
                <?php require_once "../views/widget/widget-category.php"; ?>

            </div>
        </div>
    </div>