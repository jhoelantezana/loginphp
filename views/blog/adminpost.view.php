<section class="adminPost">
    <div class="table__container">
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th>Autor</th>
                    <th>Fecha</th>
                    <th>Titulo</th>
                    <th>Imagen Miniatura</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach($posts as $post): ?>
                    <tr>
                        <td>
                            <?=$post['autor']?>
                            <img src="<?=PUBLIC_PATH . '/assets/img/' . $post['autorProfile']?>" alt="Autor Profile">
                        </td>
                        <td><?=$post['date']?></td>
                        <td><?=$post['title']?></td>
                        <td>
                            <img src="<?=PUBLIC_PATH . '/assets/img/blog/' . $post['image'] ?? ''?>" alt="img post">
                        </td>
                        <td>
                            <a href="/blog/delete?id=<?=$post['id']?>">Eliminar</a>
                            <a href="/blog/edit?id=<?=$post['id']?>">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>