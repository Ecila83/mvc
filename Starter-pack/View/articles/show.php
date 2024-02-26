<?php require 'View/includes/header.php'?>

<?php // Use any data loaded in the controller here ?>

<section>
    <h1><?= $article->title ?></h1>
    <p><?= $article->formatPublishDate() ?></p>
    <img src="<?= $article->url_images ?>" alt="<?= $article->title ?>"width="400" height="250">
    <p><?= $article->description ?></p>
    <p><?=$article->author?>

    <?php if ($prev !== null || $next !== null): ?>
    <div>
        <?php 
        if ($prev !== null) {
            echo "<a href='?page=articles-show&id=$prev'>Article précédent</a>";
        }

        if ($prev !== null && $next !== null) {
            echo " | ";
        }

        if ($next !== null) {
            echo "<a href='?page=articles-show&id=$next'>Article suivant</a>";
        }
        ?>
    </div>
    <?php endif; ?>
    
</section>

<?php require 'View/includes/footer.php'?>