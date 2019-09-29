<?php
session_start();
$error = "";




    $mysqli = new mysqli('localhost', 'root', '', 'wbn') or die(mysqli_error($mysqli));



if (isset($_POST['tag']))
 {
   $qr_code = mysqli_real_escape_string($mysqli, $_POST['qr_code']);
  //$qr_code   = $_POST['qr_code'];


  $sql_u = "SELECT * FROM users WHERE qr_code='$qr_code'";
  //$data = mysqli_num_rows($sql_u);
   $res_u = mysqli_query($mysqli, $sql_u);

    if (mysqli_num_rows($res_u) > 0)
    {
      $_SESSION["qr_code"]  = $qr_code;
      $error = "<span style='color:red';><b> Code Already Assigned!</b></span>";

    //  echo htmlspecialchars(strip_tags($_POST['qr_code']), ENT_QUOTES, 'UTF-8');
    }
    else{

      $mysqli->query("INSERT INTO users(qr_code) VALUES('$qr_code')") or

    die($mysqli->error);

    if ($mysqli) {

      $error ="<span style='color:green';><b>Registration Successful!</b></span>";
    //  header("Location: frontend.php");
    }



    // $msg = "<h2 style='color:green';>Registration Successful!</h2></br>";
    // echo $error. "<h2 style='color:green';>Registration Successful!</h2>";
    // header(Location:"frontend.php");
    // header("Location: frontend.php");



          // $row = mysqli_fetch_array($res_u);

         }

    }
  //   header("Location: frontend.php");
  ?>
