<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блог - Просмотр новости</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body class="pt-5">
    %%HEADER%%
    <div class="container">
        <div class="mt-5">
            <div><a href="/">Статьи</a> > %%TITLE%%</div>
            <h2>%%TITLE%%</h2>
            <h4>%%DESCRIPTION%%</h3>
            <h6>%%BODY%%</h6>
        </div>
        <br><hr>
        <h3>Комментарии</h3>
        <div class="row d-flex flex-column" id="commentContainer"></div>
        <nav aria-label="Page navigation" id="paginationContainer"></nav>
        <br><hr>
        <div class="mb-3">
            <label for="nameInput" class="form-label">Имя</label>
            <input type="text" class="form-control" id="nameInput" name="name" placeholder="Эван">
        </div>
        <div class="mb-3">
            <label for="rewiewArea" class="form-label">Текст Комментария</label>
            <textarea class="form-control" id="rewiewArea" name="comment" rows="3"></textarea>
        </div>
        <button class="form-control mb-5" id="sendComment">Отправить</button>
    </div>
    <div id="alertContainer" class="fixed-top-right"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>var crsf_token = '%%CRSF_TOKEN%%';</script>
    <script src="public/js/alerts.js"></script>
    <script src="public/js/comments.js"></script>
</body>

</html>
