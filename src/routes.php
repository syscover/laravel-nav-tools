<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Example group routes with lang or locale properties
|
*/

Route::group(['middleware' => ['auth.pulsar','permission.pulsar']], function() {

});