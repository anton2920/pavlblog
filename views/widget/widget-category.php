<!-- Categories Widget -->
<div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
        <?php foreach($data['categories'] as $item): ?>
            <li>
                <a href="/article/category/?category=<?=$item['id']?>"> - <?=$item['name']?></a>
            </li>
        <?php endforeach; ?>
    </div>
</div>