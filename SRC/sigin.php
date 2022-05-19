<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <title></title>
  </head>
  <body>
    <div class="box3">
    <form  method="post">
    Email <br> <input type="text" name="email" value=""><br>
    Password <br> <input type="password" name="pass" value=""><br>
    <input type="submit" name="login" value="Log in">
   </form>
   </div>
   <div class="box4">
   <form class="" action="delete.php" method="post">
     <input type="submit" name="delet" value="Delete your details">
   </form>
   &nbsp;&nbsp;
   <br>
   <form class="" action="update.php" method="post">
     <input type="submit" name="update" value="Update your details">
   </form>
   &nbsp;&nbsp;
   <form class="" action="dashboard.php" method="post">
     <input type="submit" name="dashboard" value="Go to Dashboard">
   </form>
   </div>
   <?php
   if(isset($_POST['login']))  {
    $conn=mysqli_connect('localhost','root','','login_form');
    $a=htmlspecialchars(trim($_POST["email"]));
    $b=htmlspecialchars(trim($_POST["pass"]));
    $_SESSION['user']=$a;
    $_SESSION['password']=$b;
    $query1="SELECT first_name,email_ID,password from r_form where email_ID='$a' and password='$b'";
    $res=mysqli_fetch_assoc(mysqli_query($conn,$query1));
    $dis="SELECT * from r_form";
    $res1=mysqli_query($conn,$dis);
    if(!($res['email_ID']==null) or !($res['password']==null)){
      ?>
      <div class="box6">
      <pre class="welcome-msg">
        <?php echo "Hi Hello ";
            echo $res['first_name']; ?>
      </pre>
      <table>
        <tr>
          <td>First Name</td>
          <td>Last Name</td>
          <td>Email ID</td>
          <td>Phone no</td>
          <td>DOB</td>
        </tr>
        <?php
    while ($allusers=mysqli_fetch_assoc($res1)) {
      ?>
        <tr>
          <td><?php echo $allusers['first_name']; ?></td>
          <td><?php echo $allusers['last_name']; ?></td>
          <td><?php echo $allusers['email_ID']; ?></td>
          <td><?php echo $allusers['phone_no']; ?></td>
          <td><?php echo $allusers['DOB']; ?></td>
        </tr>
    <?php  }?>
  </table>
</div>
<?php
  }}

     ?>
  </body>
</html>
