<?php

use scrum\ScotchLodge\Controllers\EventController;

$contr = new EventController($em, $app);
/* Olivier */
$app->get('/event/:id', function($id) use ($contr){
    $contr->show_event_by_id($id);
})->name('show_event_by_id');

$app->get('/event/new', function() use ($contr){
    $contr->addEvent();
})->name('new_event');

$app->post('/event/new', function() use ($contr){
    $contr->insertEvent();
})->name('new_event_process');

$app->get('/event/new/ok', function() use ($contr){
    echo("todo new event stored");
})->name('new_event_ok');

$app->get('/events', function() use ($contr) {
  $contr->getEvents();
})->name('current_event_list');

$app->get('/event/edit/:id', function($id) use ($contr){
    $contr->editEvent($id);
})->name('edit_event');

$app->post('/event/edit/:id', function($id) use ($contr){
    $contr->updateEvent($id);
})->name('edit_event_process');




/* Olivier */