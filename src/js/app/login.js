var Login = (function (self) {
  var my = self, fn = {};

  fn.init = function () {

    $frmLogin = $("#frmLogin");
    $alert = $frmLogin.find(".alert")
    $email = $("#email");
    $pwd = $("#pwd");

    $frmLogin.on("submit", function() {
      $alert.addClass("hide");
      if($.trim($email.val()) === "" 
      || $.trim($pwd.val()) === "") {
        $alert.text("กรุณากรอกข้อมูลให้ครบ");
        $alert.removeClass("hide");
        return false;
      }

      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (!re.test($email.val().toLowerCase())) {
        $alert.text("email ไม่ถูกต้อง");
        $alert.removeClass("hide");
        return false;
      }
    });
  };

  my.init = function () {
    $(function () {
      if($("#frmLogin").length) fn.init();
    })
  };

  return my;

})(Login || {}).init();