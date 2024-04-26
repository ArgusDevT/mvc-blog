<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блог - Просмотр новости</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        <div class="mb-3">
            <label for="nameInput" class="form-label">Имя</label>
            <input type="text" class="form-control" id="nameInput" placeholder="Эван">
        </div>
        <div class="mb-3">
            <label for="rewiewArea" class="form-label">Текст Комментария</label>
            <textarea class="form-control" id="rewiewArea" rows="3"></textarea>
        </div>
        <button class="form-control mb-5">Отправить</button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
