var Main = (function (self) {
  var my = self;
  var fn = {};


  fn.init = function() {
    $('#datetimepicker12').datetimepicker({
      inline: false,
      sideBySide: true
    });
  }

  my.init = function () {
    $(function () {
      fn.init();
    })
  };

  return my;

})(Main || {}).init();



function __(o, p) {
  if (typeof o === "undefined" || typeof o !== "function") {
    console.warn("" + o + " is not a function");
    return false;
  }
  (p) ? o(p): o();
}