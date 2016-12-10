<section class="editPost">
    <form action="/blog/update?id=<?=$posts['id']?>" method="POST" class="editPost__form" enctype="multipart/form-data">
        <input type="text" name="title" value="<?=$posts['title'] ?? ''?>">
        <textarea name="content" id="" cols="30" rows="10"><?=$posts['content'] ?? ''?></textarea>
        <div class="editPost__form__img">
            <img src="<?=PUBLIC_PATH . '/assets/img/blog/' . $posts['image'] ?? ''?>" alt="Image Post">
            <input type="file" name="imgPost">
        </div>
        <input type="hidden" value="<?=$posts['image']?>" name="imageName">
        <input type="submit" value="Guardar Cambios">
    </form>
</section>