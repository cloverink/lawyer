var Book = (function (self) {
  var my = self;
  var fn = {};


  fn.init = function () {
    $('#datetimepicker1').datetimepicker({
      inline: false,
      sideBySide: true,
      format: 'DD/MM/YYYY HH:mm:ss'
    });

    $bookAlert = $("#bookAlert");
    $frmBook = $("#frmBook");
    $bookdt = $frmBook.find("[name='bookdt']");
    $detail = $frmBook.find("[name='detail']");
    $frmBook.find("[type='submit']").on('click', function(){
      $bookAlert.addClass("hide");
      if($.trim($bookdt.val()).length == 0 || $.trim($detail.val()).length == 0) {
        $bookAlert.text("กรุณากรอกข้อมูลให้ครบ").removeClass("hide");
        return false;
      }
      return true;
    })
    


  }

  my.init = function () {
    $(function () {
      if ($("body.template-book").length) fn.init();
    })
  };

  return my;

})(Book || {}).init();


