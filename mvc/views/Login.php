<?php
session_start();
session_unset();
session_destroy();
?>
<html lang="en"><head>

<meta charset="UTF-8">

<link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png">
<meta name="apple-mobile-web-app-title" content="CodePen">

<link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">

<link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111">


<title>Đăng nhập</title>
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

<style>
/* CSS Libraries Used 

*Animate.css by Daniel Eden.
*FontAwesome 4.7.0
*Typicons

*/

@import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400');

body, html {
font-family: 'Source Sans Pro', sans-serif;
background-color: #1d243d;
padding: 0;
margin: 0;
}

#particles-js {
position: absolute;
width: 100%;
height: auto;
}

.container{
margin: 0;
top: 50px;
left: 50%;
position: absolute;
text-align: center;
transform: translateX(-50%);
background-color: rgb( 33, 41, 66 );
border-radius: 9px;
border-top: 10px solid #79a6fe;
border-bottom: 10px solid #8BD17C;
width: 400px;
height: 500px;
box-shadow: 1px 1px 108.8px 19.2px rgb(25,31,53);
}

.box h4 {
font-family: 'Source Sans Pro', sans-serif;
color: #5c6bc0; 
font-size: 18px;
margin-top:94px;;
}

.box h4 span {
color: #dfdeee;
font-weight: lighter;
}

.box h5 {
font-family: 'Source Sans Pro', sans-serif;
font-size: 13px;
color: #a1a4ad;
letter-spacing: 1.5px;
margin-top: -15px;
margin-bottom: 70px;
}

.box input[type = "text"],.box input[type = "password"] {
display: block;
margin: 20px auto;
background: #262e49;
border: 0;
border-radius: 5px;
padding: 14px 10px;
width: 320px;
outline: none;
color: #d6d6d6;
    -webkit-transition: all .2s ease-out;
  -moz-transition: all .2s ease-out;
  -ms-transition: all .2s ease-out;
  -o-transition: all .2s ease-out;
  transition: all .2s ease-out;

}
::-webkit-input-placeholder {
color: #565f79;
}

.box input[type = "text"]:focus,.box input[type = "password"]:focus {
border: 1px solid #79A6FE;

}

a{
color: #5c7fda;
text-decoration: none;
}

a:hover {
text-decoration: underline;
}

label input[type = "checkbox"] {
display: none; /* hide the default checkbox */
}

/* style the artificial checkbox */
label span {
height: 13px;
width: 13px;
border: 2px solid #464d64;
border-radius: 2px;
display: inline-block;
position: relative;
cursor: pointer;
float: left;
left: 7.5%;
}

.btn1 {
border:0;
background: #7f5feb;
color: #dfdeee;
border-radius: 100px;
width: 340px;
height: 49px;
font-size: 16px;
position: absolute;
top: 79%;
left: 8%;
transition: 0.3s;
cursor: pointer;
}

.btn1:hover {
background: #5d33e6;
}

.rmb {
position: absolute;
margin-left: -24%;
margin-top: 0px;
color: #dfdeee;
font-size: 13px;
}

.forgetpass {
position: relative;
float: right;
right: 28px;
}

.dnthave{
  position: absolute;
  top: 92%;
  left: 24%;
}

[type=checkbox]:checked + span:before {/* <-- style its checked state */
  font-family: FontAwesome;
  font-size: 16px;
  content: "\f00c";
  position: absolute;
  top: -4px;
  color: #896cec;
  left: -1px;
  width: 13px;
}

.typcn {
position: absolute;
left: 339px;
top: 282px;
color: #3b476b;
font-size: 22px;
cursor: pointer;
}      

.typcn.active {
color: #7f60eb;
}

.error {
background: #ff3333;
text-align: center;
width: 337px;
height: 20px;
padding: 2px;
border: 0;
border-radius: 5px;
margin: 10px auto 10px;
position: absolute;
top: 31%;
left: 7.2%;
color: white;
display: none;
}

.footer {
  position: relative;
  left: 0;
  bottom: 0;
  top: 605px;
  width: 100%;
  color: #78797d;
  font-size: 14px;
  text-align: center;
}

.footer .fa {
color: #7f5feb;;
}
</style>

