$("#sendComment").click(()=>{
    let params = (new URL(document.location)).searchParams; 

    $.ajax({
        url: "api/v1",
        type: "POST",
        data: {
            page: params.get("id"),
            method: "createComment",
            name: $("#nameInput").val(),
            comment: $("#rewiewArea").val(),
            crsf_token: crsf_token
        },
        success: function(response) {
            if(response.response == true){
                $("#nameInput").val("")
                $("#rewiewArea").val("")

                loadComents(1);
            }
            else{
              showAlert(response.error, "danger", 3000);
            }
        },
        error: function() {
            showAlert("Ошибка загрузки комментариев", "danger", 3000);
        },
    });
})

function loadComents(page) {
    let params = (new URL(document.location)).searchParams; 

    $.ajax({
        url: "api/v1",
        type: "POST",
        data: {
            page: page,
            idPage: params.get("id"),
            method: "getComments",
            crsf_token: crsf_token
        },
        success: function(response) {
            if(response.response == true){
              var newsHtml = createCommentsHtml(response.comments);
              $("#commentContainer").html(newsHtml);
    
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
  
function createCommentsHtml(commentsList) {
    var commentsHtml = "";
    commentsList.forEach((comment) => {
        commentsHtml += `
            <div class="col-md-12">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">${comment.name}</h5>
                        <p class="card-text">${comment.comment}</p>
                    </div>
                </div>
            </div>`;
    });
    return commentsHtml;
}
  
function createPaginationHtml(totalPages, currentPage) {
    var paginationHtml = "";
    for (var i = 1; i <= totalPages; i++) {
        paginationHtml += `<li class="page-item ${i === currentPage ? 'active' : ''}"><a class="page-link" href="#" onclick="loadComents(${i})">${i}</a></li>`;
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
    loadComents(1);
});
  
