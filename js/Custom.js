        var canvas = document.getElementById("myCanvas");
        var ctx = canvas.getContext("2d");
        var currentTool = "none"; // Default: no drawing
        var currentColor = "#000000"; // Default color: black
        var isDrawing = false;

        // Event listener for the color picker input
        document.getElementById("colorPicker").addEventListener("input", function (e) {
            currentColor = e.target.value;
        });

        document.getElementById("drawRect").addEventListener("click", function () {
            currentTool = "rect";
        });

        document.getElementById("drawCircle").addEventListener("click", function () {
            currentTool = "circle";
        });

        document.getElementById("drawLine").addEventListener("click", function () {
            currentTool = "line";
        });

        document.getElementById("drawFreehandLine").addEventListener("click", function () {
            currentTool = "freehandLine";
        });

        

        canvas.addEventListener("mousedown", function (e) {
            // Implement logic to draw based on the selected tool and color
            ctx.fillStyle = currentColor;

            if (currentTool === "rect") {
                ctx.fillRect(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top, 50, 50);
            } else if (currentTool === "circle") {
                ctx.beginPath();
                ctx.arc(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top, 25, 0, 2 * Math.PI);
                ctx.fill();
            } else if (currentTool === "line") {
                // Implement line drawing logic here
            } else if (currentTool === "freehandLine") {
                ctx.beginPath();
                ctx.moveTo(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top);
            }
        });
        canvas.addEventListener("mousemove", function (e) {
            if (isDrawing) {
                // logic to draw based on the selected tool and color
                ctx.strokeStyle = currentColor;
                ctx.lineWidth = 2;

                if (currentTool === "freehandLine") {
                    ctx.lineTo(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top);
                    ctx.stroke();
                }
            }
        });
        canvas.addEventListener("mouseup", function () {
            isDrawing = false;

            // Close the path for freehand lines
            if (currentTool === "freehandLine") {
                ctx.closePath();
            }
        });