# Introduction
Laravel includes Eloquent, an object-relational mapper (ORM) that makes interacting with databases fun. 
When using Eloquent, each database table has a corresponding "model" that is used to interact with that table. 
The Eloquent model allows you to not only retrieve records from a database table, but also insert, update, and delete records from the table. 
https://readouble.com/laravel/9.x/ja/eloquent.html

# Create Model
Let's create a Task Model for the tasks table we just created. 
Eloquent Model represents a single record of the table, so let's name it singular.

``` 
./vendor/bin/sail exec laravel.test php artisan make:model Task
```

Check /app/Models/ 
If it is successfully created, the Task Model has been created. 

# Edit Model
In this case, there is not much to set up since only one table will be created. 
This time, let's set `$fillable`. 
The column name set to this will be changeable. 
In other words, columns that are not listed cannot be changed. 
If the value is not set when creating or updating, check this first. 

Set this as a Model property. 
Only the DB items that you have added yourself can be changed. 
```
protected $fillable = [
    'title',
    'description',
    'is_complete',
];
```
For complete configuration, see ./src/app/Models/Task.php for the complete configuration.

You can also specify only the columns to be protected by setting `$guarded`. 
Please use that depending on your project and development team rules. 


# Conclusion
Model creation is now complete. 
Next, let's create a Create function to actually register values to the Model. 
