var AdminService = {
  init: function() {
    $('#login-form').validate({
      submitHandler: function (form) {
        var admin = {};
        admin.username = $("[name='username']").val();
        admin.password = $("[name='password']").val();
        AdminService.login(admin);
      }
    });
  },

  login: function (admin) {
    $.ajax({
        type: "POST",
        url: ' rest/login',
        data: JSON.stringify(admin),
        contentType: "application/json",
        dataType: "json",

        success: function (data) {
            localStorage.setItem("token", data.token);
            alert("You are now logged in as the admin!");
            window.location.replace("index.html");
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
          alert("Given credidentials do NOT match the credidentials of our admin!");
        }
    });
  },

  logout: function () {
    localStorage.clear();
    window.location.replace("index.html");
  }

}