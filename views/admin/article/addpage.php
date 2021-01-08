<!-- Page Content -->
<div class="container ">
    <div class="row">
        <form action="/admin/article/add" method="POST" class="login100-form" enctype="multipart/form-data">
            <br>
            <h2  class="mt-4">Add article</h2>
            <!-- Title -->
            <p class="lead">
                <h5 class="mt-4"><b>Title</b></h5>
                <input class="form-control" type="text" name="title" required>
            </p><br>

            <!-- Author -->
            <p class="lead">
                <h5 class="mt-4"><b>Author</b></h5>
                <input class="form-control" type="text" name="author" required>
            </p><br>


            <!-- Preview Image -->
            <p class="lead">
                <h5 class="mt-4"><b>URL image</b></h5>
                    <input type="hidden" name="MAX_FILE_SIZE" value="32457280" />
                    <input type="file" name="img" required><br>
            <br>Available types: png, jpeg, gif.
            <br>Available size: not more 30 Mb.
            </p>
            <br>

            <!-- Post Definition -->
            <p class="lead">
                <h5 class="mt-4"><b>Description</b></h5>
                <textarea class="form-control" name="description" rows="3" required></textarea>
            </p><br>

            <!-- Post Content -->
            <p class="lead">
                <h5 class="mt-4"><b>Content</b></h5>
                <textarea id="editor" class="form-control" name="content" rows="3" required><p></p></textarea>
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
                    <input class="form-check-input" name="active" type="checkbox" id="active_edit" >
                    <label class="form-check-label" for="active_edit">
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
                        <input class="form-check-input" name="categories[]"  value="<?=$item['id']; ?>" type="checkbox" id="categories_edit" >
                        <label class="form-check-label" for="categories_edit">
                            <?=$item['name']; ?>
                        </label>
                    <?php endforeach; ?>
                </div>
                <br>
            </div>

            <div class="checkwidth">
                <input type="hidden" name="token" value="<?php if(isset($_SESSION['token'])) echo password_hash($_SESSION['token'], PASSWORD_DEFAULT)?>">
                <input type="submit" value="SAVE" class="btn btn-success">
                <a class="btn btn-dark" href="/admin/main/menu">Back</a>
                <br>
            </div>
        </form>
    </div>
</div>