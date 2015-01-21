<?php

use scrum\ScotchLodge\Controllers\EventController;

$contr = new EventController($em, $app);

$app->get('/newevent', function() use ($contr){
    $contr->addEvent();
})->name('new_event');

$app->post('/newevent', function() use ($contr){
    $contr->insertEvent();
})->name('new_event_process');

$app->get('/newevent/ok', function() use ($contr){
    echo("todo new event stored");
})->name('new_event_ok');