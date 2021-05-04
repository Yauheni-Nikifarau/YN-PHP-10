<?php extract($pageData); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="/app/resources/css/bootstrap.css">
</head>
<body>
    <div class="container">

        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 link-secondary" href="/">Главная</a>
                <a class="p-2 link-secondary" href="/articles">Категории</a>
            </nav>
        </div>

        <?php include $content_view; ?>

    </div>
</body>
</html>
