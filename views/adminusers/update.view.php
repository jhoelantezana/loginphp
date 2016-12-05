<?php 
    require_once APP_PATH . '/views/layaut/header.view.php';
    include_once APP_PATH . '/views/layaut/sidebar.view.php';
    $months = ['ene','feb','mar','abr','jun','jul','ago','sep','oct','nov','dic'];
?>
    <section class="main__content">
        <?= require_once APP_PATH . '/views/blocks/updateuser.view.php'?>
    </section>
<?php require_once APP_PATH . '/views/layaut/footer.view.php'?>