var Login = (function (self) {
  var my = self, fn = {};

  fn.init = function () {

    $inpAnswer = $("#inpAnswer");
    $inpAnswer.on("keypress", function(e) {
      if (e.keyCode == 13) fn.submit();
    });
    $inpAnswer.focus();
    $("#btnSubmit").on("click", fn.submit);
  };

  fn.submit = function () {
    $frmLogin = $("#frmLogin");
    $frmLogin.find("input[name='pass']").val($("#inpAnswer").val());
    $frmLogin.submit();
  }

  my.init = function () {
    $(function () {
      if($("body#login").length) fn.init();
    })
  };

  return my;

})(Login || {}).init();