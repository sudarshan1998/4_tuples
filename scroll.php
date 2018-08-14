
<?php include "dbconn.php" ?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <link rel="stylesheet" type="text/css" href="mcq_frontEnd.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>reading_page</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"style="padding-left: 42%">READING PARAGRAPH</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>


<div id = "scroll" style="overflow-y: scroll;width: 400px;height:300px;float: left;margin-left: 480px;float: left;margin-top: 50px;background-color:blue;">

  <?php
    	$table_name = 'quanda';
      $sql = "SELECT * FROM $table_name ";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {

          while ($row = mysqli_fetch_assoc($result)) {

              echo $row['passage'];


              }
          }

  ?>

</div>


<button id = "cick_me">CONTINUE</button>
<p></p>

</body>
</html>
<script = "text/javascript">
$(document).ready(function(){
  var lastScroll = 2772;
  $("#scroll").scroll(function(){
    var currentScroll = $(this).scrollTop();
    $("p").text(currentScroll);
    num1  = parseInt(currentScroll);

    $("#cick_me").click(function(){
      if(num1  >  lastScroll){
        $(location).attr("href","practice_main.php");
      }
      else {
        alert("not good");
        return false;
      }
    });
  });

});
</script>
