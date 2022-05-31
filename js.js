//Create imgS
var ark = document.getElementById("ark");
var arkdiv;
for (var i = 1; i < 31; i++) {
    arkdiv = document.createElement("div");
    arkdiv.id = "arkdiv" + i;
    arkdivimg = document.createElement("img");
    arkdivimg.id = "arkdivimg" + i;
    arkdivimg.onclick = imgclick;
    arkdivimg.onmouseover = animations;
    // arkdivimg.onmouseleave = rclass;
    arkdivimg.src = "gifts/gift" + i + ".svg";
    arkdiv.appendChild(arkdivimg);
    ark.appendChild(arkdiv);
}
//Create imgS

//using to prevent many cliks
function no() {}

//imgclick
var thimgclick;
function imgclick() {
    thimgclick = this;
    for (var i = 1; i < 31; i++) {
        document.getElementById("arkdivimg" + i).onclick = no;
    }
    // thimgclick.style.animation = "click 1s";
    // thimgclick.style.zIndex = 6;
    thimgclick.style.transition = "all .5s";
    setTimeout(function () {
        thimgclick.style.width = "70%";
    }, 1000);
    setTimeout(function () {
        thimgclick.style.margin = "10%";
    }, 1000);
    // setTimeout(function(){thimgclick.style.transform = "scale(1.9)";},1000);
    // setTimeout(function(){thimgclick.style.position = "fixed";},1000);
    // setTimeout(function(){thimgclick.style = "";},1100)
    // setTimeout(function(){thimgclick.style.animation = "vib 1s";},1100)
    setTimeout(function () {
        document.getElementById("popupactive").click();
    }, 2100);
    setTimeout(function () {
        document.getElementById("popupsideimg").appendChild(thimgclick);
    }, 2100);
}
//imgclick
//Ajax request

//Ajax request
var xmlhttp;
if (window.XMLHttpRequest) {
    xmlhttp = new XMLHttpRequest();
} else {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
function getgift(getgiftemail) {
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var para = document.getElementById("popupsidecontent");
            para.innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "conf.php?email=" + getgiftemail, true);
    xmlhttp.send();
}
//Ajax request
function rgetgift(getgiftemail) {
    var para = document.getElementById("popupsidecontent");
    if (document.getElementById("popupemail") == null) {
        //console.log(document.getElementById('popupemail').value);}
        para.innerHTML +=
            '<input required id="popupemail" type="email" placeholder="Put Your Email to claim your Gift">';
    } else {
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                para.innerHTML = xmlhttp.responseText;
            }
        };
        var rgetgiftemail =
            document.getElementById("popupemail") != null
                ? document.getElementById("popupemail").value
                : "";
        xmlhttp.open("GET", "conf.php?remail=" + rgetgiftemail, true);
        xmlhttp.send();
    }
}
//Ajax request

function reload() {
    thimgclick.style.opacity = 0;
    window.location.href = "";
}

//Animations
var rand;
function animations() {
    // console.log(this.id.substr(-1,1));
    var thanimations = this;
    var arr2 = [
        "pulse",
        "shake",
        "wobble",
        "jello",
        "flip",
        "rubberBand",
        "swing",
        "hinge",
    ];
    rand = Math.floor(Math.random() * arr2.length);
    thanimations.className = "animated " + arr2[rand];
    setTimeout(function () {
        thanimations.className = "";
    }, 1000);
}

window.onload = function () {
    var nicepopup = document.getElementById("nicepopup");
    nicepopup.style.left =
        "calc((100vw - " + nicepopup.offsetWidth + "px) / 2)";
    // setTimeout(function(){
    // 	nicepopup.style.top = "1000px";
    // 	setInterval(function(){nicepopup.style.transform = "skewY(155deg)";}, 1500);
    // 	setTimeout(function(){setInterval(function(){nicepopup.style.transform = "skewY(195deg)";}, 1500);}, 750);
    // }, 1000);
};

function stopainm(poopup) {
    console.log("hi");
    if (poopup.style.webkitAnimationPlayState != "paused") {
        poopup.style.webkitAnimationPlayState = "paused";
    } else {
        poopup.style.webkitAnimationPlayState = "running";
    }
}
