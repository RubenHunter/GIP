var times = 0;
function loguit() {
    times += 1;
    var x = document.getElementById("logout");
    if (times %2 !==0){
        x.style.display = "block";
    } else{
        x.style.display = "none";
    }
}