<?php

function transaction($user_id,$trans_type_id,$amount,$desc,$conn,$transaction_type){

  $date = date('Y-m-d H:i:s');

  $sql = "select balance from transactions where user_id = '$user_id' ORDER BY transaction_id  DESC ";



  $result = $conn->query($sql); 

  $row = $result->fetch_assoc(); 
  $balance =  $row["balance"]; 

  ($transaction_type == "income") ? $balance = $balance + $amount : $balance = $balance - $amount;
    
      $query = "INSERT INTO transactions(user_id,transaction_type_id,date_time,amount,descr,balance)VALUES('$user_id','$trans_type_id','$date','$amount','$desc','$balance')"; 
  
        if ($conn->query($query ) === TRUE) {
  
            echo "Transaction Inserted Successfully";
      
      } 
        else {
          
            echo "Error Inserting Transaction!!: " . $conn->error;
      }


}
