<?php
$articles = file_get_contents("news.json");
$articles = json_decode($articles, true);
$articles = $articles['results'];
?>
<!doctype html>
<html lang="en">
<head>
    <title>VIDAL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="./">VIDAL</a>
</nav>
<div class="container mt-5 mb-5">
    <div class="row" id="list-article">
        <?php for ($i = 0; $i < 5; $i++) { ?>
            <!-- article vidal -->
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= $articles[$i]['images'][0]['thumbnail_url_image'] ?>" class="card-img" alt="<?= $articles[$i]['images'][0]['description_image'] ?>" style="width: 300px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $articles[$i]['title_news'] ?></h5>
                            <p class="card-text"><?= strlen($articles[$i]['summary_news']) < 500 ? $articles[$i]['summary_news'] : substr($articles[$i]['summary_news'], 0, 500) . '...' ?></p>
                            <p class="card-text">
                                <small class="text-danger"><?= $articles[$i]['type']['name_type'] ?></small>
                                <small class="text-muted float-right"><?= date('d/m/y', strtotime($articles[$i]['publication_date_news'])) ?></small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="row justify-content-center">
            <button class="btn btn-primary" id="chargement">charger plus</button>
    </div>

</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
<script src="./script.js"></script>
</body>
</html>
