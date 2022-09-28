# Create tables in the DB
Migration is like database versioning, allowing the team to define and share the database schema for the application. 
https://readouble.com/laravel/9.x/ja/migrations.html

# Create a migration file
Start Sail and create a Migration File.  
Add the tasks table according to the ER diagram.  
![er](./images/er.png)  
In Laravel, various processes can be executed using the artisan command. 
In this case, let's look at adding a migration file using the make command.
```
./vendor/bin/sail exec laravel.test php artisan make:migration create_tasks_table
```

../database/migrations and the Tasks table is added to the database. 
By naming the file create_xxxx_table, a new Migration file for the xxxx table will be created.

# Edit the migration file
Add items to the file you just created.
Since id, created_at, and updated_at are added automatically, let's add the remaining items.

- title: varchar(255)
- description: varchar(1024)
- is_completed: tinyint(1)

First, open the created migration file.
./database/migrations and open the file.

The `title` and `description` are string types, so use the string method. 
Add the following line under the `id` column.
The first argument is the column name and the second argument is the number of characters.The default is `255`, so specify only `description`! 
```
$table->string('title');
$table->string('description', 1024);
```

Next, add is_completed. 
This should be `boolean` to represent a state.
```
$table->boolean('is_completed')->default(0);
```

An example creation is ./src/migrations/2022_09_17_073056_create_tasks_table.php. 
If you have trouble creating it, please read and see it for reference. 


# Execute migration
The added Migration will be executed by the following command. 
Let's try to run it and see if it creates correctly. 
```
./vendor/bin/sail exec laravel.test php artisan migrate
```
![Migration result](./images/migration-success.png)

# Check with mysql
Let's go into the mysql Docker container and check if the table has been added.
```
./vendor/bin/sail exec mysql sh
```
After executing the above, you will have access to the `mysql` container. 

From here, let's run the mysql command.
For authentication information, check the following in your `.env` file.
- DB_DATABASE
- DB_USERNAME
- DB_PASSWORD
```
mysql -u ${username} -p
```

![mysql startup](./images/mysql-exec.png)
If successful, you will see ``mysql>`` as shown in the figure. 
Let's quickly check the tables we added. 

```
show columns from ${DB name}.tasks;
```

![check tasks](./images/migrate-check.png)  
If the columns are added as shown in the figure, it is successful. 

Let's also check the migration execution result log together. 
Migration stores the name of the executable in the table. 
```
select * from ${DB name}.migrations;
```
![migration confirmation](./images/migration-logs.png)  
It is also possible to modify this table to create a state where no migrations are performed. 
This is a destructive operation.Please be careful when performing this operation. 

# Conclusion
This is the end of migration creation. 
Next, let's move on to the creation of Model (Eloquent). 


Translated with www.DeepL.com/Translator (free version)