<script>
window.console = window.console || function(t) {};
</script>



<script>
if (document.location.search.match(/type=embed/gi)) {
  window.parent.postMessage("resize", "*");
}
</script>


</head>

<body translate="no" id="particles-js">

<div class="animated bounceInDown">
<div class="container">
  <span class="error animated tada" id="msg"></span>
  <form action="http://localhost/quanly/LOGIN/TK" method="post" name="form1" class="box" onsubmit="return checkStuff()">
    <h4>Đăng nhập</span></h4>
    <h5>Sign in to your account</h5>
      <input type="text" name="username" placeholder="Username" autocomplete="off">
      <i class="typcn typcn-eye" id="eye"></i>
      <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off">
      <input type="submit" value="Sign in" class="btn1" name="save">
    </form>
</div> 
     <div class="footer">
    <span>Made with <i class="fa fa-heart pulse"></i> <a href="https://www.google.de/maps/place/Augsburger+Puppenkiste/@48.360357,10.903245,17z/data=!3m1!4b1!4m2!3m1!1s0x479e98006610a511:0x73ac6b9f80c4048f"></a><a href="https://codepen.io/lordgamer2354">By Anees Khan</a></span>
  </div>
</div>
  <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>

<script src="https://cldup.com/S6Ptkwu_qA.js"></script>
    <script id="rendered-js">
var pwd = document.getElementById('pwd');
var eye = document.getElementById('eye');

eye.addEventListener('click', togglePass);

function togglePass() {

eye.classList.toggle('active');

pwd.type == 'password' ? pwd.type = 'text' : pwd.type = 'password';
}

// Form Validation

function checkStuff() {
var username = document.form1.username;
var password = document.form1.password;
var msg = document.getElementById('msg');

if (username.value == "") {
  msg.style.display = 'block';
  msg.innerHTML = "Vui lòng nhập username";
  username.focus();
  return false;
} else {
  msg.innerHTML = "";
}

if (password.value == "") {
  msg.innerHTML = "Vui lòng nhập your password";
  password.focus();
  return false;
} else {
  msg.innerHTML = "";
}

}

// ParticlesJS

// ParticlesJS Config.
particlesJS("particles-js", {
"particles": {
  "number": {
    "value": 60,
    "density": {
      "enable": true,
      "value_area": 800 } },


  "color": {
    "value": "#ffffff" },

  "shape": {
    "type": "circle",
    "stroke": {
      "width": 0,
      "color": "#000000" },

    "polygon": {
      "nb_sides": 5 },

    "image": {
      "src": "img/github.svg",
      "width": 100,
      "height": 100 } },


  "opacity": {
    "value": 0.1,
    "random": false,
    "anim": {
      "enable": false,
      "speed": 1,
      "opacity_min": 0.1,
      "sync": false } },


  "size": {
    "value": 6,
    "random": false,
    "anim": {
      "enable": false,
      "speed": 40,
      "size_min": 0.1,
      "sync": false } },


  "line_linked": {
    "enable": true,
    "distance": 150,
    "color": "#ffffff",
    "opacity": 0.1,
    "width": 2 },

  "move": {
    "enable": true,
    "speed": 1.5,
    "direction": "top",
    "random": false,
    "straight": false,
    "out_mode": "out",
    "bounce": false,
    "attract": {
      "enable": false,
      "rotateX": 600,
      "rotateY": 1200 } } },



"interactivity": {
  "detect_on": "canvas",
  "events": {
    "onhover": {
      "enable": false,
      "mode": "repulse" },

    "onclick": {
      "enable": false,
      "mode": "push" },

    "resize": true },

  "modes": {
    "grab": {
      "distance": 400,
      "line_linked": {
        "opacity": 1 } },


    "bubble": {
      "distance": 400,
      "size": 40,
      "duration": 2,
      "opacity": 8,
      "speed": 3 },

    "repulse": {
      "distance": 200,
      "duration": 0.4 },

    "push": {
      "particles_nb": 4 },

    "remove": {
      "particles_nb": 2 } } },



"retina_detect": true });
//# sourceURL=pen.js
  </script><canvas class="particles-js-canvas-el" width="937" height="217" style="width: 100%; height: 100%;"></canvas>

</body></html>