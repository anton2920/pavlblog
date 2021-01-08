<?php
use App\Models\admin\Admin;
?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->

        <div class="col-md-8">
            <h1 class="my-4">Category:
                <bold><?php echo $data['datacategory']['name'];?></bold>
            </h1>
            <!-- Blog Post -->
            <?php if(!empty($data['articles'])): ?>
                <?php foreach($data['articles'] as $item): ?>
                    <div class="card mb-4">
                        <img class="card-img-top" src="<?=defineUrlImage($item['img'])?>" alt="Card image cap">
                        <?php if($item['active'] == 0 && Admin::isAdmin()): ?>
                            <div class="alert alert-warning" role="alert">
                                <b>Warning!</b>  This article is inactive now and it don't view for user's.
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <h2 class="card-title"><?=$item['title']?></h2>
                            <p class="card-text"><?=$item['description']?></p>
                            <a href="/article/review/?article=<?=$item['id']?>" class="btn btn-primary">Read More</a>
                            <?php if(Admin::isAdmin()): ?>
                                <a href="/admin/article/editpage/?id=<?=$item['id']?>" class="btn btn-primary">Edit</a>
                                <a href="/admin/article/delete/?id=<?=$item['id']?>" class="btn btn-primary">Delete</a>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on <?=$item['datepublished']?> by
                            <b ><?=htmlspecialchars($item['author'])?></b>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
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
</div>
<!-- /.container -->
<!-- Pagination -->
<?=$data['pagination'];?>
