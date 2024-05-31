<?php

function recent_transactions($user_id,$conn){

    $query = "SELECT t.date_time,tt.transaction_type,t.amount,t.descr,t.balance FROM transactions t join transaction_types tt on t.transaction_type_id = tt.transaction_type_id WHERE user_id = '$user_id'";

    $result = $conn->query($query); 

    if ($result->num_rows > 0)  
    { 

        echo"\n";

        printf("%-7s | %-19s | %-16s | %-9s | %-20s | %-10s\n", "Index", "Date and Time", "Transaction Type", "Amount", "Description", "Balance");

        $index = 1; 

        while($row = $result->fetch_assoc()) {   
    
            printf("%-7d | %-19s | %-16s | %-9s | %-20s | %-14s\n", 
            $index++, 
            $row["date_time"], 
            $row["transaction_type"], 
            $row["amount"], 
            $row["descr"], 
            $row["balance"]); 
        } 
    }

    else { 
    
        echo "0 results"; 
    } 

}