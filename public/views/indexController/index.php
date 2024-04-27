<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блог - Новости</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body class="pt-5">
    %%HEADER%%
    <div class="container">
        <h2 class="mt-5 mb-4">Последние новости</h2>
        <div class="row" id="newsContainer"></div>
        <nav aria-label="Page navigation" id="paginationContainer"></nav>
    </div>
    <div id="alertContainer" class="fixed-top-right"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>var crsf_token = '%%CRSF_TOKEN%%';</script>
    <script src="public/js/alerts.js"></script>
    <script src="public/js/index.js"></script>
</body>

</html>
