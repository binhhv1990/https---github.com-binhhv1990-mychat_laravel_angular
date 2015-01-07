<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', function()						
{
  // Returning a string from a route will display the content of the string 
  // in the browser when this route is reached
 return View::make('home');			
});

Route::get('services', function()
{
  $services = Service::all();				
  // Pass the variable containing the services to the 
  // “services.blade.php” view template		
  return View::make('services', array( 'services' => $services));	
});

Route::get('contact', function()
{
  return View::make('contact');		
});
Route::post('contact', function()						
{
   $input = Input::all();							
  
  // Create an array of validation rules for the input fields
  $rules = array(								
    'subject' => 'required',
    'message' => 'required'
  );
  
  // Apply the validation rules to the input
  $validator = Validator::make($input, $rules);				
  
  // Go back to the contact route preserving the user’s input in case of 
  // failed validation
  if($validator->fails()) {							
	   return Redirect::to('contact')->withErrors($validator)->withInput();
  }
   $to = 'Site admin <hvbinh1990@gmail.com>';
  $subject = 'Contact Request';

  $emailContent = '
  <!DOCTYPE html>
  <html lang="en-US">
    <head>
    <meta charset="utf-8">
    </head>
    <body>
    <h2>Contact request</h2>
    <div>Somebody sent a contact request, details:</div>

    <div>Subject: '.$input['subject'].'</div>          
    <div>Message: '.$input['message'].'</div>
    </body>
  </html>';

  $headers  = 'MIME-Version: 1.0' . "rn";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "rn";
  $headers .= 'To: '.$to."rn";
  $headers .= 'From: '.$to."rn";

  mail($to, $subject, $emailContent, $headers);

  return 'Message sent';					
});				
