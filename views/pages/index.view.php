<?php include_once APP_PATH . '/views/layaut/header.view.php'?>
<main class="main">
    
    <div class="contentFluit main__content">
        <div class="main__sidebar">
            <?php include_once APP_PATH . '/views/layaut/sidebar.view.php'?>
        </div>
        <section class="sonePost">
            <div class="sonePost__options">
                <span class="btn" id="ampaddPost">Publicar nueva entrada</span>
            </div>
            <?php require_once APP_PATH . '/views/blog/showpost.view.php'?>
        </section>
        <section class="soneWidgets">

        </section>
    </div>
</main>
<?php include_once APP_PATH . '/views/layaut/footer.view.php'?>