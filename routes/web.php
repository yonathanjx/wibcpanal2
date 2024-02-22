<?php

use Illuminate\Support\Facades\Route;
// Tried fixing issue from "https://stackoverflow.com/questions/67150072/laravel-error-controller-not-found-but-it-is-there" 
// as the contoller example on the book was not working
use App\Http\Controllers\TasksControllerTry2;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Web Routes made by Yonathan on Fri 5 Jan 6:04 AM
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Web Routes made by Yonathan on Thu 11 Jan 5:14 AM

// Redid this example on Mon 29 jan 1:20 AM
// Example 3-1 Basic route defination

Route::get('/ex1', function(){
    return 'Hello, World';
});

// Example 3-5. Route parameters
// This workes but using return to echo out is better as is explained why in the next example

Route::get('/whatsupbro', function(){
    echo "WHAT'S UP";
});

// Using return makes it so that it uses wrappers around Laravel’s request and response cycle,
// including something called middleware. When your route closure or controller method is done,
// it’s not time to send the output to the browser yet; returning the content allows it to
// continue flowing through the response stack and the middleware before it is returned back to the user. 

Route::get('/whatsupbro/{id}', function($id){
    return $id;
});

// Returning a view

Route::get('/bladeview', function(){
    return view('Chapter4blade');
});

// Using parameters

Route::get('/parameter/{id}', function($id){
    return "$id";
});

// Example 3-6 Optional route parameter

Route::get('/users/{id?}', function($id = 'fallbackid'){
    return "$id";
});

// Example 3-7 Regular expressions route constraints


// Example 3-8. The url() helper intended to be used in views used here litrally
Route::get('/3-8', function(){
   return url('/');
});

// Example 3-9. Defining route names
// Defining a route with name() in routes/web.php:
// You can name your route anything you’d like, but the common convention 
// is to use the plural of the resource name, then a period, then the action.

//Route::get('members/{id}', 'MembersController@show')->name('members.show'); 

// Linking the route in a view using the route() helper:
/*   <a href="<?php echo route('members.show', ['id' => 14]); ?>">     */

// This example also introduced the route() helper. Just like url(), 
// it’s intended to be used in views to simplify linking to a named route.
// Let’s imagine a route defined as users/userId/comments/commentId.

// Option 1:
// route('users.comments.show', [1, 2]) 
// http://myapp.com/users/1/comments/2

// Option 2:
// route('users.comments.show', ['userId' => 1, 'commentId' => 2]) 
// http://myapp.com/users/1/comments/2

// Option 3:
// route('users.comments.show', ['commentId' => 2, 'userId' => 1]) 
// http://myapp.com/users/1/comments/2

// Option 4:
// route('users.comments.show', ['userId' => 1, 'commentId' => 2, 'opt' => 'a']) 
// http://myapp.com/users/1/comments/2?opt=a

// As you can see, nonkeyed array values are assigned in order; 
// keyed array values are matched with the route parameters matching
// their keys, and anything left over is added as a query parameter.

// Example 3-9
// Defining route names 
// Defining routes with name() in web.php

//Route::get('members/{id}', 'MembersController@show')->name('members.show');

// Linking the route in a view using the route() helper: to receive a route string (http://myapp.com/members)
/*     <a href="<?php echo route('members.show', ['id' => 14]); ?>">     */

// Example 3-10. Defining a route group
// By default, a route group doesn’t actually do anything. There’s no difference
// between using the group in Example 3-10 and separating a segment of your routes with code comments.

/*
Route::group(function () { 
    Route::get('hello', function () {
        return 'Hello'; });
    Route::get('world', function () { 
        return 'World';
    }); 
});


*/
// Example 3-11. Restricting a group of routes to logged-in users only

Route::middleware('auth')->group(function() { 
    Route::get('dashboard', function () {
       return view('dashboard'); });
    Route::get('account', function () { 
       return view('account');
    }); 
});

// Here’s Example 3-11 in Laravel 5.3 and prior: 
// Used by creative tim soft ui dashboard

