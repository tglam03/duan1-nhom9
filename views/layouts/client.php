<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>SHOP BÁN QUẦN ÁO</title>
    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="<?= BASE_URL; ?>assets/client/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL; ?>assets/client/css/style.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <?php
    if(isset($style) && $style){
        require_once PATH_VIEW . 'styles/' . $style . '.php';
    }
    ?>

    <!-- YOUR CUSTOM CSS -->
    <link href="<?= BASE_URL; ?>assets/client/css/custom.css" rel="stylesheet">

</head>

<body>

    <div id="page">
        <?php require_once PATH_VIEW . 'layouts/partials/sidebar.php' ?>
        <!-- /main -->
        <?php require_once PATH_VIEW . $view .'.php'; ?>
        <!-- footer -->
        <?php require_once PATH_VIEW . 'layouts/partials/footer.php' ?>
        <!--/footer-->
    </div>
    <!-- page -->

    <div id="toTop"></div><!-- Back to top button -->

    <!-- COMMON SCRIPTS -->
    <script src="<?= BASE_URL; ?>assets/client/js/common_scripts.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/client/js/main.js"></script>
    <!-- SPECIFIC SCRIPTS -->
    <?php
    if(isset($script) && $script){
        require_once PATH_VIEW . 'scripts/' . $script . '.php';
    }
    if(isset($script1) && $script1){
        require_once PATH_VIEW . 'products/' . $script1 . '.php';
    }
    ;?>
</body>

</html>