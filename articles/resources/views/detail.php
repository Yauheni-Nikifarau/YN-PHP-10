<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold"><?= $post['title'];?></h1>
        <div class="container"><?= $post['content'];?></div>
        <a class="btn btn-primary btn-lg" href="/articles/<?= $post['category_code'];?>">К категории</a>
    </div>
</div>