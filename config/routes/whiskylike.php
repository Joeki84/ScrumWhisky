<?php
/* olivier */

use scrum\ScotchLodge\Controllers\WhiskyLikeController;

$contr = new WhiskyLikeController($em, $app);


$app->get('/whiskylike/:a/:b', function() use ($contr){
    $contr->addLike();
})->name('whiskylike');

/* Olivier */