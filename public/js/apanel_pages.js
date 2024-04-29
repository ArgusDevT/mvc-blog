let deleteId = 0;
let editid = 0;

function loadNews(page) {
  $.ajax({
    url: "../api/v1",
    type: "GET",
    data: {
      page: page,
      method: "getNews",
      crsf_token: crsf_token,
    },
    success: function (response) {
      if (response.response == true) {
        var newsHtml = createNewsHtml(response.news);
        $("#newsContainer").html(newsHtml);

        var paginationHtml = createPaginationHtml(response.totalPages, page);
        $("#paginationContainer").html(paginationHtml);

        setActivePage(page);

        var delbtn = document.querySelectorAll("#deletebtn");
        delbtn.forEach((element) => {
          element.addEventListener("click", () => {
            deleteId = element.getAttribute("x:id");
          });
        });

        var editbtn = document.querySelectorAll("#editbtn");
        editbtn.forEach((element) => {
          element.addEventListener("click", () => {
            editid = element.getAttribute("x:id");
            $.ajax({
                url: "../api/v1",
                type: "GET",
                data: {
                  method: "getEditNews",
                  id: editid,   
                  crsf_token: crsf_token,
                },
                success: function (response) {
                  if (response.response == true) {
                    $("#save_title").val(response.title)
                    $("#save_description").val(response.description)
                    $("#save_body").val(response.body)
                    loadNews(1);
                  } else {
                    showAlert(response.error, "danger", 3000);
                  }
                },
                error: function () {
                  showAlert("Ошибка получения новости", "danger", 3000);
                },
            });
          });
        });
      } else {
        showAlert(response.error, "danger", 3000);
      }
    },
    error: function () {
      showAlert("Ошибка загрузки новостей", "danger", 3000);
    },
  });
}

function createNewsHtml(newsList) {
  var newsHtml = "";
  newsList.forEach((news) => {
    newsHtml += `
            <tr>
                <td>${news.id}</td>
                <td>${news.title}</td>
                <td>
                <button type="button" x:id="${news.id}" id="deletebtn" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteArticleModal">Удалить</button>
                <button type="button" x:id="${news.id}" id="editbtn" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editArticleModal">Редактировать</button>
                </td>
            </tr>`;
  });
  return newsHtml;
}

function createPaginationHtml(totalPages, currentPage) {
  var paginationHtml = "";
  for (var i = 1; i <= totalPages; i++) {
    paginationHtml += `<li class="page-item ${
      i === currentPage ? "active" : ""
    }"><a class="page-link" href="#" onclick="loadNews(${i})">${i}</a></li>`;
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

$(document).ready(function () {
  loadNews(1);
});

$("#delete_button").click(() => {
  $.ajax({
    url: "../api/v1",
    type: "DELETE",
    data: {
      method: "deleteNews",
      delid: deleteId,
      crsf_token: crsf_token,
    },
    success: function (response) {
      if (response.response == true) {
        showAlert("Новость успешно удалена", "success", 3000);
        loadNews(1);
      } else {
        showAlert(response.error, "danger", 3000);
      }
    },
    error: function () {
      showAlert("Ошибка удаления", "danger", 3000);
    },
  });
});

$("#create_news").click(() => {
  $.ajax({
    url: "../api/v1",
    type: "POST",
    data: {
      method: "createNews",
      title: $("#create_title").val(),
      description: $("#create_description").val(),
      body: $("#create_body").val(),
      crsf_token: crsf_token,
    },
    success: function (response) {
      if (response.response == true) {
        $("#create_title").val(""),
          $("#create_description").val(""),
          $("#create_body").val(""),
          showAlert("Новая новость успешно создана", "success", 3000);
        loadNews(1);
      } else {
        showAlert(response.error, "danger", 3000);
      }
    },
    error: function () {
      showAlert("Ошибка удаления", "danger", 3000);
    },
  });
});

$("#save_news").click(() => {
  $.ajax({
    url: "../api/v1",
    type: "PUT",
    data: {
      method: "saveNews",
      title: $("#save_title").val(),
      description: $("#save_description").val(),
      body: $("#save_body").val(),
      id: editid,   
      crsf_token: crsf_token,
    },
    success: function (response) {
      if (response.response == true) {
        showAlert("Новость успешно обновлена", "success", 3000);
      } else {
        showAlert(response.error, "danger", 3000);
      }
    },
    error: function () {
      showAlert("Ошибка удаления", "danger", 3000);
    },
  });
});
