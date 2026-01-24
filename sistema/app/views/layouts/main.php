<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Mi App' ?></title>
    <link rel="stylesheet" href="/static/css/bootstrap.css">
    <link rel="stylesheet" href="/static/css/fontawesome.css">
    <link rel="stylesheet" href="/static/css/main.css">
</head>
<body>

<?php
if (isset($_SESSION['email'])){
    require __DIR__ . '/../partials/header.php'; 
} 
?>



<main>
    <?= $content ?>
</main>

<?php 
#require __DIR__ . '/../partials/footer.php'; 
?>

    <script src="/static/js/jquery.js"></script>
    <script src="/static/js/popper.js"></script>
    <script src="/static/js/bootstrap.js"></script>

</body>
</html>