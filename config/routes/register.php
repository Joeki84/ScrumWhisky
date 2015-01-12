<?php

use scrum\ScotchLodge\Controllers\RegistrationController;

$contr = new RegistrationController($em, $app);

$app->get('/registreer', function() use ($app, $contr) {
  if ($app->request->isGet()) {
    $postcodes = $contr->getPostcodes();
    $globals = $contr->getGlobals();
    $app->render('Registration/register.html.twig', array('globals' => $globals, 'postcodes' => $postcodes));
  }
})->name('user_register');

$app->post('/registreer', function() use ($app, $contr) {
  if ($app->request->isPost()) {    
    $contr->processRegistration();
  }
})->name('user_register_process');

$app->get('/registreer/ok', function() use ($app, $contr){
  $contr->registrationConfirm();  
})->name('user_register_ok');