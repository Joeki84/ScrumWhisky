<?php

use scrum\ScotchLodge\Controllers\ProfileController;


$app->get('/aanmelden', function() use ($em, $app) {
  $contr = new ProfileController($em, $app);
  $globals = $contr->getGlobals();
  $app->render('Profile\logon.html.twig', array('globals' => $globals));
})->name('user_logon');

$app->post('/aanmelden', function() use ($app, $em) {
  $contr = new ProfileController($em, $app);
  $user = $contr->verifyUserCredentials();
})->name('user_logon_process');

$app->get('/afmelden', function() use ($app, $em){
  $contr = new ProfileController($em, $app);
  $contr->logOff();
  $globals = $contr->getGlobals();
  $app->render('homepage.html.twig', array('globals' => $globals));
})->name('user_logoff');