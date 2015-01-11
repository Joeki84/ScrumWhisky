<?php

/**
 * An entityManager from bootstrap.php is available
 */
use Doctrine\Common\ClassLoader;
use scrum\ScotchLodge\Service\Output;
use scrum\ScotchLodge\Controllers\CountryController;

require_once 'bootstrap.php';

$classloader = new ClassLoader("scrum", "src");
$classloader->register();

$output = new Output();

try {
  include 'config/routes/Test/Test.php';
  include 'config/routes/Test/Countries.php';
  include 'config/routes/Test/Form.php';
  $app->run();
    
} catch (Exception $ex) {
  $output->render('probleem.html.twig', array('probleem' => $ex->getMessage()));
}
