function loadNews(page) {
  $.ajax({
      url: "api/v1",
      type: "POST",
      data: {
          page: page,
          method: "getNews"
      },
      success: function(response) {
          if(response.response == true){
            var newsHtml = createNewsHtml(response.news);
            $("#newsContainer").html(newsHtml);
  
            var paginationHtml = createPaginationHtml(response.totalPages, page);
            $("#paginationContainer").html(paginationHtml);
  
            setActivePage(page);
          }
          else{
            showAlert(response.error, "danger", 3000);
          }
      },
      error: function() {
          showAlert("Ошибка загрузки новостей", "danger", 3000);
      },
  });
}

function createNewsHtml(newsList) {
  var newsHtml = "";
  newsList.forEach((news) => {
      newsHtml += `
          <div class="col-md-4">
              <div class="card mb-2">
                  <div class="card-body">
                      <h5 class="card-title">${news.title}</h5>
                      <p class="card-text">${news.description}</p>
                      <a href="/page?id=${news.id}" class="btn btn-primary">Читать</a>
                      <div class="create-date"><span>${news.date}</span></div>
                  </div>
              </div>
          </div>`;
  });
  return newsHtml;
}

function createPaginationHtml(totalPages, currentPage) {
  var paginationHtml = "";
  for (var i = 1; i <= totalPages; i++) {
      paginationHtml += `<li class="page-item ${i === currentPage ? 'active' : ''}"><a class="page-link" href="#" onclick="loadNews(${i})">${i}</a></li>`;
  }
  return `<ul class="pagination justify-content-center">${paginationHtml}</ul>`;
}

function setActivePage(page) {
  var allPageBtn = document.querySelectorAll(".page-item");
  allPageBtn.forEach((element) => {
      element.classList.remove("active");
      if (element.querySelector("a").innerText == page) {
          element.classList.add("active");
      }
  });
}

$(document).ready(function() {
  loadNews(1);
});
