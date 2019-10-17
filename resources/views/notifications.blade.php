@extends('layouts.auth')
@section('style')
<style>
* {
	box-sizing: border-box;
	font-family: sans-serif;
}

body {
	min-height: 100vh;
	min-width: 100vw;

}

nav {
	border-bottom: 1px solid rgba(0, 0, 0, 0.25);
	box-shadow: 0px 3px rgba(0, 0, 0, 0.25);
}

form.search-form input[type=text] {
	padding: 7px 3px;
	font-size: 17px;
	border: 1px solid #B1B1B1;
	float: left;
	width: 85%;
	background: #FFFFFF;
	border-left: none;
	border-radius: 0px 4px 4px 0px;
	margin-bottom: 20px;
}

form.search-form button {
	float: left;
	width: 15%;
	padding: 7px 3px;
	background: #FFFFFF;
	color: black;
	font-size: 17px;
	border: 1px solid #B1B1B1;
	border-right: none;
	cursor: pointer;
	border-radius: 4px 4px 0px 0px;
	margin-bottom: 20px;
}

form.search-form button:hover {
	background: #091429;
}

form.search-form::after {
	content: "";
	clear: both;
	display: table;
}

nav img {
	height: 30px;
	width: 30px;
	padding: 5px;
	margin: 8px;
}

.navli {
	border-right: 2px solid #B1B1B1;
	margin-bottom: 14px;
}

.user {
	width: 50px;
	height: 50px;
	background-color: #FFFFFF;
	color: #000000;
	border: 1px solid;
	border-radius: 50px;
	text-align: center;
	padding: 15px 15px;
	margin: 7px;
	text-decoration: none;
	
}

.menu {
	width: 15%;
	float: left;
	padding: 15px;
}

.main {
	width: 85%;
	float: left;
	padding-left: 15px;
	overflow: hidden;

 
}

h1 {
	font-family: sans-serif;
	font-style: normal;
	font-weight: bold;
	font-size: 18px;
	margin-bottom: 20px;
	margin-top: 24px;
	
}


.notification-box img {
	margin: 10px;
	margin-left: 20px;
	margin-right: -10px;
	padding: 14px;
}

.notification-box {
	border: 1px solid #C4C4C4;
	margin-bottom: 15px;
	margin-right: 20px;
}


b {
	font-family: sans-serif;
	font-style: normal;
	font-weight: bold;
	font-size: 14px;
	
}


span {
	font-family: sans-serif;
	font-style: normal;
	font-weight: normal;
	font-size: 14px;
	line-height: 2
}

p {
	font-family: sans-serif;
	font-style: normal;
	font-weight: normal;
	font-size: 12px;
	margin-bottom: 0px;
}


.main .float {
	position: fixed;
	width: 50px;
	height: 50px;
	bottom: 40px;
	left: width;
	margin-left: 50px;
	background-color: #0ABAB5;
	color: #FFF;
	border: none;
	border-radius: 50px;
	text-align: center;
	box-shadow: 2px 2px 3px #999;
	text-decoration: none;
}

.float .my-float{
	font-size: 25px;
	line-height: 20px;
	color: white;
	margin-top: 50px;
	text-decoration: none;
}

/* sidebar p */
.sidebar ul a {
margin-top: 30%;
font-weight: bold;
font-size: 12px;
line-height: 15px;
color: white;
display: block;
text-decoration: none;
text-align: left;
letter-spacing: 1px;

}

.sidebar a {
	text-decoration: none;
	color: white;
}

.sidebar img, {
 padding: 5px;
}

#sideBarBtn, #closebtn {
	display: none;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #091429;
  overflow-x: hidden;
  padding-top: 20px;
  text-align: center;
  transition: 0.5s;

}


.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 40px;
  margin-left: 50px;
}

.openbtn {
  font-size: 15px;
  cursor: pointer;
  color: black;
  border: none;
  background-color: #fff;
}

