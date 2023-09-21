window.onload = function(){
    var side_filter = document.getElementById("filterBT")
    var close_side_filter = document.getElementById("closeFilter")
    side_filter.onclick = openFilter
    close_side_filter.onclick = closeFilter

    let currentImageIndex = 1;
    const imageContainer = document.getElementById("image-container");
    const prevButton = document.getElementById("prev-button");
    const nextButton = document.getElementById("next-button");
    const imagesPerPage = 8; // Number of images to display per page

    function displayImages(startIndex) {
        imageContainer.innerHTML = ''; // Clear previous images
        for (let i = startIndex; i < startIndex + imagesPerPage; i++) {
            if (i <= 100) {
                const img = document.createElement("img");
                img.src = `../img/Product_cloth_dataset/tshirt/${i}.jpg`;
                img.alt = `Image ${i}`;
                imageContainer.appendChild(img);
            }
        }
    }

    prevButton.addEventListener("click", () => {
        if (currentImageIndex > 1) {
            currentImageIndex -= imagesPerPage;
            if (currentImageIndex < 1) {
                currentImageIndex = 1;
            }
            displayImages(currentImageIndex);
        }
    });

    nextButton.addEventListener("click", () => {
        if (currentImageIndex + imagesPerPage <= 100) {
            currentImageIndex += imagesPerPage;
            displayImages(currentImageIndex);
        }
    });

    // Initial image display
    displayImages(currentImageIndex);
    
}

function openFilter() {
    sideID = document.getElementById("side")
    sideID.style.display = "block";
}
function closeFilter() {
    sideID = document.getElementById("side")
    sideID.style.display = "none";
}

