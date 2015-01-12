<?php

$app->get('/', function() use ($app) {
  $app->render('homepage.html.twig', array('app' => $app));
})->name('main_page');