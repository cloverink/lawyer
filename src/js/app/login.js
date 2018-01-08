var Login = (function (self) {
  var my = self, fn = {};

  fn.init = function () {

    $frmLogin = $("#frmLogin");
    $alert = $frmLogin.find(".alert")
    $username = $("#username");
    $password = $("#password");

    $frmLogin.on("submit", function() {
      $alert.addClass("hide");
      if($.trim($username.val()) === "" 
      || $.trim($password.val()) === "") {
        $alert.text("กรุณากรอกข้อมูลให้ครบ");
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