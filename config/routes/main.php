<?php

use scrum\ScotchLodge\Controllers\HomepageController;

$app->get('/', function() use ($em, $app) {
  $contr = new HomepageController($em, $app);
  $globals = $contr->getGlobals();
  $app->render('homepage.html.twig', array('globals' => $globals));
})->name('main_page');