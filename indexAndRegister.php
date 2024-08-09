<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $dname = mysqli_real_escape_string($conn, $_POST['districtname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

   $select = mysqli_query($conn, "SELECT * FROM stationrequest WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      //$message[] = 'user already exist!';
      echo("<script type='text/javascript'> alert('user already exist!');</script>");

   }else{
      mysqli_query($conn, "INSERT INTO stationrequest(name,district, email, password) VALUES('$name', '$dname', '$email', '$pass')") or die('query failed');
     // $message[] = 'registered successfully!';
      echo("<script type='text/javascript'> alert('registered successfully!'); window.location='indexAndLogin.php';</script>");
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
  <link rel="stylesheet" href="stationLogin.css">
  <script src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
    <h4>मुख्यपृष्ठ</h4>
    <h4>आमच्याबद्दल</h4>
    <h4 id="login-btn">लॉगिन करा</h4>
    <!-- <button type="button" class="btnLogin-popup">Login</button> -->
  </div>

  <video autoplay loop muted playinline src="./AsstesAll/Police Scorpio Kaa.mp4"></video>

  <div class="signup-form-container">;
    
  <i class='bx bx-x' id="form-close" onclick="window.location.href = 'indexAndLogin.php';"></i>
    <form action="" method="post">
      <h3 id="title">स्टेशन रजिस्टर</h3>

      <div class="input-field">
        <input type="text" name='name' class="box" placeholder="तुमच्या स्टेशनचे नाव एंटर करा">
      </div>

      <div class="input-field">
        <input type="text" name='districtname' class="box" placeholder="तुमचा जिल्हा प्रविष्ट करा">
      </div>
      
      <div class="input-field" id="emailField">
        <input type="email" name='email' class="box" placeholder="तुमचा ईमेल टाका">     
      </div>

      <div class="input-field">
        <input type="password" name='password' class="box" placeholder="तुमचा पासवर्ड टाका">
      </div>

      <div class="input-field">
        <input type="password" name='cpassword' class="box" placeholder="तुमचा पासवर्ड पुन्हा टाका">
      </div>
      
      <input type="submit" name='submit' value="नोंदणी करा" class="btn">
    
      <p style="color: #000;">आधीपासूनच एक खाते आहे?<a onclick="window.location.href = 'indexAndLogin.php';" href="#" id="signup">लॉगिन</a></p>
    </form>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"
    integrity="sha512-16esztaSRplJROstbIIdwX3N97V1+pZvV33ABoG1H2OyTttBxEGkTsoIVsiP1iaTtM8b3+hu2kB6pQ4Clr5yug=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"
    integrity="sha512-Ic9xkERjyZ1xgJ5svx3y0u3xrvfT/uPkV99LBwe68xjy/mGtO+4eURHZBW2xW4SZbFrF1Tf090XqB+EVgXnVjw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="script.js"></script>
    <script>
let loginForm = document.querySelector('.login-form-container');
let formClose = document.querySelector('#form-close');
let signupBtn = document.querySelector('#signup');

formClose.addEventListener('click', () =>{
  loginForm.classList.remove('active');
  window.location.href="index.php";
});
</script>


</body>

</html>