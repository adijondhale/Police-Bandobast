<?php

include 'config.php';

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   
   $select = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      //$message[] = 'user already exist!';
      echo("<script type='text/javascript'> alert('Reset password link sent to registered email!');</script>");

   }else{
      echo("<script type='text/javascript'> alert('Invalid Email!'); window.location='forgetPassword.php';</script>");
      // header('location:indexAndRegister.php');
   }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Bandobast </title>
  <link rel="stylesheet" href="iALstyle.css">
   
 <!-- css link
  <link rel="stylesheet" type="text/css" href="css/style.css"> -->

  <!--unicons-->
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  
</head>

<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

<div id="cursor"></div>
  <div id="nav">
    <img src="./AsstesAll/logo.png">
    <h4>Home</h4>
    <h4>about us</h4>
    <h4 id="login-btn">Login/Register</h4>
    <!-- <button type="button" class="btnLogin-popup">Login</button> -->
  </div>

  <video autoplay loop muted playinline src="./AsstesAll/Police Scorpio Kaa.mp4"></video>

  <div class="fpass-form-container">;
    
    <i class='bx bx-x' id="form-close"></i>
    <form action="" method="post">
      <h3 id="title">forget password</h3>
      <div class="input-field" id="emailField">
        <input type="email" name = "email" class="box" placeholder="Enter your email">
      </div>
      
      <input type="submit" name = "submit" value="Send mail" class="btn">
      
      <p style="color: #000;">Already have an Account? <a onclick="window.location.href = 'indexAndLogin.php';" href="#" id="signup">login</a></p>
      <p style="color: #000;">Don't Have And Account? <a onclick="window.location.href = 'indexAndRegister.php';" href="#" id="signup">register now</a></p>
    </form>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"
    integrity="sha512-16esztaSRplJROstbIIdwX3N97V1+pZvV33ABoG1H2OyTttBxEGkTsoIVsiP1iaTtM8b3+hu2kB6pQ4Clr5yug=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"
    integrity="sha512-Ic9xkERjyZ1xgJ5svx3y0u3xrvfT/uPkV99LBwe68xjy/mGtO+4eURHZBW2xW4SZbFrF1Tf090XqB+EVgXnVjw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="script.js"></script>

    <!-- <script>
      let signupBtn = document.getElementById("signup");
      let emailField = document.getElementById("emailField");
      let title = document.getElementById("title");

      signupBtn.onclick = function(){
        
      }
    </script> -->

</body>

</html>