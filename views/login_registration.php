<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>

    <form class="" action="/Travels/login" method="post">
      <?php
      if (form_error('login_username') || form_error('login_password'))
      {
          echo "username or password not acceptable";
      } ?>
      <input type="text" name="login_username" value="" placeholder = "username">

      <input type="password" name="login_password" value="" placeholder = "password">
      <input type="submit"  value="Login">
    </form>

    <form class="" action="/Travels/register" method="post">
      <input type="text" name="name" value="" placeholder = "name">
      <input type="text" name="username" value="" placeholder = "username">
      <input type="password" name="password" value="" placeholder = "password">
      <input type="password" name="confirm_password" value="" placeholder = "confirm password">
      <input type="submit"  value="Register">
    </form>

  </body>
</html>
