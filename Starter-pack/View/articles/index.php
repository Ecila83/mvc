<?php require 'View/includes/header.php'?>

<?php // Use any data loaded in the controller here ?>

<section>
    <h1>Articles</h1>
    
    <ul>
        <?php foreach ($articles as $index => $article) : ?>
            <li><a href="?page=articles-show&id=<?= $index ?>"><?= $article->title ?> (<?= $article->formatPublishDate() ?>)</a></li>
        <?php endforeach; ?>
    </ul>
</section>

<?php require 'View/includes/footer.php'?>