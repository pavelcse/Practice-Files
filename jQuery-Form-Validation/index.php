<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
<script type="text/javascript" language="javascript" src="javascripts/jquery.js"></script>
<script type="text/javascript" language="javascript" src="javascripts/script.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="images/favicon.ico">
<title>Form Validation in jQuery</title>
</head>

<body>

<div class="logo"></div><!-- end of logo -->

<div class="workarea">

<h1>Create an Account</h1>

<form id=registration_form action="register.php" method="post">
<table>
<tr><td>Chose Username: </td><td><input type="text" class="form_text" id="form_username"></td><td><span class="error_form" id="username_error_message"></span></td></tr>
<tr><td>Password: </td><td><input type="password" class="form_text" id="form_password"></td><td><span class="error_form" id="password_error_message"></span></td></tr>
<tr><td>Retype Password: </td><td><input type="password" class="form_text" id="form_retype_password"></td><td><span class="error_form" id="retype_password_error_message"></span></td></tr>
<tr><td>Email: </td><td><input type="text" class="form_text" id="form_email"></td><td><span class="error_form" id="email_error_message"></span></td></tr>
<tr><td></td><td><input type="submit" class="sbmt_btn" value="Create Account"></td><td></td></tr>
</table>
</form>

</div><!-- end of workarea -->

</body>
</html>