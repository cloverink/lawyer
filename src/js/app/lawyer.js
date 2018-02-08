var Lawyer = (function (self) {
  var my = self, fn = {};

  fn.init = function () {

    $("#btnEndChat").on("click", function(){
      return confirm('จบการสนทนา?')
    });

    $("#btnSendComment").on("click", function(){
      var that = this;
      $(that).prop('disabled', true);
      $rate = $("input[name='star']:checked").val() || 5;
      $text = $("#txtCommentText").val() || "";
      $lawyer = $("#lawyer").val();

      
      if ($.trim($text).length == 0) {
        alert("กรุณากรอกข้อความ")
        $(that).prop('disabled', false);
        return false; 
      }

      $.post('/api/save-lawyer-comment.php', {
        rate: $rate,
        text: $text,
        lawyer: $lawyer
      }, function(o) {

        fn.pullLawyerComment();

        $("#frmComment")[0].reset();
        $(that).prop('disabled', false);
      })
    });

    fn.pullLawyerComment()
  };

  fn.pullLawyerComment = function(id) {

    lawyerid = $("#lawyer").val()

    $.get('/api/get-lawyer-comment.php?lawyer=' + lawyerid, function(o) {


      console.log(o)

      $commentList = $("#comment-list");
      $commentList.empty();

      for (i in o) {
        var str = "";
        $r = o[i];

        str += '<div>';
          str += '<p>'+ $r.detail +'</p>';
          str += '<div class="bot">';
            str += '<div class="by">';
              str += '<span>'+ $r.name +'</span>';
              str += '<span>' + $r.dtcreate +'</span>';
            str += '</div>';
            str += '<div class="rate">';
            for(i=0;i<5;i++) {
              if(i<$r.rate)
                str += '<i class="fa fa-star" aria-hidden="true"></i>';
              else
                str += '<i class="fa fa-star-o" aria-hidden="true"></i>';
            }
            str += '</div>';
          str += '</div>';
        str += '</div>';

        
        $commentList.append(str);
      }

    });
  }

  my.init = function () {
    $(function () {
      if ($("body.template-lawyer").length) fn.init();
    })
  };

  return my;

})(Lawyer || {}).init();