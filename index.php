<?php

use Doctrine\Common\ClassLoader;
use scrum\ScotchLodge\Service\Output;
use scrum\ScotchLodge\Controllers\CountryController;

require_once 'bootstrap.php';

$classloader = new ClassLoader("scrum", "src");
$classloader->register();

$output = new Output();

try {
  /* routes */
  include 'config/routes/Test/test.php';
  include 'config/routes/Test/countries.php';
  include 'config/routes/Test/form.php';
  include 'config/routes/register.php';
  include 'config/routes/profile.php';
  include 'config/routes/main.php';
  
  $app->run();
    
} catch (Exception $ex) {
  $output->render('probleem.html.twig', array('probleem' => $ex->getMessage()));
}
