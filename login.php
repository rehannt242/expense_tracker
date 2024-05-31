<?php

function user_login($email,$password,$conn):string {

$query = "SELECT * FROM user WHERE email = '$email'";

$result = $conn->query($query); 

if ($result->num_rows > 0)  
{ 

    $row = $result->fetch_assoc(); 
    $hash = $row["user_password"]; 
    $verify = password_verify($password, $hash); 
    if ($verify) { 
        echo 'Password Verified!';
        echo"\n Welcome:"." ".$row["user_name"];
        return $row["user_id"];
    } else { 
        echo 'Incorrect Password!';
        exit();
    } 
}  
else { 
    echo "Incorrect email or password!!"; 
    exit();
} 
}
