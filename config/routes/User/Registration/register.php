<?php

use scrum\ScotchLodge\Controllers\RegistrationController;

$contr = new RegistrationController($em, $app);

$app->get('/registreer', function() use ($app, $contr) {
  if ($app->request->isGet()) {
    $postcodes = $contr->getPostcodes();
    $app->render('Registration/register.html.twig', array('postcodes' => $postcodes));
  }
})->name('user_register_get');

$app->post('/registreer', function() use ($app, $contr) {
  if ($app->request->isPost()) {
    $postcodes = $contr->getPostcodes();
    $contr->processRegistration();
  }
})->name('user_register_process');

$app->get('/registreer/ok', function() use ($app){
  $app->render('Registration/register_confirm.html.twig', array('info' => 'Registratie voltooid'));
})->name('user_register_ok');