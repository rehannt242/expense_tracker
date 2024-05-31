<?php

function delete_transaction($conn,$user_id){
    $query = "DELETE FROM transactions WHERE user_id = '$user_id' AND date_time =
    (SELECT max_date_time FROM (SELECT MAX(date_time) AS max_date_time FROM transactions WHERE user_id = '$user_id') AS subquery)";

if ($conn->query($query ) === TRUE) {
  
    echo "Recent Transaction Successfully";

} 
else {
  
    echo "Error Deleting Recent Transaction!!: " . $conn->error;
}
    
}