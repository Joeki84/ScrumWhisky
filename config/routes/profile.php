<?php

use scrum\ScotchLodge\Controllers\ProfileController;

$app->get('/logon', function() use ($app) {
  $app->render('Profile\logon.html.twig', array('app' => $app));
})->name('user_logon');

$app->post('/logon', function() use ($app, $em) {
  $contr = new ProfileController($em, $app);
  $user = $contr->verifyUserCredentials();
})->name('user_logon_process');