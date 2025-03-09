<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>

    <?php if ($_ENV['CI_ENVIRONMENT'] === 'development') : ?>
        <link rel="stylesheet" href="http://localhost:3000/scss/style.scss">
    <?php else : ?>
        <link rel="stylesheet" href="<?= base_url('dist/style.css'); ?>">
    <?php endif; ?>

    <!-- DataTables & CDN Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <?= $this->renderSection('content'); ?>

    <!-- Load JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if ($_ENV['CI_ENVIRONMENT'] === 'development') : ?>
        <script type="module" src="http://localhost:3000/@vite/client"></script>
        <script type="module" src="http://localhost:3000/js/tasks.js"></script>
    <?php else : ?>
        <script src="<?= base_url('dist/tasks.js'); ?>"></script>
    <?php endif; ?>
</body>
</html>
