# blogone

Hello guys, I am trying made a small demo related to Database Transactions ( https://laravel.com/docs/8.x/database#manually-using-transactions) 

What is  Database Transactions : 
    
    if an exception is thrown within the transaction, transaction will automatically be rolled back. If the query executes successfully, the transaction will automatically be committed. You don't need to worry about manually rolling back or committing while using the transaction method:

    If you would like to begin a transaction manually and have complete control over rollbacks and commits,
    you may use the beginTransaction method provided by the DB facade:


Steps :

(1) After clone repo from GIT, you have to configured a database. In your database please creare a database as "db_trans_demo"

(2) After database creation run below commands.
   -- composer update
   -- php artisan : migrate


You will see the effect in dummies table

--> you have to hit the URL with same data
    -- http://127.0.0.1:8000/add_records?accountname=chetan&username=chetanpatel&email=chetan.patel@gmail.com
       output : success 
--> hit url with same data you will face a exception
    -- http://127.0.0.1:8000/add_records?accountname=chetan&username=chetanpatel&email=chetan.patel@gmail.com
       output : fail
--> hit url with different data
    -- http://127.0.0.1:8000/add_records?accountname=chetan&username=chetanpatel&email=chetan132.patel@gmail.com
    -- output : success

for the output please find screenshot in folder  explanation (step_3.png)
  
   


         