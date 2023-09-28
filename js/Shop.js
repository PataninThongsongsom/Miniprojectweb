window.onload = function(){
    let side_filter = document.getElementById("filterBT");
    let close_side_filter = document.getElementById("closeFilter");
    side_filter.onclick = openFilter;
    close_side_filter.onclick = closeFilter;
}
function openFilter() {
    sideID = document.getElementById("side")
    sideID.style.display = "block";
}
function closeFilter() {
    sideID = document.getElementById("side")
    sideID.style.display = "none";
}