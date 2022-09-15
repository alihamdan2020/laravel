<?php

use Illuminate\Support\Facades\Route;
//this 'use' below is written by me to use the controller that i make
use App\Http\Controllers\staticController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* when i have this route(/) return the view below (in this case view is a page) */
/* note that the welvome below mean page named 'welcome' exist in views folder under resources*/ 

Route::get('/',function(){
    return view ("welcome");
})->name('home');
/*->name('name') is just to give the Route a name,use this name in url path in a href, show layout view to
understand */

Route::get('/contact',function(){
    return view ("contact");
})->name('contact');

//Route::get('/',[staticController::class,'index'] );
/*example above i open the view welcome but in using controller that i named staticcontroller*/
/* another example to set a path, if i wrote /about, server should send me to page 'about'*/
/*note that no folder named about exist, just as fake path*/
Route::get('/about',[staticController::class,'about'] )->name('about');



/* another example to set a path, if i wrote /products, server should send me to products*/
/*note that no folder named products exist, just as fake path and no need to create page products*/
/*to test code below,in your browser address bar, write /products?myfilter=men*/ 
/*name of filter is up to uou */

Route::get('/products', function () {
    $filter=request("myfilter");
    if(isset($filter))
    return "<H1>You are showing ".strip_tags($filter)." products</h1>";
/*strip_tags an php function used for security to ignore any java script injection*/
    return "<H1>You are showing all products</h1>";
});

/*in this example, i toward through category (if exisit) and item in specific category (if exisit) */
/*null used if you want to display all your store with no epecific category, so no need to parameter vat or item */
/*or you want to display your category (men) for example with no epecific items */

Route::get('/store/{category?}/{item?}', function ($cat=null,$itm=null) {
    if(isset($cat)){
        if(isset($itm))
/*to test code below,in your browser address bar, write /store/men/tshits return the h1 below, display all data of category men with specific item tshirt*/        
        return "<H1>You are showing all ". $itm." for this category = ".$cat."</h1>";    
        /*return "<H1>You are showing all {$itm} for this category = {$cat}</h1>";*/
        /*syntax above instead of conquatenation*/
/*to test code below,in your browser address bar, write /store/men return the h1 below, display all data of category men */        
        return "<H1>You are showing all this category = ".$cat."</h1>";    
    }
/*to test code below,in your browser address bar, write /store return the h1 below */
    return "<H1>You are showing all products in my store</h1>";
});