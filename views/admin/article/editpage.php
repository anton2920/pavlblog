<!-- Page Content -->
<div class="container ">
    <div class="row">
        <form action="/admin/article/edit/?id=<?=$data['article']['id']?>" method="post" class="login100-form" enctype="multipart/form-data">
            <br>
            <h2  class="mt-4">Edit article</h2>
            <!-- Title -->
            <p class="lead">
                <h5 class="mt-4"><b>Title</b></h5>
                <input class="form-control" type="text" name="title" value="<?=$data['article']['title']?>" required>
            </p><br>

            <!-- Author -->
            <p class="lead">
                <h5 class="mt-4"><b>Author</b></h5>
                <input class="form-control" type="text" name="author" value="<?=$data['article']['author']?>" required>
            </p><br>

            <!-- Preview Image -->
            <p class="lead">
            <h5 class="mt-4"><b>URL image</b></h5>
                <img style="width: 840px; height: 420px"  src="<?=defineUrlImage($data['article']['img'])?>" alt="current image of article"/><br><br>
            <input type="hidden" name="MAX_FILE_SIZE" value="32457280" />
            <input type="file" name="img" ><br>
            <br>Available types: png, jpeg, gif.
            <br>Available size: not more 30 Mb.
            </p>
            <br>

            <!-- Post Description -->
            <p class="lead">
                <h5 class="mt-4"><b>Description</b></h5>
                <textarea class="form-control" name="description" rows="6" value="qwd"><?=$data['article']['description']?></textarea>
            </p><br>

            <!-- Post Content -->
            <p class="lead">
                <h5 class="mt-4"><b>Content</b></h5>
                <textarea id="editor" class="form-control" name="content" rows="3" required><?=$data['article']['content']?></textarea>
                   <script>
                    ClassicEditor
                        .create( document.querySelector( '#editor' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>
            </p><br>

            <!-- Post Active -->
            <div class="checkwidth">
                <div class="form-check">
                    <input class="form-check-input" name="active" type="checkbox" id="active_add" <?php if($data['article']['active']) echo 'checked'?>>
                    <label class="form-check-label" for="active_add">
                        Active article
                    </label>
                </div>
            </div><br><hr>

            <!-- Categories List  -->
            <div class="checkwidth">
                <div class="form-check">
                    <h5 class="mt-4"><b>Categories</b></h5>
                    <br>
                    <?php foreach($data['categories'] as $item): ?>
                        <input class="form-check-input" name="categories[]" <?php if(!empty($data['categoriesOfArticle']) && in_array($item['id'],$data['categoriesOfArticle'])) echo 'checked';?> value="<?=$item['id']; ?>" type="checkbox" id="categories_add" >
                        <label class="form-check-label" for="categories_add">
                            <?=$item['name']; ?>
                        </label>
                    <?php endforeach; ?>
                </div>
                <br>
            </div>

            <div class="checkwidth">
                <input type="hidden" name="token" value="<?=password_hash($_SESSION['token'], PASSWORD_DEFAULT)?>">
                <input type="submit" value="SAVE" class="btn btn-success">
                <a class="btn btn-dark" href="/">Back</a>
                <br>
            </div>
        </form>
    </div>
</div>