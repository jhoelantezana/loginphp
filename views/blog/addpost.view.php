<section class="addPost modal__content">
    <form action="/blog/newpost" class="addPost__form" method="POST" enctype="multipart/form-data">
        
        <input type="text" name="titlePost" class="addPost__form__title" placeholder="Ingrese el titulo" required id="titlePost">
        
        <textarea name="contentPost" id="contentPost" cols="30" rows="10" class="addPost__form__content" required></textarea>
        <addPost class="addPost__form__options">
            <input type="file" name="imgPost">
            <input type="submit" value="Publicar Entrada">
            <span id="cmpaddPost" class="modal__close"> Cerrar </span>
        </addPost>
    </form>
</section>