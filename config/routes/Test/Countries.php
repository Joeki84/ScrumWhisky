<?php

use scrum\ScotchLodge\Controllers\CountryController;

$contr = new CountryController($em);

$app->get('/countries', function() use ($app, $contr) {  
  $countries = $contr->getAllCountries();
  $app->render('Test\countries.html.twig', array('countries' => $countries));
});
$app->get('/countries/:id', function($id) use ($app, $contr) {
  $country = $contr->getCountry($id);
  $app->render('Test\country.html.twig', array('country' => $country));
});