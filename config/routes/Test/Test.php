<?php

$app->get('/test', function() use ($app){
  echo "TEST";
});
$app->group('/test', function() use ($app) {
  $app->get('/foo', function() use ($app) {
    echo "TEST/foo";
  });
  $app->get('/:id(/:title)', function($id, $title = null) use ($app) {
    echo "TEST $id $title";
  });
});
//})->conditions(array('id' => '[\d]+'));