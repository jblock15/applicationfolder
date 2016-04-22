<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Travels</title>
  </head>
  <body>
    Future Travels
    <?= $this->session->userdata['user_name'];
    var_dump($on_trips);
    var_dump($join_trips);
    ?>
    <a href = "/newtravel">New Plan?</a>

  </body>
</html>
