const canvas = document.querySelector("canvas"),
  toolBtns = document.querySelectorAll(".tool"),
  fillColor = document.querySelector("#fill-color"),
  sizeSlider = document.querySelector("#size-slider"),
  colorBtns = document.querySelectorAll(".colors .option"),
  colorPicker = document.querySelector("#color-picker"),
  clearCanvas = document.querySelector(".clear-canvas"),
  pointerTool = document.querySelector("#pointer-tool"),
  saveImg = document.querySelector(".save-img"),
  ctx = canvas.getContext("2d"),
  
  images = [];

const fileInput = document.getElementById("file-input");
const bgImage = new Image();
let isPointerToolActive = false;
let isDragging = false,
  offsetX = 0,
  draggingImage = null,
  offsetY = 0;

bgImage.src = './img/t-shirt-template-white.png';
bgImage.onload = () => {
  setCanvasBackground();
};

let prevMouseX, prevMouseY, snapshot,
  isDrawing = false,
  selectedTool = "brush",
  brushWidth = 5,
  selectedColor = "#000";

  const setCanvasBackground = () => {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.drawImage(bgImage, 0, 0, canvas.width, canvas.height);
  
    for (const image of images) {
      ctx.drawImage(image.img, image.x, image.y, image.width, image.height);
    }
  };

window.addEventListener("load", () => {
  canvas.width = canvas.offsetWidth;
  canvas.height = canvas.offsetHeight;
  setCanvasBackground();
});

const importImage = function(event) {
  const file = event.target.files[0];
  const reader = new FileReader();

  reader.onload = function(event) {
    const newImage = {
      img: new Image(),
      x: 0,
      y: 0,
      width: 100,
      height: 100
    };

    newImage.img.src = event.target.result;
    newImage.img.onload = () => {
      images.push(newImage);
      setCanvasBackground();
    };
  };

  reader.readAsDataURL(file);
};

const drawRect = (e) => {
  if (!fillColor.checked) {
    return ctx.strokeRect(e.offsetX, e.offsetY, prevMouseX - e.offsetX, prevMouseY - e.offsetY);
  }
  ctx.fillRect(e.offsetX, e.offsetY, prevMouseX - e.offsetX, prevMouseY - e.offsetY);
}

const drawCircle = (e) => {
  ctx.beginPath();
  let radius = Math.sqrt(Math.pow((prevMouseX - e.offsetX), 2) + Math.pow((prevMouseY - e.offsetY), 2));
  ctx.arc(prevMouseX, prevMouseY, radius, 0, 2 * Math.PI);
  fillColor.checked ? ctx.fill() : ctx.stroke();
}

const drawTriangle = (e) => {
  ctx.beginPath();
  ctx.moveTo(prevMouseX, prevMouseY);
  ctx.lineTo(e.offsetX, e.offsetY);
  ctx.lineTo(prevMouseX * 2 - e.offsetX, e.offsetY);
  ctx.closePath();
  fillColor.checked ? ctx.fill() : ctx.stroke();
}

const startDraw = (e) => {
  isDrawing = true;
  prevMouseX = e.offsetX;
  prevMouseY = e.offsetY;
  ctx.beginPath();
  ctx.lineWidth = brushWidth;
  ctx.strokeStyle = selectedColor;
  ctx.fillStyle = selectedColor;
  snapshot = ctx.getImageData(0, 0, canvas.width, canvas.height);
}

const drawing = (e) => {
  if (!isDrawing) return;
  ctx.putImageData(snapshot, 0, 0);

  if (selectedTool === "brush" || selectedTool === "eraser") {
    ctx.strokeStyle = selectedTool === "eraser" ? "#fff" : selectedColor;
    ctx.lineTo(e.offsetX, e.offsetY);
    ctx.stroke();
  } else if (selectedTool === "rectangle") {
    drawRect(e);
  } else if (selectedTool === "circle") {
    drawCircle(e);
  } else if(selectedTool==="triangle"){
    drawTriangle(e);
  }
}

toolBtns.forEach(btn => {
  btn.addEventListener("click", () => {
    document.querySelector(".options .active").classList.remove("active");
    btn.classList.add("active");
    selectedTool = btn.id;
    if (btn.id === "pointer-tool") {
        isPointerToolActive = true;
        isDrawing = false;
      } else {
        isPointerToolActive = false;
        selectedTool = btn.id;
      }
  });
});

sizeSlider.addEventListener("change", () => brushWidth = sizeSlider.value);

colorBtns.forEach(btn => {
  btn.addEventListener("click", () => {
    document.querySelector(".options .selected").classList.remove("selected");
    btn.classList.add("selected");
    selectedColor = window.getComputedStyle(btn).getPropertyValue("background-color");
  });
});

colorPicker.addEventListener("change", () => {
  colorPicker.parentElement.style.background = colorPicker.value;
  colorPicker.parentElement.click();
});

clearCanvas.addEventListener("click", () => {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  setCanvasBackground();
});

saveImg.addEventListener("click", () => {
  const link = document.createElement("a");
  link.download = `${Date.now()}.jpg`;
  link.href = canvas.toDataURL();
  link.click();
});

const drawImages = () => {
    setCanvasBackground();
    for (const image of images) {
      ctx.drawImage(image.img, image.x, image.y, image.width, image.height);
    }
  };
  fileInput.addEventListener('change', importImage);
canvas.addEventListener("drop", (event) => {
  event.preventDefault();
  const rect = canvas.getBoundingClientRect();
  const x = event.clientX - rect.left;
  const y = event.clientY - rect.top;

  const newImage = {
    img: new Image(),
    x,
    y,
    width: 100,
    height: 100,
  };

  newImage.img.src = event.dataTransfer.getData("text/plain");
  newImage.img.onload = () => {
    images.push(newImage);
    drawImages();
  };
});

canvas.addEventListener("dragover", (event) => {
  event.preventDefault();
});



canvas.addEventListener("mousedown", (e) => {
    if (isPointerToolActive) {
      // Check if the click is on an imported image
      for (const image of images) {
        if (
          e.clientX >= image.x &&
          e.clientX <= image.x + image.width &&
          e.clientY >= image.y &&
          e.clientY <= image.y + image.height
        ) {
          isDragging = true;
          draggingImage = image;
          offsetX = e.clientX - image.x;
          offsetY = e.clientY - image.y;
          break;
        }
      }
    } else if (selectedTool === "brush") {
      isDrawing = true;
      startDraw(e);
    }
  });

  document.addEventListener('mousemove', (e) => {
    if (isDragging && draggingImage) {
      draggingImage.x = e.clientX - offsetX;
      draggingImage.y = e.clientY - offsetY;
      setCanvasBackground();
    } else if (isDrawing) {
      drawing(e);
    }
  });

  document.addEventListener('mouseup', () => {
    isDragging = false;
    draggingImage = null;
    isDrawing = false;
  });

function isCursorOnImage(e) {
  if (images.length > 0) {
    const image = images[0];
    return (
      e.clientX >= image.x &&
      e.clientX <= image.x + image.width &&
      e.clientY >= image.y &&
      e.clientY <= image.y + image.height
    );
  }
  return false;
}

function drawImageOnCanvas() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  images.forEach((image) => {
    ctx.drawImage(image.img, image.x, image.y, image.width, image.height);
  });
}

// fileInput.addEventListener('change', importImage);

canvas.addEventListener("mousedown", startDraw);
canvas.addEventListener("mousemove", drawing);
canvas.addEventListener("mouseup", () => isDrawing = false);
