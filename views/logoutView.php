
<?php
require_once 'partials/header.php';
//var_dump($posts);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>

    <img src="images/img1.jpg" class="img-fluid">

<!--
<section class="container mt-2">
<div class=row>
    <?php foreach($posts as $post){ ?>
         <div class="card" class="col-12 col-md-4 col-lg-2">
         <img src="..." class="card-img-top" alt="...">
         <div class="card-body">
             <h5 class="card-title"><?php echo $post->getTitle();?></h5>
             <p class="card-text">Description article</p>
             <a href="single.php?id=<?php echo $post->getPostId();?>" class="btn btn-primary">Lire l'article</a>
         </div>
     </div>
   <?php } ?>
   
</div>
</section>
 -->
</body>

</html>

<?php
require_once 'partials/footer.php';
?>

