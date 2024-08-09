<?php
session_start();
if(!empty($_SESSION['names']))
{
  header('location:thana/dashboard.php');
}

include 'config.php';
if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['names'] = $row['name'];
      $_SESSION['user_id'] = $row['id'];
      echo("<script type='text/javascript'> alert('login Successfully!!'); window.location='thana/dashboard.php';</script>");
   }else{
      echo("<script type='text/javascript'> alert('incorrect password or email!');</script>");
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
    <h4 id="login-btn">स्टेशन लॉगिन करा</h4>
  </div>

  <video autoplay loop muted playinline src="./AsstesAll/Police Scorpio Kaa.mp4"></video>

  <div class="login-form-container">
  <i class='bx bx-x' id="form-close"></i>
    <form action="#" method="post">
      <h3 id="title">स्टेशन लॉगिन</h3>
      <div class="input-field" id="emailField">
        <input type="email" name = "email" class="box" placeholder="तुमचा ईमेल टाका">
      </div>
      <div class="input-field">
        <input type="password" name = "password" class="box" placeholder="तुमचा पासवर्ड टाका">
      </div>
      <input type="submit" name = "submit" value="आता लॉगिन करा" class="btn">
      <p style="color: #000;">पासवर्ड विसरलात? <a onclick="window.location.href = 'forgetPassword.php';" href="#" id="forgetPass">इथे क्लिक करा</a></p>
      <p style="color: #000;">खाते आणि खाते नाही? <a onclick="window.location.href = 'indexAndRegister.php';" href="#" id="signup">नोंदणी करा</a></p>
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