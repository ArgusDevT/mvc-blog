function loadNews(page) {
  $.ajax({
    url: "api/v1",
    type: "POST",
    data: { page: page, method: "getNews" },
    success: function (response) {
      var newsHtml = "";
      console.log(response);
      response.news.forEach((news) => {
        newsHtml += `
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title">${news.title}</h5>
                            <p class="card-text">${news.description}</p>
                            <a href="#" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                </div>`;
      });
      $("#newsContainer").html(newsHtml);

      var totalPages = response.totalPages;
      var paginationHtml = "";
      for (var i = 1; i <= totalPages; i++) {
        paginationHtml += `<li class="page-item"><a class="page-link" href="#" onclick="loadNews(${i})">${i}</a></li>`;
      }
      $("#paginationContainer").html(
        `<ul class="pagination justify-content-center">${paginationHtml}</ul>`
      );
    },
    error: function () {
      console.log("Ошибка загрузки новостей");
    },
  });
}

$(document).ready(function () {
  loadNews(1);
});
