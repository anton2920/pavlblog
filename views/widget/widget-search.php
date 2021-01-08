<!-- Search Widget -->
<div class="card my-4">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
        <form action="/" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="condition" value="<?php if(isset($_GET['condition'])) echo htmlentities($_GET['condition'])?>" placeholder="Request...">
                <span class="input-group-append">
                    <input class="btn btn-dark"  type="submit" value="Go!">
                </span>
            </div>
        </form>
    </div>
</div>