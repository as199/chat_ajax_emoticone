$(document).ready(function () {
    $("#register-link").click(function () {
      $("#login-box").hide();
      $("#register-box").show();
    });
  
    $("#login-link").click(function () {
      $("#login-box").show();
      $("#register-box").hide();
    });
  
    $("#forgot-link").click(function () {
      $("#login-box").hide();
      $("#forgot-box").show();
    });
  
    $("#back-link").click(function () {
      $("#login-box").show();
      $("#forgot-box").hide();
    });
  
    // Register Ajax Request
    $("#register-btn").click(function (e) {
      if ($("#register-form")[0].checkValidity()) {
        e.preventDefault();
        $("#register-btn").val("Please Wait...");
        if ($("#rpassword").val() !== $("#cpassword").val()) {
          $("#passError").text("* Password did not matched !");
          $("#register-btn").val("Sign Up");
        } else {
          $("#passError").text("");
          $.ajax({
            url: "action/valideRgister.php",
            method: "POST",
            data: $("#register-form").serialize() + "&action=register",
            success: function (response) {
              $("#register-btn").val("Sign Up");


                $("#regAlert").html(response);

            },
          });
        }
      }
    });
  
    // Login ajax Request
    $("#login-btn").click(function (e) {
      if ($("#login-form")[0].checkValidity()) {
        e.preventDefault();
        $("#login-btn").val("Please Wait...");
        $.ajax({
          url: "action/valideLogin.php",
          method: "POST",
          data: $("#login-form").serialize() + "&action=login",
          success: function (response) {
            $("#login-btn").val("Sign In");
            if (response === "login") {
               window.location ="index.php";
            } else {
              $("#loginAlert").html(response);
            }
          },
        });
      }
    });
  
    // Forgot Password Ajax Request
    $("#forgot-btn").click(function (e) {
      if ($("#forgot-form")[0].checkValidity()) {
        e.preventDefault();
  
        $("#forgot-btn").val("Please wait...");
        $.ajax({
          url: "assets/php/action.php",
          method: "POST",
          data: $("#forgot-form").serialize() + "&action=forgot",
          success: function (response) {
            $("#forgot-btn").val("Reset Password");
            $("#forgot-form")[0].reset();
            $("#forgotAlert").html(response);
          },
        });
      }
    });
  }); // end ready function