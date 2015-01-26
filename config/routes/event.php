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

$app->get('/events', function() use ($contr) {
  $contr->getEvents();
})->name('current_event_list');

$app->get('/editevent/:id', function($id) use ($contr){
    $contr->editEvent($id);
})->name('edit_event');

$app->post('/editevent/:id', function($id) use ($contr){
    $contr->updateEvent($id);
})->name('edit_event_process');
