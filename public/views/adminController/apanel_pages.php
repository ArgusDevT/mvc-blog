<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Статьи</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
%%HEADER%%
<div class="container mt-5 pt-5">
  <h1>Статьи</h1>
  <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createArticleModal">
    Создать новую статью
  </button>
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Название</th>
        <th>Действия</th>
      </tr>
    </thead>
    <tbody id="newsContainer">
      
    </tbody>
  </table>
  <nav aria-label="Page navigation" id="paginationContainer"></nav>
</div>
<div class="modal fade" id="createArticleModal" tabindex="-1" aria-labelledby="createArticleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createArticleModalLabel">Создать новую статью</h5>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="create_title" class="form-label">Название:</label>
            <input type="text" class="form-control" id="create_title">
          </div>
          <div class="mb-3">
            <label for="create_description" class="form-label">Описание:</label>
            <textarea class="form-control" id="create_description" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label for="create_body" class="form-label">Содержание:</label>
            <textarea class="form-control" id="create_body" rows="5"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
        <button type="button" class="btn btn-primary" id="create_news" data-bs-dismiss="modal">Создать</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editArticleModal" tabindex="-1" aria-labelledby="editArticleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editArticleModalLabel">Редактировать статью</h5>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="save_title" class="form-label">Название:</label>
            <input type="text" class="form-control" id="save_title">
          </div>
          <div class="mb-3">
            <label for="save_description" class="form-label">Описание:</label>
            <textarea class="form-control" id="save_description" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label for="save_body" class="form-label">Содержание:</label>
            <textarea class="form-control" id="save_body" rows="5"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
        <button type="button" class="btn btn-primary" id="save_news" data-bs-dismiss="modal">Сохранить изменения</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="deleteArticleModal" tabindex="-1" aria-labelledby="deleteArticleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteArticleModalLabel">Удалить статью</h5>
      </div>
      <div class="modal-body">
        <p>Вы уверены, что хотите удалить эту статью?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-dismiss="modal">Отмена</button>
        <button type="button" id="delete_button" data-bs-dismiss="modal" class="btn btn-danger">Удалить</button>
      </div>
    </div>
  </div>
</div>
<div id="alertContainer" class="fixed-top-right"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>var crsf_token = '%%CRSF_TOKEN%%';</script>
<script src="../public/js/alerts.js"></script>
<script src="../public/js/apanel_pages.js"></script>
</body>
</html>
