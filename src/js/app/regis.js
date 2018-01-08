var Regis = (function (self) {
  var my = self, fn = {};

  fn.init = function () {

    $frmRegis = $("#frmRegis");
    $alert = $frmRegis.find(".alert")
    $fullname = $("#fullname");
    $username = $("#username");
    $password = $("#password");
    $password2 = $("#password2");
    $email = $("#email");
    $tel = $("#tel");

    $frmRegis.on("submit", function() {
      $alert.addClass("hide");

      if($.trim($fullname.val()) === ""
      || $.trim($username.val()) === ""
      || $.trim($password.val()) === ""
      || $.trim($password2.val()) === ""
      || $.trim($email.val()) === ""
      || $.trim($tel.val()) === ""
      ){
        $alert.text("กรุณากรอกข้อมูลให้ครบ");
        $alert.removeClass("hide");
        return false;
      };

      if($password.val() !== $password2.val()) {
        $alert.text("รหัสผ่านไม่ตรงกัน");
        $alert.removeClass("hide");
        return false;
      }

      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if(!re.test($email.val().toLowerCase())) {
        $alert.text("email ไม่ถูกต้อง");
        $alert.removeClass("hide");
        return false;
      }

    });


  };

  my.init = function () {
    $(function () {
      if ($("#frmRegis").length) fn.init();
    })
  };

  return my;

})(Regis || {}).init();