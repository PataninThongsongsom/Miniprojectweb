<?php
session_start();
if (!isset($_SESSION['username'])) { // ถ้าไม่ได้เข้าระบบอยู่
    header("location: ./login.php"); // redirect ไปยังหน้า login.php
    exit;
}
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Custom your stlye</title>
    <link rel="stylesheet" href="../css/styleCustom.css">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <script src="../js/Custom.js" defer></script> -->
    <!-- Add these script tags to your HTML -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    

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
            <div class="row">
                <label class="title">Import Image</label>
                <ul class="options">
                  <li class="option">
                    <input type="file" id="file-input" accept="image/*" style="display: none">
                    <label for="file-input" id="import-image-button">Import Image</label>
                  </li>
                </ul>
              </div>
            <div class="row">
                <label class="title">Image Options</label>
                <ul class="options">
                    <li class="option tool" id="pointer-tool">
                        <img src="../img/icons//eraser.svg" alt="">
                        <span>pointer-move</span>
                      </li>
                      <li class="option tool" id="pointer-tool2">
                        <img src="../img/icons//eraser.svg" alt="">
                        <span>pointer-resize</span>
                      </li>
                    <!-- <label for="resize-width">Width:</label>
                    <input type="range" id="resize-width" min="10" max="500">
                    <label for="resize-height">Height:</label>
                    <input type="range" id="resize-height" min="10" max="500"> -->
                    
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
          <a href="./afterlogin.php" class="backhome" id="bkh">Back to home</a>
        </div>
      </section>
      <section class="drawing-board" >
        <canvas id="canvas" width="1920" height="969">
        </canvas>
      </section>
      
    </div>
    
    <script src="../js/Custom.js"></script>
    
  </body>
</html>