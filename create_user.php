<?php


require './connection.php';

echo"\n";

$user_name = readline("Enter Name of the User:");

$email = readline("Enter your Email:");

$password = readline("Enter your password:");

$confirm_password = readline("Confirm your password:");

if( $password == $confirm_password ){

  $hash = password_hash($password, PASSWORD_DEFAULT); 

$sql = "INSERT INTO user(user_name,user_password,email)VALUES('$user_name','$hash','$email')";

if ($conn->query($sql) === TRUE) {

    echo "User created successfully";

  } else {
    echo "Error creating user!!: " . $conn->error;
  }

}

else{

  echo"\n";

  echo "Your passwords doesn't match,please try again";
}




