<?php

function set_transaction_type($transaction_type,$conn){

if($transaction_type == "expense" || $transaction_type == "income"){

  $query = " SELECT * FROM transaction_types WHERE transaction_type = '$transaction_type'";
    
  $result = $conn->query($query); 

  if ($result->num_rows > 0)  {

    $row = $result->fetch_assoc(); 
    return $row["transaction_type_id"]; 
  }

  else {
    echo "No results"; 
    exit();
  }



}
else{
  echo "Your entry should be either 'income' or 'expense'";

}
    

    
}