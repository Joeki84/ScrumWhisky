<?php

use scrum\ScotchLodge\Controllers\RegistrationController;

$contr = new RegistrationController();

$app->get('/register', function() use ($app, $contr) {  
  $app->render('Registration/register.html.twig');
})->name('user_register');