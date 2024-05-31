<?php

function insight($conn,$user_id){

    $query = "select * from transactions where user_id = '$user_id'";
    $result = $conn->query($query);

$highest_transaction = 0;
$total_expense = 0;
$total_income = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Calculate highest transaction
        if ($row['amount'] > $highest_transaction) {
            $highest_transaction = $row['amount'];
        }
    }
}

$sql = "select sum(amount) from transactions where user_id='$user_id' and transaction_type_id = 0";
$result = $conn->query($sql);
if ($result)  {

    $row = $result->fetch_assoc(); 
    $total_expense = $row["sum(amount)"]; 
  }

  else {
    echo "No results"; 

  }

  $sql = "select sum(amount) from transactions where user_id='$user_id' and transaction_type_id = 1";
$result = $conn->query($sql);
if ($result)  {

    $row = $result->fetch_assoc(); 
    $total_income =$row["sum(amount)"]; 
  }

  else {
    echo "No results"; 

  }



echo "Highest Transaction: $highest_transaction\n";
echo "Total Expense This Month: $total_expense\n";
echo "Total Income This Month: $total_income\n";
}