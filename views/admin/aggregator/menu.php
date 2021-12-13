<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <span class="login100-form-title p-b-32">
                News Aggregator Panel
            </span>

            <div class="flex-sb-m flex-w">
                <!--<a class="login100-form btn btn-dark" href="/admin/article/addpage">Add article</a>-->

            </div>
            <?php if(isset($_SESSION['aggregator'])): ?>
            <div class="alert alert-info" role="alert">
               <?php
                    echo  $_SESSION['aggregator'];
                    unset($_SESSION['aggregator']);
               ?>
            </div>
            <?php endif; ?>
            <h4>News publications:</h4>
            <br>
            <form action="/admin/aggregator/update" method="POST">
                <div class="row">
                    <div class="left-column"><input type="checkbox"  name='LENTA' id="LENTA"></div>
                    <div class="right-column" style="padding-left: 10px"><label for="LENTA"> Lenta.ru</label></div>
                </div>
                <div class="row">
                    <div class="left-column"><input type="checkbox"  name='KOMMERSANT' id="KOMMERSANT"></div>
                    <div class="right-column" style="padding-left: 10px"><label for="KOMMERSANT"> Kommersant.ru </label></div>
                </div>
                <div class="row">
                    <div class="left-column"><input type="checkbox"  name='GAZETA' id="CNN"></div>
                    <div class="right-column" style="padding-left: 10px"><label for="CNN"> RG.RU </label></div>
                </div>
                <br>
                <input class="btn btn-dark" type="submit" value="Update news from selected sources">
                <a class="btn btn-dark" href="/admin/main/menu/">Back</a>
            </form>


        </div>
    </div>
</div>