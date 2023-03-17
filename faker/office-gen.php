<?php
    require ('vendor/autoload.php');

    $faker = Faker\Factory::create();
    $conn = mysqli_connect("localhost","root","","Record_App");

    if(!$conn)
    {   
    die(mysqli_error());
    }  
     
    for ($i = 1; $i <= 200; $i++) {
        $companyname = mysqli_real_escape_string($conn, $faker->company);
        $contactnum = mysqli_real_escape_string($conn, $faker->phoneNumber);
        $email = mysqli_real_escape_string($conn, $faker->email);
        $address = mysqli_real_escape_string($conn, $faker->optional($weight=.9, $default='')->streetAddress);
        $city = mysqli_real_escape_string($conn, $faker->optional($weight=.9, $default='')->city);
        $country = mysqli_real_escape_string($conn, $faker->optional($weight=.9, $default='')->country);
        $postal = mysqli_real_escape_string($conn, $faker->postcode);
        
        $sql = "INSERT INTO Record_App.office(name, contactnum, email, address, city, country, postal) VALUES ('$companyname','$contactnum','$email','$address','$city', '$country', '$postal')";
        mysqli_query($conn, $sql);
    }
?>