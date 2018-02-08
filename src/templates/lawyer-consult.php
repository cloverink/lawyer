<?php
$user = S('user');
?>


<div class="container">

  <br><br>

  <div class="videoContainer">
    <video id="localVideo" oncontextmenu="return false;"></video>
    <meter id="localVolume" class="volume" min="-45" max="-20" high="-25" low="-40"></meter>
  </div>
  <div id="localScreenContainer" class="videoContainer"></div>
  <div id="remotes"></div>

  <br><br>


<hr>

<form id="frmComment">
  <input type="hidden" id="lawyer" value="<?=G('consult')?>">
  <div class="form-group">
    <label for="">คำแนะนำ</label>
    <textarea id="txtCommentText" class="form-control" rows="3"></textarea>
  </div>
   <div class="rating">
      <input id="star5" name="star" type="radio" value="5" class="radio-btn hide" checked />
      <label for="star5" >☆</label>
      <input id="star4" name="star" type="radio" value="4" class="radio-btn hide" />
      <label for="star4" >☆</label>
      <input id="star3" name="star" type="radio" value="3" class="radio-btn hide" />
      <label for="star3" >☆</label>
      <input id="star2" name="star" type="radio" value="2" class="radio-btn hide" />
      <label for="star2" >☆</label>
      <input id="star1" name="star" type="radio" value="1" class="radio-btn hide" />
      <label for="star1" >☆</label>
      <div class="clear"></div>
  </div>
  <br>
  <button id="btnSendComment" type="button" class="btn btn-success">ส่ง</button>
  <a id="btnEndChat" href="/lawyer" class="btn btn-danger">จบการสนทนา</a>
</form>

<hr>

<div id="comment-list"></div>



</div>







<script src="https://webrtc.github.io/adapter/adapter-4.2.2.js"></script>
<script src="https://simplewebrtc.com/latest-v3.js"></script>
