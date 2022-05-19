<?php
session_start(); ?>
<?php
if(isset($_FILES["my_image"]))
{
$i_name=$_FILES['my_image']['name'];
$tmp_name=$_FILES['my_image']['tmp_name'];
$i_ex=pathinfo($i_name,PATHINFO_EXTENSION);
echo("Your image");
$accp=array('jpg','jpeg','png');
if(in_array($i_ex,$accp)){
  $i_path='uploads/'.$i_name;
  move_uploaded_file($tmp_name,$i_path);
  $conn=mysqli_connect('localhost','root','','login_form');
  $query="INSERT into img(i_url) values('$i_name')";
  mysqli_query($conn,$query);
  $query1="SELECT * from img ORDER BY id DESC LIMIT 1";
  $res=mysqli_query($conn,$query1);
  while($images=mysqli_fetch_assoc($res)){
    ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title>Image display</title>
        <link rel="stylesheet" href="css/styles.css">
      </head>
      <body>
        <div class="box8">
        <img class="profile" src="uploads/<?=$images['i_url']?>">
        </div>
      </body>
    </html>
    <?php
    $conn=mysqli_connect('localhost','root','','login_form');
    $a=$_SESSION['user'];
    $query="SELECT * from r_form where email_ID='$a'";
    $res=mysqli_query($conn,$query);
    while($ans=mysqli_fetch_assoc($res)){?>
      <h2>Your Details</h2>
      <?php
      print_r("First name     :  " .$ans['first_name']."<br>");
      print_r("Last name      :  ".$ans['last_name']."<br>");
      print_r("Phone no       :  ".$ans['phone_no']."<br>");
      print_r("Email ID       :  ".$ans['email_ID']."<br>");
      print_r("Date of birth  :  ".$ans['DOB']."<br>");
    }
  }
}
}
 else{
   echo "Error occured";
 }
 ?>
