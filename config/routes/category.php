<?php
/* Olivier */

use scrum\ScotchLodge\Controllers\CategoryController;

$contr = new CategoryController($em, $app);

$app->get('/categories', function() use ($contr) {
  $contr->getCategories();
})->name('show_category_list');

$app->get('/editcategory/:id', function($id) use ($contr) {
  $contr->editCategories($id);
})->name('editcategory');


/* Olivier */