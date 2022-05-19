<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <title>Login form</title>
  </head>
  <body>
    <div class="box1">
<form class="" action="loginform.php" method="post">
  First Name <br> <input type="text" name="first_name" value=""><br>
  Last name  <br>  <input type="text" name="last_name" value=""><br>
  Email id    <br> <input type="text" name="email_ID" value=""><br>
  Phone No    <br> <input type="number" name="phone_no" value=""><br>
  Password    <br> <input type="password" name="password" value=""><br>
  DOB        <br>  <input type="date" name="DOB" value=""><br>
              <br> <input type="submit" name="submit" value="Register">
</form>
</div>
<?php
if(isset($_POST['submit'])){?>
  <pre class="welcome-msg"><?php echo "Successfully registered"; ?></pre>
<?php
$conn=mysqli_connect('localhost','root','','login_form');
if($conn){
  $first_name=htmlspecialchars(trim($_POST['first_name']));
  $last_name=htmlspecialchars(trim($_POST['last_name']));
  $email_ID=htmlspecialchars(trim($_POST['email_ID']));
  $phone_no=htmlspecialchars(trim($_POST['phone_no']));
  $password=htmlspecialchars(trim($_POST['password']));
  $DOB=htmlspecialchars(trim($_POST['DOB']));
  $query="INSERT into r_form(first_name,last_name,email_ID,phone_no,password,DOB)
  VALUES ('$first_name','$last_name','$email_ID',$phone_no,'$password','$DOB')";
  $result=mysqli_query($conn,$query);
}
}
 ?>
 <div class="box2">
 <form class="" action="sigin.php" method="post">
   <input type="submit" name="signin" value="Sign in">
 </form>
</div>
  </body>
</html>
