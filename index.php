<?php

require_once("functions.php");

if (isset($_GET['amount']) && $_GET['amount'] != null)
  $amount = intval($_GET['amount']);
else
  $amount = 20;

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Quest Tracker">
    <meta name="author" content="ShinDarth">
    <title>TC Quest Tracker</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <p class="h2 text-center"><img src="img/trinitycore.png" alt="TrinityCore">TrinityCore Quest Tracker</p>
      <hr>
      <form style="margin: auto; width: 360px;" class="form-inline" role="form" method="GET">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Abandoned quest shown:</div>
            <input name="amount" style="max-width: 80px;" class="form-control" type="text" value="<?= $amount ?>" placeholder="20">
          </div>
        </div>

        <button type="submit" class="btn btn-success">Search</button>
      </form>
      <br>
      <table class="table text-center" data-sortable>
        <thead>
          <th class="text-center th-elem hover-pointer" onClick="thfocus(this)">Quest ID</th>
          <th class="text-center th-elem hover-pointer" onClick="thfocus(this)">Quest Name</th>
          <th class="text-center th-elem hover-pointer" onClick="thfocus(this)" style="color: blue;">Abandoned</th>
          <th class="text-center th-elem hover-pointer" onClick="thfocus(this)">Completed</th>
          <th class="text-center th-elem hover-pointer" onClick="thfocus(this)">Last Abandoned</th>
          <th class="text-center th-elem hover-pointer" onClick="thfocus(this)">Last Completed</th>
        </thead>
        <tbody>
        <?php printTableBody($amount); ?>
        </tbody>
      </table>
      <br>
      <hr>
      <p class="h4 text-center">Coded by <a href="http://www.github.com/ShinDarth">ShinDarth</a>&nbsp;<iframe style="vertical-align: middle;" src="http://ghbtns.com/github-btn.html?user=ShinDarth&repo=TC-Quest-Tracker&type=watch&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="110" height="20"></iframe></p>
      <a href="https://github.com/ShinDarth/TC-Quest-Tracker"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/38ef81f8aca64bb9a64448d0d70f1308ef5341ab/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6461726b626c75655f3132313632312e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png"></a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/sortable.min.js"></script>
    <script>
      function thfocus(element)
      {
        $('.th-elem').each(function() {
          $(this).css("color", "black");
        });

        $(element).css("color", "blue");
      }
    </script>
    </script>
  </body>
</html>
