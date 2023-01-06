<?php
require_once 'partials/header.php';
require_once 'addComment.php';
require_once 'model/managers/PostManager.php';
require_once 'model/managers/UserManager.php';
require_once 'model/managers/CommentManager.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>

    <div class="article">
        <h1><?php echo $post->getTitle(); ?></h1>

        <div>
            <p>Article écrit par
                <a href='author.php?id=<?php echo $user->getUserId(); ?>'>
                    <?php echo $user->getUserPseudo(); ?></a>
            </p>
        </div>

        <div>
            <p> le
                <?php 
                echo $post->getDate();
               ?>
            </p>
        </div>

        <div>
            <?php foreach($post_categories as $post_category){ ?>
            <a href="category.php?id=<?php echo $post_category->getCategoryId() ?>"
                class="badge rounded-pill text-bg-primary"><?php echo $post_category->getCategoryName() ?>
            </a>
            <?php } ?>
        </div>

        <div>
            <img src="<?php echo $post->getPicture(); ?>" class="img-fluid"></img>
        </div>

        <div class="content">
            <p><?php echo $post->getContent(); ?></p>
        </div>
    </div>

    <!-- Section commentaires -->
    <section>

        <!-- Titre -->
        <div>
            <h2 class="mb-3">Commentaires</h2>
        </div>

        <!-- Zone de texte commentaire -->
        <div class="form-floating mb-3" style="width: 40%">
            <textarea class="form-control" placeholder="Leave a comment here" id="comment" name="comment" style="height: 100px">
        </textarea>
            <label for="floatingTextarea1">Ecrivez votre commentaire ici</label>
        </div>

        <!-- Bouton Soumettre le commentaire avec méthode submit -->
        <input class="btn btn-primary mb-3" type="submit" value="Envoyer le commentaire">

        <!-- Liste des commentaires existants -->

        <?php foreach($comments as $comment){ ?>
        <div class="card border-dark mb-3" style="max-width: 40%;">

            <div class="card-header">
                <a href='author.php?id=<?php echo $user->getUserId(); ?>'>
                    <?php echo $user->getUserPseudo(); 
                ?></a>
            </div>

            <div class="card-body text-dark">
                <p class="card-text"><?php echo $comment->getCommentContent(); ?></p>

            </div>
        </div>
        <?php } ?>

            <!-- Bouton modifier le commentaire (si utilisateur connecté) -->



            <!-- Bouton supprimer le commentaire (si utilisateur connecté) -->

    </section>

</body>

</html>

<?php
require_once 'partials/footer.php';
?>