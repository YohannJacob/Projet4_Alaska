<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>


*, *:before, *:after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  width: 100%;
  height: 100%;
}

body.overflow { overflow: hidden; }

/*  BURGER
========================================== */

.burger {
  width: 50px;
  height: 50px;
  position: fixed;
  top: 20px;
  right: 20px;
  border-radius: 4px;
  z-index: 10;
}

.burger span {
  position: relative;
  margin-top: 9px;
  margin-bottom: 9px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  position: absolute;
  top: 50%;
  left: 50%;
  margin-left: -15px;
  margin-top: -1.5px;
}

.burger span, .burger span::before, .burger span::after {
  display: block;
  width: 30px;
  height: 3px;
  background-color: #2a2a2a;
  outline: 1px solid transparent;
  -webkit-transition-property: background-color, -webkit-transform;
  -moz-transition-property: background-color, -moz-transform;
  -o-transition-property: background-color, -o-transform;
  transition-property: background-color, transform;
  -webkit-transition-duration: 0.3s;
  -moz-transition-duration: 0.3s;
  -o-transition-duration: 0.3s;
  transition-duration: 0.3s;
}

.burger span::before, .burger span::after {
  position: absolute;
  content: "";
}

.burger span::before { top: -9px; }

.burger span::after { top: 9px; }

.burger.clicked span { background-color: transparent; }

.burger.clicked span::before {
  -webkit-transform: translateY(9px) rotate(45deg);
  -moz-transform: translateY(9px) rotate(45deg);
  -ms-transform: translateY(9px) rotate(45deg);
  -o-transform: translateY(9px) rotate(45deg);
  transform: translateY(9px) rotate(45deg);
}

.burger.clicked span::after {
  -webkit-transform: translateY(-9px) rotate(-45deg);
  -moz-transform: translateY(-9px) rotate(-45deg);
  -ms-transform: translateY(-9px) rotate(-45deg);
  -o-transform: translateY(-9px) rotate(-45deg);
  transform: translateY(-9px) rotate(-45deg);
}

