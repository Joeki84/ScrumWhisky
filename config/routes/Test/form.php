<?php

use scrum\ScotchLodge\Controllers\FormController;

$app->map('/form', function() use ($em, $app) {
  $contr = new FormController($em, $app);
  $contr->form();
})->via('GET', 'POST')->name('test_form');

