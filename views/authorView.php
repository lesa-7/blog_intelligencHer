<?php 
require_once 'partials/header.php';
require_once 'model/managers/CategoryManager.php';
require_once 'model/managers/UserManager.php';
require_once 'model/managers/PostManager.php';
require_once 'author.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auteur</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>

    <h1 class="text-center mt-3"><?php 
        if($userInfos !=  null) {
            echo "auteur : ".$userInfos->getUserPseudo();
        } else {
            echo "aucun auteur";
        }
    ?></h1>

    <section class="container mt-5">
        <div class="row">
            
            <?php
            foreach($userPosts as $post) { ?>
                <div class="card" style="width: 18rem;">
                <img src="<?php echo $post->getPicture() ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post->getTitle() ?></h5>
                    <a href="single.php?id=<?php echo $post->getPostId() ?>" class="btn btn-primary">Voir l'article</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>

</body>

</html>

<?php 
require_once 'partials/footer.php';
?>