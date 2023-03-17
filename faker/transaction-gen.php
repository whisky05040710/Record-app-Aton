<?php
    require ('vendor/autoload.php');

    $faker = Faker\Factory::create();
    $conn = mysqli_connect("localhost","root","","Record_App");

    if(!$conn)
    {   
    die(mysqli_error());
    }  
     
    $actions = array('IN', 'OUT', 'COMPLETE');
    $remarks = array('Signed', 'For approval', 'Pending','');

    $faker = Faker\Factory::create();
    for ($i = 1; $i <= 200; $i++) {
        $datelog = mysqli_real_escape_string($conn, date("Y-m-d H:i:s"));
        $documentcode = mysqli_real_escape_string($conn, $faker->numberBetween($min = 100, $max = 110));
        $action = mysqli_real_escape_string($conn, $actions[rand(0, 2)]);
        $office_id = mysqli_real_escape_string($conn, $faker->numberBetween($min = 1, $max = 10));
        $employee_id = mysqli_real_escape_string($conn, $faker->numberBetween($min = 1, $max = 10));
        $remarks = mysqli_real_escape_string($conn, $remarks[rand(0, 3)]);

        $sql = "INSERT INTO Record_App.transaction(datelog, documentcode, action, office_id, employee_id, remarks) VALUES ('$datelog','$documentcode','$action','$office_id','$employee_id','$remarks')";
        mysqli_query($conn, $sql);
    }   
?>