<?php

use scrum\ScotchLodge\Controllers\ProfileController;

$contr = new ProfileController($em, $app);

$app->get('/logon', function() use ($contr) {
  
  $contr->logon();
})->name('user_logon');

$app->post('/logon', function() use ($contr) {
  $contr->verifyUserCredentials();  
})->name('user_logon_process');

$app->get('/logout', function() use ($contr){
  $contr->logOff();
})->name('user_logoff');


$app->get('/profile', function() use ($contr){
  $contr->showProfile();
})->name('profile_show');

$app->post('/profile/edit', function() use ($contr) {
  $contr->editProfile();
})->name('profile_edit');

/* olivier */
$app->get('/editadmin/:username', function($username) use ($contr) {
  $contr->editProfileAdmin($username);
})->name('profile_editadmin');


/*olivier */



$app->post('/profile/store', function() use ($contr){
  $contr->storeChanges();
})->name('profile_edit_save');


$app->get('/password/reset', function() use ($contr) {
  $contr->passwordResetRequest();  
})->name('password_reset_request');

$app->post('/password/reset', function() use ($contr) {
  $contr->passwordResetProcess();
})->name('password_reset_process');

$app->get('/verify/:id', function($id) use ($contr) {
  $contr->processToken($id);
})->name('token_verify');

$app->post('/password/store', function() use ($contr) {  
  $contr->processNewPassword();
})->name('verify_new_password');
