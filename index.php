<?php
require './connection.php';
require './login.php';
require './transaction_type.php';
require './transaction.php';
require './view_transaction.php';
require './delete_transaction.php';
require './insight.php';

function displayMenu() {
    echo"\n";
    echo "Expense Tracker Menu:\n";
    echo "1. Add Expense\n";
    echo "2. View Expenses\n";
    echo "3. Delete Expense\n";
    echo "4. Insight\n";
    echo "5. Exit\n";
}

echo"\n";

$email = readline("Enter Your Email:");

$password = readline("Enter your password:");

$user_id = user_login($email, $password,$conn);


if ($user_id) {

    $choice = -1;

    while (true) {

        displayMenu();
    
        $choice = readline("Enter Your Choice:");
        
        switch ($choice) {
            case 1:
                $transaction_type = readline("Enter Your Transaction Type:");
                $trans_type_id = set_transaction_type($transaction_type,$conn);
                $amount = readline("Enter Your Amount:");
                $desc = readline("Provide Description:");
                transaction($user_id,$trans_type_id,$amount,$desc,$conn,$transaction_type);
                
                break;
            case 2:

                recent_transactions($user_id,$conn);
                
                break;
            case 3:

                $res = readline("Do you want to DELETE the recent transaction:");

                if($res == "yes"){
                    delete_transaction($conn,$user_id);
                }

                break;
            case 4:
                
                    insight($conn,$user_id);

                    break;

            case 5:
                echo "Exiting...";

                exit();

            default:
                echo "Invalid choice. Please try again.\n";
        }
    }
    


} 
else {

    echo "No user Found";
    exit();

}








