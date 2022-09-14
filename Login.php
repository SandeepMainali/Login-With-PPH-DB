<?php
 
if($_SERVER ["REQUEST_METHOD"]==="POST")
{
    $name=$_POST['name'];
    $email=$_POST['Email'];
    $password=$_POST['psw'];
    //echo"Hello:",$_POST['Email'],"You are connected";


$sam = new mysqli("localhost:3306","root","","class");//connection purpose 

if($sam->connect_error){
    die("$sam->connect_error");
}

//echo"success";
//start login portion
//echo "db connection Sucess <br>";
$sql ="SELECT * FROM work";
$result =$sam->query ($sql);
$row =$result->fetch_assoc();
// echo "<pre>";
// printf_r($row);
// echo"</pre>";
$db_name= $row['Name'];
$db_email = $row['Email'];
$db_password = $row['Password'];
if($password == $db_password && $email==$db_email && $name==$db_name){
    echo"WELCOME";
}
    else{
        echo"Sorry Please Try to type Coreect Information!..";
    }
}
?>

<html>
<head>
<title>Work</title>
<style>
body{
  color:whitesmoke;
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background: #34495e;
}
.box{
  width: 300px;
  padding: 40px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  background: #191919;
  text-align: center;
}
.box h1{
  color: white;
  text-transform: uppercase;
  font-weight: 500;
}
.box input[type = "text"],.box input[type = "password"]{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid #3498db;
  padding: 14px 10px;
  width: 200px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
}
.box input[type = "text"]:focus,.box input[type = "password"]:focus{
  width: 280px;
  border-color: #2ecc71;
}
.box input[type = "submit"]{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid #2ecc71;
  padding: 14px 40px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  cursor: pointer;
}
.box input[type = "submit"]:hover{
  background: #2ecc71;
}
</style>


</head>
<body>


<form action ="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
  

  <div class="box">
    
  
    <label for="name"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="name" >

    <label for="Email"><b>Email</b></label>
    <input type="text" placeholder="Enter Your Email" name="Email">
     

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw">
        
    <input type="submit" name="" value="Login">
  </div>
</form>

</body>
</html>
