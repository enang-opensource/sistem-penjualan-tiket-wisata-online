<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <!-- base:css -->
    <link rel="stylesheet" href="<?= base_url('/admins/vendors/mdi/css/materialdesignicons.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/vendors/css/vendor.bundle.base.css'); ?>">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('/admins/css/style.css'); ?>">
    <!-- endinject -->
</head>

<body>

    <?= $this->renderSection('content'); ?>

    <!-- container-scroller -->
    <!-- base:js -->
    <script src="<?= base_url('/admins/vendors/js/vendor.bundle.base.js'); ?>"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="<?= base_url('/admins/js/off-canvas.js'); ?>"></script>
    <script src="<?= base_url('/admins/js/hoverable-collapse.js'); ?>"></script>
    <script src="<?= base_url('/admins/js/template.js'); ?>"></script>
    <!-- endinject -->
</body>

</html>