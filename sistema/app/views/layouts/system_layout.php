<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Dashboard Principal - ERP System</title>
    <link rel="stylesheet" href="/static/css/bootstrap.css">
    <link rel="stylesheet" href="/static/css/fontawesome.css">
    <link rel="stylesheet" href="/static/css/main.css">
</head>

<body>
    <div class="wrapper">
        <?php require __DIR__ . '/../partials/system_sidebar.php'; ?>
        <div id="content">
            
            <?php require __DIR__ . '/../partials/system_header.php'; ?>

            <main class="container-fluid py-4 px-4">
                <?= $content ?>
            </main>
        </div>
    </div>
  

    <script src="/static/js/jquery.js"></script>
    <script src="/static/js/popper.js"></script>
    <script src="/static/js/bootstrap.js"></script>
</body>

</html>