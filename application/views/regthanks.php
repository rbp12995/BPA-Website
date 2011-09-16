<?
/*
| Parameters:
| $signedin = TRUE if signed in.
| $name = name if signed in.
| $id = user ID if signed in.
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
<li><a href="http://huronbpa.org/home">Home</a></li>
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

<h1 style="font-size:29px;"> Thank you for your registration, We look forward to seeing you at BPA! </h1>
<h2>  Feel free to browse the rest of the site and learn more about the fun of BPA!</h2>


</div>

</body>
</html>
