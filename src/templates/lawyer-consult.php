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

<form>
  <div class="form-group">
    <label for="">คำแนะนำ</label>
    <textarea class="form-control" rows="3"></textarea>
  </div>
  <div class="rate">
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star-o" aria-hidden="true"></i>
  </div>
  <br>
  <button type="submit" class="btn btn-success">ส่ง</button>
</form>

</div>

<script src="https://webrtc.github.io/adapter/adapter-4.2.2.js"></script>
<script src="https://simplewebrtc.com/latest-v3.js"></script>
