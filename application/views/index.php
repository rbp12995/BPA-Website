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
<li><a class="hover" href="#">Home</a></li>
<li><a href="#">About</a></li>
<li><a href="http://huronbpa.org/events">Events</a></li>
<li><a href="#">Commitees</a></li>
<li>
<? if(!$signedin): ?>
	<a href="http://huronbpa.org/register">Register</a>
<? else: ?>
	Logged in as: <a href="http://huronbpa.org/user/<?=$id?>"> <?=$name?> </a>
<? endif; ?>
</li>
</ul>
</div>
<select>
  <option value="all">All Events</option>
  <option value="IT">Information Technology</option>
  <option value="PP">Junior</option>
  <option value="12">Senior</option>
</select>

  <h1 style="font-size:22px;"> Mass Meeting: Friday Sept. 16th  </h1>
  <h2>Come to BPA's first mass meeting of the 2011-12 school year! We will be going important information and talking about what BPA is. The meeting will be held in room 4201 7th and 8th Hour.</h2>


</div>

</body>
</html>