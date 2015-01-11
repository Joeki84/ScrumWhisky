<?php

use scrum\ScotchLodge\Controllers\RegistrationController;

$contr = new RegistrationController($em, $app);

$app->map('/register', function() use ($app, $contr) {
  if ($app->request->isGet()) {
    $app->render('Registration/register.html.twig');
  }
  if ($app->request->isPost()) {
    $contr->processRegistration();
  }
})->via('GET', 'POST')->name('user_register');

