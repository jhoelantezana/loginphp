<?php include_once APP_PATH . '/views/layaut/header.view.php'?>
<?php include_once APP_PATH . '/views/layaut/sidebar.view.php'?>
<section class="main__content">
    <div class="E404">
        <p class="E404__message">Lo sentimos, esta página no está disponible: <?=$E404Message ?? ''?></p>
    </div>
</section>
<?php include_once APP_PATH . '/views/layaut/footer.view.php'?>