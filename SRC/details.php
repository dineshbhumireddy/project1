<?php
session_start();
 ?>
<?php
if(isset($_POST['update'])){
echo "Successfully registered";
$conn=mysqli_connect('localhost','root','','login_form');
if($conn){
  echo "connected";
  echo $_SESSION['temp'];
  $first_name=htmlspecialchars(trim($_POST['first_name']));
  $last_name=htmlspecialchars(trim($_POST['last_name']));
  $email_ID=htmlspecialchars(trim($_POST['email_ID']));
  $phone_no=htmlspecialchars(trim($_POST['phone_no']));
  $password=htmlspecialchars(trim($_POST['password']));
  $DOB=htmlspecialchars(trim($_POST['DOB']));
  $x=$_SESSION['user'];
  $query1="SELECT email_ID,password from r_form where email_ID='$x'";
  $res=mysqli_fetch_assoc(mysqli_query($conn,$query1));
  if($email_ID==$res['email_ID'] && $password=$res['password']){
  $query="UPDATE r_form set first_name='$first_name',last_name='$last_name',
  phone_no=$phone_no,DOB='$DOB' where email_ID='$x'";
  $result=mysqli_query($conn,$query);
  if($result){
    echo "successfully updated";
  }
}
}
}
?>
