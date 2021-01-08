<?php
use \App\Models\Comment;
?>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <span class="login100-form-title p-b-32">
                Confirm comments
            </span>
            <?php if(!empty($data['allInactiveComments'])): ?>
                <?php foreach($data['allInactiveComments'] as $item): ?>
                <div class="card">
                    <div class="card-body">
                        <h6>
                            <a href="http://bloglyadov/article/review/?article=<?=$item['articleid']?>" class="card-title">
                                <b>Article: </b><?=Comment::getArticleWithInactiveComment($item['articleid'])?>
                            </a>
                        </h6>
                        <h6 class="card-title"><b>Author: </b><?=$item['author']?></h6>
                        <p class="card-text"><b>Message: </b><?=$item['message']?></p>
                        <hr>
                        <a href="/admin/main/approve/?id=<?=$item['id']?>" class="btn btn-success">Approve</a>
                        <a href="/admin/article/deletecomment/?id=<?=$item['id']?>" class="btn btn-warning">Cancel</a>
                    </div>
                </div><br>
                <?php endforeach; ?>
            <?php else: ?>
                <h3>All comments are approved :)</h3>
            <?php endif; ?>

            <a class="btn btn-dark" href="/admin/main/menu">Back</a>
        </div>

    </div>
</div>

<?php
