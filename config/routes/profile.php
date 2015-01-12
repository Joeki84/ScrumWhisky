<?php

use scrum\ScotchLodge\Controllers\ProfileController;


$app->get('/logon', function() use ($em, $app) {
  $contr = new ProfileController($em, $app);
  $globals = $contr->getGlobals();
  $app->render('Profile\logon.html.twig', array('globals' => $globals));
})->name('user_logon');

$app->post('/logon', function() use ($app, $em) {
  $contr = new ProfileController($em, $app);
  $user = $contr->verifyUserCredentials();
})->name('user_logon_process');