Route::group(['middleware' => 'auth'], function () { 
    Route::get('dashboard', function () {
       return view('dashboard'); });
    Route::get('account', function () { 
       return view('account');
    }); 
});

// Example 3-12. Applying the rate limiting middleware to a route

Route::middleware('auth:api', 'throttle:60,1')->group(function () { 
    Route::get('/profile', function () {
    //
    }); 
});

// Example 3-13. Prefixing a group of routes

Route::prefix('dashboard')->group(function () { 
    Route::get('/', function () {
    // Handles the path /dashboard
    });
    Route::get('users', function () {
    // Handles the path /dashboard/users
    }); 
});


// Fallback routes
// In Laravel prior to 5.6, you could define a “fallback route”
// (which you need to define at the end of your routes file) to catch all unmatched paths:

/*
Route::any('{anything}', 'CatchAllController')->where('anything', '*');

*/
// In Laravel 5.6+, you can use the Route::fallback() method instead:


Route::fallback(function () {
     echo 'Subdirectory not found'; // Works after commenting out the above explanation.
});


//  Example 3-14. Subdomain routing -- Error
Route::domain('api.woodmarkethiopia.com/Android/wibcpanal')->group(function () { 
    Route::get('/', function () {
      echo 'I guess this is my first Subdomain';
    }); 
});

// Example 3-14. Subdomain routing

// Second, you might want to set part of the subdomain as a parameter, 
// as illustrated in Example 3-15. This is most often done in cases of multitenancy
// (think Slack or Har‐ vest, where each company gets its own subdomain, like tighten.slack.co).

// Example 3-15. Parameterized subdomain routing
// Note that any parameters for the group get passed into the grouped routes’ 
// methods as the first parameter(s).

Route::domain('{account}.myapp.com')->group(function () { 
    Route::get('/', function ($account) {
      //
    });
    Route::get('users/{id}', function ($account, $id) {
      //
    }); 
});



// Stopped at page 38

Route::get('/blade', function(){
      return view('Bladesamples', ['name' => 'Samantha']);
});


// Signing a Route page 39

  //Route::get('invitations/{invitation}/{answer}', 'InvitationController')
  //->name('invitations');

  //Generate normal link
  //URL::route('invitations', ['invitation'=> 12345, 'answer' => 'yes']);

  //Generate a signed link
  //URL::signedroute('invitations', ['invitation'=> 12345, 'answers'=> 'yes']);

  //Generate a temporary link
  //URl::temporarySignedRoute(
  //     'invtations',
  //     now()-addHours(4),
  //     ['invitation' => 12345, 'answers' => 'yes']
  //);


  // Page 41 
// Example 3-18

Route::get('/home', function(){
    return view('welcome');
});







// Page 41 
// Example 3-19

Route::get('tasks1', function(){
    return view ('tasks.index')
         ->with('tasks', Task::all());
});




// Page 42
// Example 3-20
Route::view('/homeview', 'welcome');


// Page 42
// Example 3-20
Route::view('/homeview', 'welcome', ['User' => 'Yonathan']);

//Page 43 
// Example 3-23

// Laravel 10 format [BabyAccountController::class, 'signin']
// Spent more than three hours trying to make this example work and finally it did 
// with the link above on  the use commands comments link above

Route::get('/controller', [TasksControllerTry2::class, 'index']);

// Page 44 Thu 1 Feb 1:30 AM
// Example 3-24
// Common controller method example



// Page 46 Fri 2 Feb 3:06 AM
// Dont understand this yet will come back later
Route::get('tasks/create', 'TasksController@create');
 Route::post('tasks', 'TasksController@store');


 // Example 3-28. Resource controller binding
 // routes/web.php
 Route::resource('tasks', 'TasksController');

 // Example 3-29 API resoutce controller binding

 Route::apiResource('tasks', 'TasksController');

 // Example 3-30 Using the __invoke() method

 Route::post('users/{user}/update-avatar', 'UpdateUserAvatar');



 Route::get('/dashboard', function () {
    return view('dashboard');
});

