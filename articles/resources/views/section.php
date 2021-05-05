<?php foreach ($articles as $article) : ?>
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary text-capitalize"><?= $article['name']; ?></strong>
            <h3 class="mb-0"><?= $article['title']; ?></h3>
            <div class="mb-1 text-muted"><?= $article['date']; ?></div>
            <div class="mb-1 text-success fw-bold">Автор: <?= $article['author']; ?></div>
            <a href="/articles/<?=$article['category_code'];?>/<?=$article['furl'];?>" class="stretched-link">Continue reading</a>
        </div>
    </div>
<?php endforeach; ?>

<?php if ($pages > 1) : ?>
    <ul class="pagination pagination-lg justify-content-center">
        <?php for ($p = 1; $p <= $pages; $p++) :?>
            <li class="page-item">
                <a href="/articles/<?= $articles[0]['category_code'];?>?page=<?= $p;?>" class="page-link"><?= $p;?></a>
            </li>
        <?php endfor; ?>
    </ul>
<?php endif; ?>

