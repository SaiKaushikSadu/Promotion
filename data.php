<?php
    session_start();
    //  echo "welcome ".$_SESSION['user_name'];


    include("connection.php");
    error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="data.css">
    <title>Promotion</title>
  </head>
  <body>
    <div class="container">
      <h2 class="details">DETAILS OF THE MEMBERS</h2>
      <div className="order-box">
          <div className="order-header">
          </div>
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Amount</th>
                <th>Pool</th>
              </tr>
            </thead>
            <tbody>

    <?php
      $userpro=$_SESSION["user_name"];

      if($userpro==true){

      }
      else{
          header("Location:index.php");
      }

      $query="SELECT * FROM users";
            $data=mysqli_query($conn,$query);
            $total=mysqli_num_rows($data);

            while($results= mysqli_fetch_assoc($data)){
              echo '
                  <tr>
                    <td>'.$results["id"].'</td>
                    <td>'.$results["username"].'</td>
                    <td>'.$results["email"].'</td>
                    <td>'.$results["amount"].'</td>
                    <td>'.$results["pool"].'</td>
                  </tr> ';
            }

                  ?>
              </tbody>
            </table>
          </div>
    </div>
</body>
</html>

