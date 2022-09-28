# Introduction
In this chapter, let's create the destroy method as Delete processing.
These are implemented for the purpose of single resource deletion.

# Implementation of Routing
Following Restfull design, we define routing.
```
Route::put('tasks/{task}', [\App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');
```

# Implementation of Controller
## destroy
The description method here is basically the same process as the update and patch above.
Deletion can be done with the `delete()` method.

Let's implement it by ourselves.
If it doesn't work, check the src example implementation.

# implementation of view
The following will apply.
Let's modify the form part and execute the `destroy` process.
``` 
<form>
    @csrf
    @method('DELETE')
    <span class="icon">
        <button type="submit" class="has-text-link is-clickable"
                style="background: none; border: unset">
            <i class="fa-solid fa-trash"></i>
        </button>
    </span>
</form>
```

# Final touches
This completes the implementation of the delete method.
After confirming that the deletion process is working properly, we will do the final touches.

When describing the routing, this time we configured the routing individually, but it is possible to define all the routing together, which is based on the restfull design.  
You can remove all routes except complete and yet_complete and use the following instead.
```
Route::resource('tasks', \AppViewHttpControllers\TaskController::class);
```

Also, starting with Laravel 9.x, it is possible to organize the routing on a per-Controller basis.  
The following eliminates the need to list the Controller name each time.  
Also, by specifying prefix and as, the common part of `path` and `name` can be shortened.  
``` 
Route::controller(\App\HttpControllers\TaskController::class)
    ->prefix('tasks/{task}')
    ->as('tasks.')
    ->group(function () {
        Route::patch('complete', 'complete')->name('complete');
        Route::patch('yet_complete', 'yetComplete')->name('yet_complete');
    });
```

After making this change, please try the whole operation and make sure it works without any problems.  

# Conclusion
How was it?  
I am sure there are still some things you are not comfortable with in Laravel, but with this implementation, you should now be able to implement basic CRUD processing!  
If there are parts you don't understand, please repeat the challenge to deepen your understanding.  

In the next assignment, we would like to help you understand the API implementation and the slightly more complex relationship relationships in the model.  
Please take a look at the challenge to deepen your understanding.  
