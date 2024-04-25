<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блог - Новости</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="pt-5">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Мой блог</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Новости</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">О нас</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h2 class="mt-5 mb-4">Последние новости</h2>
        <div class="row" id="newsContainer"></div>
        <nav aria-label="Page navigation" id="paginationContainer"></nav>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/index.js"></script>
</body>

</html>