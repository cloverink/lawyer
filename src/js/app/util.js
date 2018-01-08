var Util = (function (self) {
  var my = self;
  var fn = {};


  my.pixelToPercen = function (ref, val) {
    return val * 100 / ref;
  };

  my.percenToPixel = function (ref, val) {
    return ref * val / 100;
  };

  my.arraymove = function (arr, fromIndex, toIndex) {
    var element = arr[fromIndex];
    arr.splice(fromIndex, 1);
    arr.splice(toIndex, 0, element);
  };

  return my;

})(Util || {});