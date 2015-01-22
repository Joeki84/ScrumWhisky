<?php

use scrum\ScotchLodge\Controllers\WhiskyController;

$contr = new WhiskyController($em, $app);

$app->get('/newwhisky', function() use ($contr){
    $contr->addWhisky();
})->name('new_whisky');

$app->post('/newwhisky', function() use ($contr){
    $contr->insertWhisky();
})->name('new_whisky_process');

$app->get('/newwhisky/ok', function() use ($contr){
    echo("todo new whisky stored");
})->name('new_whisky_ok');

$app->get('/editwhisky/:id', function($id) use ($contr){
    $contr->editWhisky($id);
})->name('edit_whisky');

$app->post('/editwhisky/:id', function($id) use ($contr){
    $contr->updateWhisky($id);
})->name('edit_whisky_process');

/* Olivier */

$app->get('/advanced_search_whisky', function() use ($contr){
    $contr->advanced_search_whisky();
})->name('advanced_search_whisky');

/* Olivier */