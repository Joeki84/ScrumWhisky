<?php

use scrum\ScotchLodge\Controllers\ProfileController;

$app->get('/logon', function() use ($em, $app) {
  $contr = new ProfileController($em, $app);
  $globals = $contr->getGlobals();
  $app->render('Profile\logon.html.twig', array('globals' => $globals));
})->name('user_logon');

$app->post('/logon', function() use ($em, $app) {
  $contr = new ProfileController($em, $app);
  $contr->verifyUserCredentials();  
})->name('user_logon_process');

$app->get('/logout', function() use ($em, $app){
  $contr = new ProfileController($em, $app);
  $contr->logOff();
  $globals = $contr->getGlobals();
  $app->render('homepage.html.twig', array('globals' => $globals));
})->name('user_logoff');

$app->get('/profile', function() use ($em, $app){
  $contr = new ProfileController($em, $app);
  $contr->showProfile();
})->name('profile_show');

$app->post('/profile/edit', function() use ($em, $app) {
  $contr = new ProfileController($em, $app);
  $contr->editProfile();
})->name('profile_edit');

$app->post('/profile/store', function() use ($em, $app){
  $contr = new ProfileController($em, $app);
  $contr->storeChanges();
})->name('profile_edit_save');

$app->get('/password/reset', function() use ($em, $app) {
  $contr = new ProfileController($em, $app);
  $contr->passwordResetRequest();  
})->name('password_reset_request');

$app->post('/password/reset', function() use ($em, $app) {
  $contr = new ProfileController($em, $app);
  $contr->passwordResetProcess();
});

