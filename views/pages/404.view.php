<?php include_once APP_PATH . '/views/layaut/header.view.php'?>
<main class="main">
    <div class="modal">
    </div>
    <div class="contentFluit main__content">
        <div class="E404">
            <p class="E404__message">Lo sentimos, esta página no está disponible: <?=$E404Message ?? ''?></p>
        </div>
    </div>
</main>
<?php include_once APP_PATH . '/views/layaut/footer.view.php'?>