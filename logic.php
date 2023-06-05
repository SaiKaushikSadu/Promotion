<?php

    include("connection.php");

    $pool_12=1;
    $pool_8=1;
    $i=1;
    $i2=1;

    $query_1=" SELECT * FROM users WHERE pool='1' ";
    $results1=mysqli_query($conn,$query_1);
    $total1=mysqli_num_rows($results1);

    // $query_2=" SELECT * FROM users WHERE pool='2' ";
    // $results2=mysqli_query($conn,$query_2);
    // $total2=mysqli_num_rows($results2);

    if($total1==13){
        $query1="UPDATE `users` SET `pool` = '2' AND `amount`='12' WHERE `users`.`id` = 1 ";
        $results=mysqli_query($conn,$query1);
        $pool_12=$pool_12+1;

        echo $total1;
        echo $results;
        echo $pool_12;
    }

?>