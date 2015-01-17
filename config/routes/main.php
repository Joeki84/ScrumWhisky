<?php

use scrum\ScotchLodge\Controllers\HomepageController;

$contr = new HomepageController($em, $app);

$app->get('/', function() use ($contr) {  
  $contr->homepage();
})->name('main_page');

$app->get('/print_routes', function() use ($contr) {
  $contr->showRoutes();
})->name('show_routes');