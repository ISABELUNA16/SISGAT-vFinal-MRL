
var mySidebar = document.getElementById("mySidebar");
var overlayBg = document.getElementById("myOverlay");

function sisgat_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}
function sisgat_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}