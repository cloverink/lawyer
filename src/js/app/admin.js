var Admin = (function (self) {
  var my = self, fn = {};

  fn.init = function () {

    $(".btnDel").on("click", function(){
      if(confirm("ต้องการลบ ?"))
        return true;
      return false;
    });

    $(".chkToActived").on("click", function(){
      $this = $(this);
      id = $this.val();
      actived = $this.prop('checked');
      window.location.href = "/admin?check=" + id + "&actived=" + actived;

      return false;
    })

  };


  my.init = function () {
    $(function () {
      if ($('body.template-admin').length) fn.init();
    })
  };

  return my;

})(Admin || {}).init();


