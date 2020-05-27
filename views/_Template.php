<!doctype html>
<html lang="pt-br">
<head><title><?= $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= asset('css/Bootstrap/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/chat.css') ?>">
    <link rel="icon" href="<?= asset('img/logo.png') ?>">
</head>
<body>
    <main class="main_content container-fluid">
        <?= $v->section("content"); ?>
    </main>
</body>
    <script src="<?= asset('js/jquery.js') ?>"></script>
    <?= $v->section("scripts"); ?>
</html>