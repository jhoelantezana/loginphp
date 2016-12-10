<section class="showPost">
    <?php foreach($blogPosts as $post): ?>
        <article class="post">
            <div class="post__item">
                <div class="post__img">
                    <img src="<?=PUBLIC_PATH . '/assets/img/blog/' . $post['image'] ?? ''?>" alt="imgpost" class="">
                </div>
                <div class="post__item__subitem">
                    <h2 class="post__title"><?=$post['title'] ?? ''?></h2>
                    <p class="post__content">
                        <?=$post['content'] ?? ''?>
                        <a href="#"class="post__readMore">Seguir leendo</a>;
                    </p>
                </div>
            </div>
            <div class="post__item">
                <div class="post__autor">
                    <img src="<?=PUBLIC_PATH . '/assets/img/' . $post['autorProfile']?>" class="post__autor__img" alt="ImgProfile">
                    <div class="post__autor__data">
                        <p class="post__autor__name"><?=$post['autor'] ?? ''?></p>
                        <p class="post__date"><?=$post['date'] ?? ''?></p>
                    </div>
                </div>
                <div class="post__item__subitem"></div>
            </div>
        </article>
    <?php endforeach;?>
</section>
<div class="showPost__pagination pagination">
    <?php if(isset($page)):?>
    <ul class="pagination__ul">
        <li class="pagination__item"><a href="/index?pg=<?=$page['prevPage']?>" class="pagination__link">Anterior</a></li>
        <?php 
            for($i = 1; $i <= $page['numPages']; $i++){
                if($i == $page['actualPage']){ ?>
                <li class="pagination__item"><a href="/index?pg=<?=$i?>" class="pagination__link pagination__active"><?=$i?></a></li>
                <?php }else{ ?>
                <li class="pagination__item"><a href="/index?pg=<?=$i?>" class="pagination__link"><?=$i?></a></li>
                <?php }
            }
        ?>
        <li class="pagination__item"><a href="/index?pg=<?=$page['nextPage']?>" class="pagination__link">Siguinete</a></li>
    </ul>
    <?php endif;?>
</div>