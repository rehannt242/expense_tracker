/* To create a database schema for expense_tracker */

CREATE DATABASE expense_tracker;

/* To select the created database */

USE expense_tracker;

/* To create a user table with user_id as uuid */

CREATE TABLE user(user_id VARCHAR(36) DEFAULT (UUID()) PRIMARY KEY,user_name varchar(100),user_password varchar(100));

/* To Create a Transaction Type Table*/

CREATE TABLE transaction_type(transaction_type_id int AUTO_INCREMENT PRIMARY KEY,transaction_type varchar(7) NOT NULL);

/*To add constraint such that for transaction_type only two value is permitted either INCOME or EXPENSE*/

ALTER TABLE transaction_type  ADD CONSTRAINT transaction_type_constraint CHECK (transaction_type  = 'income' OR transaction_type = 'expense');

/*To create a Transaction Table*/

CREATE TABLE transactions (
    transaction_id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_id varchar(36) REFERENCES user(user_id),
    transaction_type_id int REFERENCES transaction_types(transaction_type_id),
    date_time datetime,
    amount decimal(7, 2),
    description varchar(300),
    balance decimal(7, 2)
);
