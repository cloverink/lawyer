var Main = (function (self) {
  var my = self;
  var fn = {};

  fn.initMenu = function () {
  
  };

  my.init = function () {
    $(function () {
      fn.initMenu();
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