<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
<style>
body {
  background-color: gray;
}
.login{
	display: table-cell;
   text-align: center;
   vertical-align: middle;
   display: table;
   width: 100%;
   height: 1%;
}
</style>
<body>
<div class="login">
<h1>Administrator</h1>
<form action="autentificareadmin.php" method="post">
<label for="username">

</label>
<input type="text" name="username" placeholder="Username"
id="username" required>
<label for="password"><p>
</label>
<input type="password" name="password" placeholder="Password"
id="password" required><p>
<input type="submit" value="Login">
</form>
</div>
</body>
</html>