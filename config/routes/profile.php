<?php

use scrum\ScotchLodge\Controllers\ProfileController;

$app->get('/aanmelden', function() use ($em, $app) {
  $contr = new ProfileController($em, $app);
  $globals = $contr->getGlobals();
  $app->render('Profile\logon.html.twig', array('globals' => $globals));
})->name('user_logon');

$app->post('/aanmelden', function() use ($em, $app) {
  $contr = new ProfileController($em, $app);
  $contr->verifyUserCredentials();
})->name('user_logon_process');

$app->get('/afmelden', function() use ($em, $app){
  $contr = new ProfileController($em, $app);
  $contr->logOff();
  $globals = $contr->getGlobals();
  $app->render('homepage.html.twig', array('globals' => $globals));
})->name('user_logoff');

$app->get('/profiel', function() use ($em, $app){
  $contr = new ProfileController($em, $app);
  $contr->showProfile();
})->name('profile_show');

$app->post('/profiel/wijzig', function() use ($em, $app) {
  $contr = new ProfileController($em, $app);
  $contr->editProfile();
})->name('profile_edit');

$app->post('/profiel/bewaar', function() use ($em, $app){
  $contr = new ProfileController($em, $app);
  $contr->storeChanges();
})->name('profile_edit_save');