.burger.clicked span:before, .burger.clicked span:after { background-color: #ffffff; }

.burger:hover { cursor: pointer; }

/*  NAV
========================================== */

nav {
  background-color: #2a2a2a;
  position: fixed;
  z-index: 9;
  top: 0;
  right: 0;
  height: 100%;
  max-width: 515px;
  width: 100%;
  padding: 100px 40px 60px 40px;
  overflow-y: auto;
  -webkit-transform: translateX(100%);
  -moz-transform: translateX(100%);
  -ms-transform: translateX(100%);
  -o-transform: translateX(100%);
  transform: translateX(100%);
  -webkit-transition: transform 0.55s cubic-bezier(0.785, 0.135, 0.15, 0.86);
  -moz-transition: transform 0.55s cubic-bezier(0.785, 0.135, 0.15, 0.86);
  -o-transition: transform 0.55s cubic-bezier(0.785, 0.135, 0.15, 0.86);
  transition: transform 0.55s cubic-bezier(0.785, 0.135, 0.15, 0.86);
}

nav.show {
  -webkit-transform: translateX(0px);
  -moz-transform: translateX(0px);
  -ms-transform: translateX(0px);
  -o-transform: translateX(0px);
  transform: translateX(0px);
}

nav.show ul.main li {
  -webkit-transform: translateX(0px);
  -moz-transform: translateX(0px);
  -ms-transform: translateX(0px);
  -o-transform: translateX(0px);
  transform: translateX(0px);
  opacity: 1;
}

nav.show ul.main li:nth-child(1) { transition-delay: 0.15s; }

nav.show ul.main li:nth-child(2) { transition-delay: 0.3s; }

nav.show ul.main li:nth-child(3) { transition-delay: 0.45s; }

nav.show ul.main li:nth-child(4) { transition-delay: 0.6s; }

nav.show ul.main li:nth-child(5) { transition-delay: 0.75s; }

nav.show ul.main li:nth-child(6) { transition-delay: 0.9s; }

nav.show ul.main li:nth-child(7) { transition-delay: 1.05s; }

nav.show ul.main li:nth-child(8) { transition-delay: 1.2s; }

nav.show ul.main li:nth-child(9) { transition-delay: 1.35s; }

nav.show .about, nav.show .social, nav.show ul.sub {
  -webkit-transform: translateY(0px);
  -moz-transform: translateY(0px);
  -ms-transform: translateY(0px);
  -o-transform: translateY(0px);
  transform: translateY(0px);
  opacity: 1;
  transition-delay: .85s;
}
@media (min-width: 667px) {

nav { padding: 120px 90px 70px 90px; }
}

nav ul.main { list-style-type: none; }

nav ul.main li {
  margin-bottom: 20px;
  -webkit-transform: translateX(40px);
  -moz-transform: translateX(40px);
  -ms-transform: translateX(40px);
  -o-transform: translateX(40px);
  transform: translateX(40px);
  opacity: 0;
  -webkit-transition: all 0.3s ease;
  -moz-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}

nav ul.main li:last-of-type { margin-bottom: 0px; }

nav ul.main li a {
  color: #ffffff;
  font-family: "Raleway", sans-serif;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 1.5rem;
  display: block;
  letter-spacing: 5px;
  font-weight: 600;
  padding: 10px 0;
  -webkit-transition: all 0.3s ease;
  -moz-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}

nav ul.main li a span { color: #b7ac7f; }

nav ul.main li a:hover { color: #b7ac7f; }

nav .about {
  margin-top: 40px;
  -webkit-transform: translateY(30px);
  -moz-transform: translateY(30px);
  -ms-transform: translateY(30px);
  -o-transform: translateY(30px);
  transform: translateY(30px);
  opacity: 0;
  -webkit-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

nav .about p {
  color: #ffffff;
  font-family: "Spectral", serif;
  font-size: 1.05rem;
  letter-spacing: 0.5px;
  line-height: 170%;
}

nav .social {
  margin-top: 40px;
  position: relative;
  padding-bottom: 30px;
  -webkit-transform: translateY(30px);
  -moz-transform: translateY(30px);
  -ms-transform: translateY(30px);
  -o-transform: translateY(30px);
  transform: translateY(30px);
  opacity: 0;
  -webkit-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

nav .social:after {
  content: "";
  width: 230px;
  height: 2px;
  background-color: #b7ac7f;
  position: absolute;
  bottom: 0;
  left: 0;
}

nav .social a {
  display: inline-block;
  width: 30px;
  height: 30px;
  margin-right: 25px;
}

nav .social a:last-of-type { margin-right: 0px; }

nav .social a:hover svg path, nav .social a:hover svg circle { fill: #b7ac7f; }

nav .social a svg {
  width: 100%;
  height: 100%;
}

nav .social a svg path, nav .social a svg circle {
  fill: #ffffff;
  -webkit-transition: all 0.3s ease;
  -moz-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}

nav ul.sub {
  list-style-type: none;
  margin-top: 40px;
  -webkit-transform: translateY(30px);
  -moz-transform: translateY(30px);
  -ms-transform: translateY(30px);
  -o-transform: translateY(30px);
  transform: translateY(30px);
  opacity: 0;
  -webkit-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

nav ul.sub li { margin-bottom: 10px; }

nav ul.sub li:last-of-type { margin-bottom: 0px; }

nav ul.sub li a {
  color: #ffffff;
  font-family: "Raleway", sans-serif;
  letter-spacing: 1px;
  font-size: 0.9rem;
  text-decoration: none;
  -webkit-transition: all 0.3s ease;
  -moz-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}

nav ul.sub li a:hover { color: #b7ac7f; }

/*  OVERLAY
========================================== */

.overlay {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1;
  width: 100%;
  height: 100%;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  background-color: #b7ac7f;
  opacity: 0;
  visibility: hidden;
}

.overlay.show {
  opacity: 0.8;
  visibility: visible;
}
h1 { margin:50px auto; text-align:center;}
</style>
</head>

<body>
<h1>Modern Off-canvas Burger Menu Demo</h1>
<div class="jquery-script-ads" align="center"><script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
<div class="burger"> <span></span> </div>
<nav>
  <ul class="main">
    <li><a href="#0">Home</a></li>
    <li><a href="#0">Works</a></li>
    <li><a href="#0">About</a></li>
    <li><a href="#0">Contact</a></li>
    <li><a href="#0">Cart <span>(5)</span></a></li>
  </ul>
  <div class="about">
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
  </div>
  <div class="social"> <a href="#0" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64">
    <g transform="translate(0, 0)">
      <path d="M64,12.2c-2.4,1-4.9,1.8-7.5,2.1c2.7-1.6,4.8-4.2,5.8-7.3c-2.5,1.5-5.3,2.6-8.3,3.2C51.5,7.6,48.1,6,44.3,6 c-7.3,0-13.1,5.9-13.1,13.1c0,1,0.1,2,0.3,3C20.6,21.6,10.9,16.3,4.5,8.4c-1.1,1.9-1.8,4.2-1.8,6.6c0,4.6,2.3,8.6,5.8,10.9 c-2.2-0.1-4.2-0.7-5.9-1.6c0,0.1,0,0.1,0,0.2c0,6.4,4.5,11.7,10.5,12.9c-1.1,0.3-2.3,0.5-3.5,0.5c-0.8,0-1.7-0.1-2.5-0.2 c1.7,5.2,6.5,9,12.3,9.1c-4.5,3.5-10.2,5.6-16.3,5.6c-1.1,0-2.1-0.1-3.1-0.2C5.8,55.8,12.7,58,20.1,58c24.2,0,37.4-20,37.4-37.4 c0-0.6,0-1.1,0-1.7C60,17.1,62.2,14.8,64,12.2z"></path>
    </g>
    </svg></a> <a href="#0" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64">
    <g transform="translate(0, 0)">
      <path d="M32,5.766c8.544,0,9.556,0.033,12.931,0.187c3.642,0.166,7.021,0.895,9.621,3.496 c2.6,2.6,3.329,5.979,3.496,9.621c0.154,3.374,0.187,4.386,0.187,12.931s-0.033,9.556-0.187,12.931 c-0.166,3.642-0.895,7.021-3.496,9.621c-2.6,2.6-5.98,3.329-9.621,3.496c-3.374,0.154-4.386,0.187-12.931,0.187 s-9.557-0.033-12.931-0.187c-3.642-0.166-7.021-0.895-9.621-3.496c-2.6-2.6-3.329-5.979-3.496-9.621 C5.798,41.556,5.766,40.544,5.766,32s0.033-9.556,0.187-12.931c0.166-3.642,0.895-7.021,3.496-9.621 c2.6-2.6,5.979-3.329,9.621-3.496C22.444,5.798,23.456,5.766,32,5.766 M32,0c-8.691,0-9.78,0.037-13.194,0.193 c-5.2,0.237-9.768,1.511-13.436,5.178C1.705,9.037,0.43,13.604,0.193,18.806C0.037,22.22,0,23.309,0,32 c0,8.691,0.037,9.78,0.193,13.194c0.237,5.2,1.511,9.768,5.178,13.436c3.666,3.666,8.234,4.941,13.436,5.178 C22.22,63.963,23.309,64,32,64s9.78-0.037,13.194-0.193c5.199-0.237,9.768-1.511,13.436-5.178c3.666-3.666,4.941-8.234,5.178-13.436 C63.963,41.78,64,40.691,64,32s-0.037-9.78-0.193-13.194c-0.237-5.2-1.511-9.768-5.178-13.436 c-3.666-3.666-8.234-4.941-13.436-5.178C41.78,0.037,40.691,0,32,0L32,0z"></path>
      <path data-color="color-2" d="M32,15.568c-9.075,0-16.432,7.357-16.432,16.432c0,9.075,7.357,16.432,16.432,16.432 S48.432,41.075,48.432,32C48.432,22.925,41.075,15.568,32,15.568z M32,42.667c-5.891,0-10.667-4.776-10.667-10.667 c0-5.891,4.776-10.667,10.667-10.667c5.891,0,10.667,4.776,10.667,10.667C42.667,37.891,37.891,42.667,32,42.667z"></path>
      <circle data-color="color-2" cx="49.082" cy="14.918" r="3.84"></circle>
    </g>
  </svg></a> </div>
  <ul class="sub">
    <li><a href="#0">FAQ &amp; Shipping</a></li>
    <li><a href="#0">Terms &amp; Conditions</li>
  </ul>
</nav>
<div class="overlay"></div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> 
<script>
$('.burger, .overlay').click(function(){
  $('.burger').toggleClass('clicked');
  $('.overlay').toggleClass('show');
  $('nav').toggleClass('show');
  $('body').toggleClass('overflow');
});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
