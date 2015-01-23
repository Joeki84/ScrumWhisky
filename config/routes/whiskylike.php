<?php
/* olivier */

use scrum\ScotchLodge\Controllers\WhiskyLikeController;

$contr = new WhiskyLikeController($em, $app);


$app->get('/whiskylike/:a/:b', function($a,$b) use ($contr){
    $contr->addLike($a,$b);
})->name('whiskylike');

/* Olivier */