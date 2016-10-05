<?php


Route::post('/crud/uploadimage','CrudController@uploadimage');
Route::post('/crud/delete','CrudController@delete');
Route::post('/crud/checkemail', 'CrudController@checkemail');
Route::post('/crud/show','CrudController@show');

Route::group(['middleware' => ['web']], function () {


Route::get('/login','CrudController@loginform');
Route::get('/crud/add','CrudController@addform');
Route::post('/crud/addnow','CrudController@addnow');
Route::get('/crud/edit/{name}','CrudController@edit');
Route::post('/crud/update','CrudController@update');

Route::get('/crud/signup', 'CrudController@loginform');
Route::get('/crud/login', 'CrudController@loginform');
Route::post('/crud/logintest', 'CrudController@authenticate');
Route::post('/crud/register', 'CrudController@register');
Route::get('/crud/forgot', 'CrudController@forgot');
Route::get('/crud/logout', 'CrudController@logout');
Route::post('/crud/token', 'CrudController@token');
Route::post('/crud/change', 'CrudController@change');

Route::get('/crud/reset/{username}/{token}', 'CrudController@reset');
Route::get('/crud/verify/{username}/{token}', 'CrudController@verify');

	Route::group(['middleware' => ['auth']], function () {
		Route::get('/crud','CrudController@index');
		Route::get('/home','CrudController@index');
		Route::get('/','CrudController@index');
});

});

// Route::group(['middleware' => ['web']], function () {

// Route::get('/login', 'Auth\AuthController@getLogin');
// Route::get('auth/login', 'Auth\AuthController@getLogin');
// Route::post('auth/login', 'Auth\AuthController@postLogin');
// Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Route::get('auth/register', 'Auth\AuthController@getRegister');
// Route::post('auth/register', 'Auth\AuthController@postRegister');

// Route::get('auth/password/email', 'Auth\PasswordController@getEmail');
// Route::post('auth/password/email', 'Auth\PasswordController@postEmail');

// Route::get('auth/password/reset/{token}', 'Auth\PasswordController@getReset');
// Route::post('auth/password/reset', 'Auth\PasswordController@postReset');
// });


// Route::group(['middleware' => ['web']], function () {
	
// Route::get('/telephone','telephonecontroller@index');
// Route::get('/telephone/addview','telephonecontroller@addview');
// Route::post('/telephone/add','telephonecontroller@addnow');
// Route::post('/telephone/search','telephonecontroller@search');
// Route::get('/telephone/delete/{id}','telephonecontroller@delete');
// Route::get('/telephone/show/{id}','telephonecontroller@show');
// Route::get('/telephone/edit/{id}','telephonecontroller@edit');
// Route::post('/telephone/update/{id}','telephonecontroller@update');



// });

// Route::group(['middleware' => ['web']], function () {
// Route::get('/review','reviewcontroller@index');
// Route::post('/review/now/add/{id}','reviewcontroller@nowadd');

// Route::post('/review/now','reviewcontroller@now');
// });

// Route::group(['middleware' => ['web']], function () {
// Route::get('/bet','betcontroller@index');
// Route::post('/bet/now','betcontroller@now');
// });

// Route::group(['middleware' => ['web']], function () { 
// Route::get('/bus','buscontroller@index');
// Route::post('/bus/book','buscontroller@book');

// });

// Route::group(['middleware' => ['web']], function () { 
// Route::get('/quiz', 'playquiz@index');
// Route::get('/quiz/create', 'playquiz@create');
// Route::post('/quiz/store', 'playquiz@store');
// Route::post('/quiz/check/{name}/{no}', 'playquiz@check');
// Route::get('/quiz/category/{name}', 'playquiz@category');
// Route::get('/quiz/signup', 'playquiz@loginform');
// Route::get('/quiz/login', 'playquiz@loginform');
// Route::post('/quiz/register', 'playquiz@register');
// Route::post('/quiz/logintest', 'playquiz@authenticate');
// Route::get('/quiz/logout', 'playquiz@logout');
// Route::get('/quiz/contact', 'playquiz@contact');
// Route::post('/quiz/contactprocess', 'playquiz@contactprocess');
// Route::get('/quiz/umust', 'playquiz@umust');
// Route::get('/quiz/home', ['middleware' => 'auth', 
// 			  'uses'=>'playquiz@home']);
// });



//Route::resource('users', 'UserController');
//Route::group(['middleware' => ['web']], function () { 
//	Route::resource('users', 'UserController');
//});




//Route::get('/hello/{name}', 'hello@show');

//Route::get('blade', function () {
//      return view('page',array('name' => 'The Raven','day' => 'Friday','phone'=>'9841176766'));
//});


//Route::get('/','Front@index');
//Route::get('/products','Front@products');
//Route::get('/products/details/{id}','Front@product_details');
//Route::get('/products/categories','Front@product_categories');
//Route::get('/products/brands','Front@product_brands');
//Route::get('/blog','Front@blog');
//Route::get('/blog/post/{id}','Front@blog_post');
//Route::get('/contact-us','Front@contact_us');
//Route::get('/login','Front@login');
//Route::get('/logout','Front@logout');
//Route::get('/checkout','Front@checkout');
//Route::get('/search/{query}','Front@search');
//Route::post('/cart', 'Front@cart');