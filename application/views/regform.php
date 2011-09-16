<?
/*
| File: regform.php
| Parameters taken:
| $signedin = TRUE if signed in.
| $name = name if signed in.
| $id = user ID if signed in.
| $events = array of (event ID, event name).
| $opens = array of (event ID, event name) for open events.
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Huron BPA - Home</title>
<link rel="stylesheet" type="text/css" href="http://huronbpa.org/css/mystyle.css" />
</head>
<body>
<div style="width:1000px; height:2000px; position:relative; margin-left: auto;
	margin-right: auto; padding:17px; border-right:6px solid #063; border-left:6px solid #063;" > 

<!-- LOGO -->
<img src="http://huronbpa.org/images/logo.png" width="200" />

<!-- Navigation Bar -->
<div style="width:1000px;">
<ul id="button">
<li><a href="#">Home</a></li>
<li><a href="#">About</a></li>
<li><a href="http://huronbpa.org/events">Events</a></li>
<li><a href="#">Commitees</a></li>
<li>
<? if(!$signedin): ?>
	<a class="hover" href="http://huronbpa.org/register">Register</a>
<? else: ?>
	Logged in as: <a href="http://huronbpa.org/user/<?=$id?>"> <?=$name?> </a>
<? endif; ?>
</li>
</ul>
</div>

<h1> Register Now! </h1>
<h2> For the 2011-2012 Huron Chapter...</h2>
<form action="http://huronbpa.org/register/submit" method="POST">
<h2 style="color:red;"><?
	// Errors with form validation will be displayed here.
	echo validation_errors();
?></h2>
<table>
<tr>
<td>

<div id="personalinfo"/>
<h3 style="position:absolute; z-index:1; left: 160px; top: -10px;"> Personal Information</h3>
<table id="personal">
<tr>
<td><h4>First Name:</h4></td>
<td><input type="text" name="firstname" /></td>
</tr>
<tr>
<td><h4>Last Name:</h4></td>
<td><input type="text" name="lastname" /></td>
</tr>
<tr>
<td><h4>Gender:</h4></td>
<td><select name="gender">
<option value=""></option>
  <option value="M">Male</option>
  <option value="F">Female</option>
</select></td>
</tr>
<tr>
<td><h4>Email Address:</h4></td>
<td><input type="text" name="email" /></td>
</tr>
<tr>
<td><h4>Student ID:</h4></td>
<td><input type="text" name="studentid" /></td>
</tr>
<tr>
<td><h4>Cell Phone:</h4></td>
<td><input type="text" name="cellph" /></td>
</tr>
<tr>
<td><h4>Home Phone:</h4></td>
<td><input type="text" name="homeph" /></td>
</tr>
<tr>
<td><h4>Grade:</h4></td>
<td><select name="grade">
  <option value="9">Freshman</option>
  <option value="10">Sophomore</option>
  <option value="11">Junior</option>
  <option value="12">Senior</option>
</select></td>
</tr>
<tr>
<td><h4>Are you a returning member?</h4></td>
<td><select name="returning">
<option value=""></option>
  <option value="yes">Yes</option>
  <option value="no">No</option>
</select></td>
</tr>
</table>
</div>  

</td>
<td>

<div id="events"/>
<h3 style="position:absolute; z-index:1; left: 110px; top: -10px;">Competitive Events</h3>

<h4> 1st Choice: </h4> 
<select name='event1'>
  <option value=""></option>
<? foreach($events as $event): ?>
  <option value="<?=$event['id']?>"> <?=$event['name']?> </option>
<? endforeach; ?>
</select><br/>
<h4> 2nd Choice: </h4> 
<select name='event2'>
  <option value=""></option>
<? foreach($events as $event): ?>
  <option value="<?=$event['id']?>"> <?=$event['name']?> </option>
<? endforeach; ?>
</select><br/>
<h4> 3rd Choice: </h4> 
<select name='event3'>
<option value=""></option>
<? foreach($events as $event): ?>
  <option value="<?=$event['id']?>"> <?=$event['name']?> </option>
<? endforeach; ?>
</select><br/>
<h4> 4th Choice: </h4> 
<select name='event4'>
<option value=""></option>
<? foreach($events as $event): ?>
  <option value="<?=$event['id']?>"> <?=$event['name']?> </option>
<? endforeach; ?>
</select><br/>
<h4> 5th Choice: </h4> 
<select name='event5'>
<option value=""></option>
<? foreach($events as $event): ?>
  <option value="<?=$event['id']?>"> <?=$event['name']?> </option>
<? endforeach; ?>
</select><br/>
<table>
<tr>
<td>
<h4> Area of Interest #1: </h4> 
<select name='area1' style="width:180px;">
  <option value="Financial Services">Financial Services</option>
  <option value="Administrative Support">Administrative Support</option>
  <option value="Information Technology">Information Technology</option>
  <option value="Management/Marketing/Human Resources">Management/Marketing/Human Resources</option>
</select><br/>
</td>
<td>
<h4> Area of Interest #2: </h4> 
<select name='area2' style="width:180px;">
  <option value="Financial Services">Financial Services</option>
  <option value="Administrative Support">Administrative Support</option>
  <option value="Information Technology">Information Technology</option>
  <option value="Management/Marketing/Human Resources">Management/Marketing/Human Resources</option>
</select><br/>
</td>
</tr>
</table>
<table>
<tr>
<td>
<h4> Open Event #1: </h4> 
<select name='open1' style="width:180px;">
<? foreach($opens as $event): ?>
  <option value="<?=$event['id']?>"> <?=$event['name']?> </option>
<? endforeach; ?>
</select><br/>
</td>
<td>
<h4> Open Event #2: </h4> 
<select name='open2' style="width:180px;">
<? foreach($opens as $event): ?>
  <option value="<?=$event['id']?>"> <?=$event['name']?> </option>
<? endforeach; ?>
</select><br/>
</td>
</tr>
</table>
</div>

</td>
</tr>
</table>
<div id="schedule"/>
<h3 style="position:absolute; z-index:1; left: 410px; top: -10px;">Class Schedule</h3>
<table id="personal">
<tr>
<td><h4></h4></td>
<td><h4>Course</h4></td>
<td><h4>Teacher</h4></td>
<td><h4>Room #</h4></td>
</tr>
<tr>
<td><h4>1st Hr:</h4></td>
<td><input class="course" type="text" name="1course" /></td>
<td><input class="teacher" type="text" name="1teacher" /></td>
<td><input class="room" type="text" name="1room" /></td>
</tr>
<tr>
<td><h4>2nd Hr:</h4></td>
<td><input class="course" type="text" name="2course" /></td>
<td><input class="teacher" type="text" name="2teacher" /></td>
<td><input class="room" type="text" name="2room" /></td>
</tr>
<tr>
<td><h4>3rd Hr:</h4></td>
<td><input class="course" type="text" name="3course" /></td>
<td><input class="teacher" type="text" name="3teacher" /></td>
<td><input class="room" type="text" name="3room" /></td>
</tr>
<tr>
<td><h4>4th Hr:</h4></td>
<td><input class="course" type="text" name="4course" /></td>
<td><input class="teacher" type="text" name="4teacher" /></td>
<td><input class="room" type="text" name="4room" /></td>
</tr>
<tr>
<td><h4>5th Hr:</h4></td>
<td><input class="course" type="text" name="5course" /></td>
<td><input class="teacher" type="text" name="5teacher" /></td>
<td><input class="room" type="text" name="5room" /></td>
</tr>
<tr>
<td><h4>6th Hr:</h4></td>
<td><input class="course" type="text" name="6course" /></td>
<td><input class="teacher" type="text" name="6teacher" /></td>
<td><input class="room" type="text" name="6room" /></td>
</tr>
<tr>
<td><h4>7th Hr:</h4></td>
<td><input class="course" type="text" name="7course" /></td>
<td><input class="teacher" type="text" name="7teacher" /></td>
<td><input class="room" type="text" name="7room" /></td>
</tr>
</table>

<table>
<tr>
<td><h5>Have you ever taken a Huron business class? If so, please list them.</h5></td>
<td><select style="float:right;" name="bcpast">
<option value=""></option>
  <option value="yes">Yes</option>
  <option value="no">No</option>
</select></td>
<td><input class="business" type="text" name="businesspast" /></td>
</tr>
<tr>
<td><h5>Are you currently enrolled in a Huron business class for the 2011-12 school year? If so, please list them.</h5></td>
<td><select style="float:right;" name="bcnow">
<option value=""></option>
  <option value="yes">Yes</option>
  <option value="no">No</option>
</select></td>
<td><input class="business" type="text" name="businessnow" /></td>
</tr>
</table>
</div>
<input id="submit" type="submit" value="Submit" />
</div>
</form>
</body>
</html>
