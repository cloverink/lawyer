var Admin = (function (self) {
  var my = self, fn = {};

  fn.init = function () {

    $(".btnDel").on("click", function(){
      if(confirm("ต้องการลบ ?"))
        return true;
      return false;
    });

  };


  my.init = function () {
    $(function () {
      if ($('body.template-admin').length) fn.init();
    })
  };

  return my;

})(Admin || {}).init();


