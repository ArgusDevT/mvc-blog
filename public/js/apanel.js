$("#login").click(() => {
  $.ajax({
    url: "api/v1",
    type: "POST",
    data: {
      method: "login",
      username: $("#username").val(),
      password: $("#password").val(),
      crsf_token: crsf_token
    },
    success: function (response) {
      if (response.response == true) {
        $("#nameInput").val("");
        $("#rewiewArea").val("");
        location.href = "apanel/pages";
      } else {
        showAlert(response.error, "danger", 3000);
      }
    },
    error: function () {
      showAlert("Ошибка авторизации", "danger", 3000);
    },
  });
});
