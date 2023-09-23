<?php
session_start();
if (!isset($_SESSION['username'])) { // ถ้าไม่ได้เข้าระบบอยู่
    header("location: ./login.php"); // redirect ไปยังหน้า login.php
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Custom your stlye</title>
    <link rel="stylesheet" href="../css/styleCustom.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/Custom.js" defer></script>

  </head>
  <body>
    <div class="container">
      <section class="tools-board">
        <div class="row">
          <label class="title">Shapes</label>
          <ul class="options">
            <li class="option tool" id="rectangle">
              <img src="../img/icons/rectangle.svg" alt="">
              <span>Rectangle</span>
            </li>
            <li class="option tool" id="circle">
              <img src="../img/icons/circle.svg" alt="">
              <span>Circle</span>
            </li>
            <li class="option tool" id="triangle">
              <img src="../img/icons/triangle.svg" alt="">
              <span>Triangle</span>
            </li>
            <li class="option">
              <input type="checkbox" id="fill-color">
              <label for="fill-color">Fill color</label>
            </li>
          </ul>
        </div>
        <div class="row">
          <label class="title">Options</label>
          <ul class="options">
            <li class="option active tool" id="brush">
              <img src="../img/icons/brush.svg" alt="">
              <span>Brush</span>
            </li>
            <li class="option tool" id="eraser">
              <img src="../img/icons//eraser.svg" alt="">
              <span>Eraser</span>
            </li>
            <li class="option">
              <input type="range" id="size-slider" min="1" max="30" value="5">
            </li>
          </ul>
        </div>
        <div class="row colors">
          <label class="title">Colors</label>
          <ul class="options">
            <li class="option"></li>
            <li class="option selected"></li>
            <li class="option"></li>
            <li class="option"></li>
            <li class="option">
              <input type="color" id="color-picker" value="#4A98F7">
            </li>
          </ul>
        </div>
        <div class="row buttons">
          <button class="clear-canvas">Clear Canvas</button>
          <button class="save-img">Save As Image</button>
          <!-- <button class="backhome">Back to home</button> -->
        </div>
      </section>
      <section class="drawing-board" >
        <canvas>
          <div style="display: none;">
            <img id="imgsource" src="../img/t-shirt-template-white.png">
          </div>
        </canvas>
      </section>
    </div>
    
  </body>
</html>