@media screen and (min-width: 710px) and (max-width: 850px) {

h1, .notification-box, nav {
	margin-left: 80px;
}
}

@media screen and (min-width: 850px) and (max-width: 1090px) {

h1, .notification-box, nav {
	margin-left: 70px;
}
}


@media screen and (max-width: 710px) {
body {
	box-sizing: border-box;
	
}

nav {
	border-bottom: 1px solid rgba(0, 0, 0, 0.25);
	box-shadow: 0px 1.5px rgba(0, 0, 0, 0.25);
}

.main {
	width: 100%;
}

.sidebar ul a {
margin-top: 20%;
font-size: 11px;
line-height: 10px;
letter-spacing: 1px;

}

#sideBarBtn, #closebtn {
	display: block;
	
}

b, span {
	font-size: 12px;
}

p {
	font-size: 10px;
}

.sidebar {
  width: 0px;
  height: 80vh;

}


.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 0px;
  font-size: 25px;
  margin-left: 50px;
}

form.search-form input[type=text] {
	padding: 7px 3px;
	font-size: 10px;
	border: 1px solid #B1B1B1;
	float: left;
	width: 85%;
	background: #FFFFFF;
	border-left: none;
	border-radius: 0px 4px 4px 0px;
	margin-bottom: 20px;
}

form.search-form button {
	float: left;
	width: 15%;
	padding: 7px 3px;
	background: #FFFFFF;
	color: black;
	font-size: 10px;
	border: 1px solid #B1B1B1;
	border-right: none;
	cursor: pointer;
	border-radius: 4px 4px 0px 0px;
	margin-bottom: 20px;
}

form.search-form button:hover {
	background: #0b7dda;
}

form.search-form::after {
	content: "";
	clear: both;
	display: table;
}

nav img {
	height: 18px;
	width: 18px;
	padding: 2.5px;
	margin: 3px;
}

.navli {
	border-right: none;
	margin-bottom: 7px;
}

.user {
	width: 25px;
	height: 25px;
	background-color: #FFFFFF;
	color: #000000;
	border: 1px solid;
	border-radius: 50px;
	text-align: center;
	padding: 10px 10px;
	margin: 3.5px;
	text-decoration: none;
	
}

}

@media screen and (max-width: 400px) {
 .search-form {
	float: right; 
}

#sideBarBtn {
	display: block;
}


}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

</style>
@endsection


@section('main-content')
<h1>NOTIFICATIONS</h1>
<div class="notification-box">
    <div class="d-flex bd-highlight">
        <div class="p-2 flex-shrink-1 bd-highlight">
            <img src="https://res.cloudinary.com/ros4eva/image/upload/v1570747847/Vector_c4lyp5.png">
        </div>
        <div class="p-2 w-100 bd-highlight">
            <b>A new invoice was created</b><br>
            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</span>
            <p>Today 10:21AM</p>
        </div>
    </div>
</div>

<div class="notification-box">
    <div class="d-flex bd-highlight">
        <div class="p-2 flex-shrink-1 bd-highlight">
            <img src="https://res.cloudinary.com/ros4eva/image/upload/v1570747847/Vector3_gicch8.png">
        </div>
        <div class="p-2 w-100 bd-highlight">
            <b>A new invoice was created</b><br>
            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</span>
            <p>Today 10:21AM</p>
        </div>
    </div>
</div>

<div class="notification-box">
    <div class="d-flex bd-highlight">
        <div class="p-2 flex-shrink-1 bd-highlight">
            <img src="https://res.cloudinary.com/ros4eva/image/upload/v1570747847/Vector_c4lyp5.png">
        </div>
        <div class="p-2 w-100 bd-highlight">
            <b>A new invoice was created</b><br>
            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</span>
            <p>Today 10:21AM</p>
        </div>
    </div>
</div>
@endsection


@section('others')
    <button class="btn btn-secondary text-white rounded-circle" id="add-something">
        <i class="fas fa-plus"></i>
    </button>
@endsection