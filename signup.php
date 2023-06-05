<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Promotion</title>
</head>
<body>
    <div class="signup_container">
        <div class="signup_form_container">
            <div class="left">
                <h1>Welcome Back</h1>
                <a href="index.php">
                    <button type="button" class="white_btn">
                        Sign in
                    </button>
                </a>
            </div>
            <div class="right">
                <form class="form_container" action="signup.php" method="post" >
                    <h1>Create Account</h1>
                    <input
                        type="text"
                        placeholder="Username"
                        name="username"
                        required
                        class="input"
                    />
                    <input
                    type="email"
                    placeholder="Email"
                    name="email"
                    required
                    class="input"
                    />
                    <input
                        type="password"
                        placeholder="Password"
                        name="password"
                        required
                        class="input"
                        id="password"
                    />
                    <input
                        type="password"
                        placeholder="Confirm Password"
                        name="cpassword"
                        required
                        class="input"
                        id="cpassword"
                    />
                    <button type="submit" class="green_btn" name="submit" onclick="return isvalid()">
                        Sign Up
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    function isvalid(){
        var cpassword=document.getElementById("cpassword").value;
        var password=document.getElementById("password").value;

        if(cpassword!=password){
            alert("Check Password");
            return false;
        }
    }
</script>
</html>

<?php

include("connection.php");

if(isset($_POST['submit'])){

    
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];

$sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$count=mysqli_num_rows($result);

// echo $count;

if($count==0){

    $insert="INSERT INTO users (username,email,password) VALUES('$username','$email','$password')";
    $result1=mysqli_query($conn,$insert);
    // sleep(1);
    if($result1){

        $pool_12=1;
        $pool_8=1;
        $i=1;
        $i2=1;

        $query_1=" SELECT * FROM users WHERE pools='1' ";
        $results1=mysqli_query($conn,$query_1);
        $total1=mysqli_num_rows($results1);

        $query_2=" SELECT * FROM users WHERE pools='2' ";
        $results2=mysqli_query($conn,$query_2);
        $total2=mysqli_num_rows($results2);

        if($total1==13){
        $query_1="UPDATE users SET amount=12 WHERE id=1";
        $results1=mysqli_query($conn,$query_1);
        $query_2="UPDATE users SET pools=2 WHERE id=1";
        $results2=mysqli_query($conn,$query_2);
            $pool_12=$pool_12+1;

        //     echo $total1;
        //     echo $results;
        //     echo $pool_12;
        }
        else if($total2==13 and $pool_12==2){
            $query_1="UPDATE users SET amount=24 WHERE id=1";
            $results1=mysqli_query($conn,$query_1);
            $query_2="UPDATE users SET pools=3 WHERE id=1";
            $results2=mysqli_query($conn,$query_2);

            $pool_12=$pool_12+1;
        }
        else if($total1==(13+8*$i) and $pool_8==1){

            $query_1="UPDATE users SET amount=8 WHERE id=$i+1";
            $results1=mysqli_query($conn,$query_1);
            $query_2="UPDATE users SET pools=2 WHERE id=$i+1";
            $results2=mysqli_query($conn,$query_2);
            $pool_8=$pool_8+1;
            $i=$i+1;
        }
        else if($total1==(13+8*$i2) and $pool_8==2){
            $query_1="UPDATE users SET amount=8 WHERE id=$i+1";
            $results1=mysqli_query($conn,$query_1);
            $query_2="UPDATE users SET pools=3 WHERE id=$i+1";
            $results2=mysqli_query($conn,$query_2);
            $pool_8=$pool_8+1;
            $i=$i+1;
        }
        
        echo '<script>
            // alert("Successfully Added Into Database");
            window.location.href="signup.php";
            </script>';
        //     //header("Location:add_student.php");
            

    }
}
else{

    echo '<script>
            alert("Username and Password already exists");
            window.location.href="signup.php";
        </script>';

    //header("Location:add_student.php");

}

}

?>