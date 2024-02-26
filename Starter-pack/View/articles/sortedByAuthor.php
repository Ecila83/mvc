<?php require 'View/includes/header.php' ?>

<section>
    <?php if ($page !== 'articles-show') : ?> 
        <h1>Articles Triés par Auteur</h1>
       
        <form method="GET" action="index.php">
            <label for="author">Choisir un auteur :</label>
            <input type="text" id="author" name="author">
            <button type="submit">Rechercher</button>
            <input type="hidden" name="page" value="sortByAuthor">
        </form>
        <ul>
            <?php foreach ($authors as $author) : ?>
                <li>
                    <a href="index.php?page=sortByAuthor&author=<?= urlencode($author) ?>">
                        <?= $author ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <ul>
        <?php foreach ($articles as $article) : ?>
            <li>
                <strong><?= $article->title ?></strong> (<?= $article->formatPublishDate() ?>) - <?= "By ".$article->author ?>
                
                <p><img src="<?= $article->url_images ?>" alt="<?= $article->title ?>"width="400" height="250"><?= $article->description ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</section>

<?php require 'View/includes/footer.php' ?>