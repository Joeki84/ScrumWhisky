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