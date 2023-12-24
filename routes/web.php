<?php
// This page: Contains routes for handling web-based interactions, often associated with HTML views.

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Define routes for basic CRUD operations

// Redirect root URL to tasks index
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// Display a paginated list of tasks
Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate(7)
    ]);
})->name('tasks.index');

// Display the task creation form
Route::view('/tasks/create', 'create')
    ->name('tasks.create');

// Display the task edit form
Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task // Using OrFails for a 404 page if there's an error in the URL
    ]);                                     
})->name('tasks.edit');

// POST METHOD and save into database.
// when use validate method it will use all the data that was sent through form
// Display the details of a specific task
Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
        'task' => $task
    ]);                                    
})->name('tasks.show');

// Add a new task to the database
Route::post('/tasks', function (TaskRequest $request){
    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfully!');
})->name('tasks.store');

// Update an existing task in the database
Route::put('/tasks/{task}', function (Task $task, TaskRequest $request){
    $task->update($request->validated());
 
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully!');
})->name('tasks.update');

// Delete a task from the database
Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('tasks.index');
})->name('tasks.destroy');

// Toggle the completion status of a task
Route::put('tasks/{task}/toggle-complete', function (Task $task) {
    $task->toggleComplete();

    return redirect()->back()->with('success', 'Task updated successfully!');
})->name('tasks.toggle-complete');

// Handle fallback routes for other URLs
Route::fallback(function() {
    return 'Still got somewhere!';
});

/* Add other routes */  
//Route::get('/hello', function (){  /* /hello is another page */ 
//    return  'hello';     /* return hello is the text on the page */ 
//})->name('hello');

// Routing for redirect routes
//Route::get('/xxx', function () {
//    return redirect()->route('hello');
//});

/* Link to a specific page using a function name (Using link address)(Dynamic) */
// Route::get('/greet/{name}', function ($name) {
//    return 'Hello ' . $name . '!';
//});

?>