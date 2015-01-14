<?php

use scrum\ScotchLodge\Controllers\CountryController;

$contr = new CountryController($em, $app);

$app->get('/countries', function() use ($app, $contr) {  
  $countries = $contr->getAllCountries();
  $app->render('Test\countries.html.twig', array('countries' => $countries));
})->name('test_countries');

$app->get('/countries/:id', function($id) use ($app, $contr) {
  $country = $contr->getCountry($id);
  $app->render('Test\country.html.twig', array('country' => $country));
})->name('test_countries.id');