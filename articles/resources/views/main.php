<?php foreach ($categories as $category) : ?>
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <h3 class="mb-0 text-capitalize"><?= $category['name']; ?></h3>
            <a href="/articles?category=<?=$category['category_code'];?>" class="stretched-link">Перейти</a>
        </div>
    </div>
<?php endforeach; ?>
