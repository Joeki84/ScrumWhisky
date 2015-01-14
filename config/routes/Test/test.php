<?php

$app->get('/test', function() use ($app){
  echo "TEST";
})->name('test_test');

// /test/*
$app->group('/test', function() use ($app) {  
  
  $app->get('/foo', function() use ($app) {
    echo "TEST/foo";
  })->name('test_test_foo');
  
  $app->get('/:id(/:title)', function($id, $title = null) use ($app) {
    echo "TEST $id $title";
  })->name('Test_test_id')->conditions(array('id' => '[\d]+'));  
  
}); // group /test