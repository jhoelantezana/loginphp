<?php 
    include_once APP_PATH . '/views/layaut/header.view.php';
    $months = ['ene','feb','mar','abr','jun','jul','ago','sep','oct','nov','dic'];
?>
<main class="main">
    <div class="modal" id="vmpaddPost">
        <?php require_once APP_PATH . '/views/blog/addpost.view.php'?>
    </div>
    <div class="contentFluit main__content">
        <div class="main__sidebar">
            <?php include_once APP_PATH . '/views/layaut/sidebar.view.php'?>
        </div>
        <section class="SWBanner">
            <div class="SWBanner__profile">
                <div class="SWBanner__profile__item">
                    <img src="<?= PUBLIC_PATH . '/img/' . $user['profileImg']?>" alt="profile" class="SWBanner__profile__img">
                </div>
                <div class="SWBanner__profile__item">
                    <h1 class="SWBanner__profile__fullname"><?="{$user['fullName']}"?></h1>
                    <p class="SWBanner__profile__email"><?= $user['email']?></p>
                    <p class="SWBanner__profile__username"><?= $user['userName']?><span></span> </p>
                </div>
            </div>
            <div class="SWBanner__edit">
                <a href="/auupdate?id=<?=$user['id']?>" class="btn">Editar Perfil</a>
                <a href="/audelete?id=<?=$user['id']?>" class="btn">Eliminar Cuenta</a>
            </div>
            <?php include_once APP_PATH . '/views/blocks/updateuser.view.php'?>
        </section>
    </div>
</main>
<?php include_once APP_PATH . '/views/layaut/footer.view.php'?>