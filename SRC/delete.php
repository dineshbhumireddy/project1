<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Delete Details</title>
<link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <div class="del">
    <form method="post">
      Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" value=""><br>
      <br>
      Password<input type="password" name="password" value=""><br>
      <br>
      <input id="log-del" type="submit" name="delete" value="Login and delete"><br>
    </form>
    </div>
    <?php
if(isset($_POST['delete'])){
  $conn=mysqli_connect('localhost','root','','login_form');
  $a=htmlspecialchars(trim($_POST["email"]));
  $b=htmlspecialchars(trim($_POST["password"]));
  $query1="SELECT email_ID,password from r_form where email_ID='$a' and password='$b'";
  $res=mysqli_fetch_assoc(mysqli_query($conn,$query1));
  if($a==$res['email_ID'] && $b=$res['password']){
    $query2="DELETE from r_form where email_ID='$a'";
    $res2=mysqli_query($conn,$query2);
    echo "Deleted details successfully";
  }
}
?>

  </body>
</html>
