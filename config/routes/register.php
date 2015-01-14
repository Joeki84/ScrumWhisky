<?php

use scrum\ScotchLodge\Controllers\RegistrationController;

$contr = new RegistrationController($em, $app);

$app->get('/register', function() use ($app, $contr) {
  $postcodes = $contr->getPostcodes();
  $globals = $contr->getGlobals();
  $app->render('Registration/register.html.twig', array('globals' => $globals, 'postcodes' => $postcodes));
})->name('user_register');

$app->post('/register', function() use ($app, $contr) {
  $contr->processRegistration();
})->name('user_register_process');

$app->get('/register/ok', function() use ($app, $contr) {
  $contr->registrationConfirm();
})->name('user_register_ok');

$app->get('/whisky/:short_url', function ($short_url) use ($app, $contr) {
  
});
