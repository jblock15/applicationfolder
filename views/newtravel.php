<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Add a trip</h1>
    <form action="/createtravel" method="post">
      <input type="text" name="destination" placeholder="destination">
      <textarea name="description" rows="8" cols="40"></textarea>
      <input type="date" name="tripsfrom">
      <input type="date" name="tripsto">
      <input type="submit" value="Create a Trip!">
    </form>
  </body>
</html>
