$("#login").click(()=>{
    $.ajax({
        url: "api/v1",
        type: "POST",
        data: {
            method: "login",
            username: $("#username").val(),
            password: $("#password").val(),
        },
        success: function(response) {
            if(response.response == true){
                $("#nameInput").val("")
                $("#rewiewArea").val("")
            }
            else{
              showAlert(response.error, "danger", 3000);
            }
        },
        error: function() {
            showAlert("Ошибка авторизации", "danger", 3000);
        },
    });
})
