<?php

namespace scrum\ScotchLodge\Service\Category;

use Doctrine\ORM\EntityManager;
use Slim\Slim;
use scrum\ScotchLodge\Entities\Event;
use scrum\ScotchLodge\Entities\User;

/**
 * EventService
 *
 * @author joeri broos
 */
class CategoryService {
    
    private $em;
    private $app;
    private $errors;

    public function __construct($em, $app) {
      $this->em = $em;
      $this->app = $app;
      $this->errors = null;
    }

    public function getErrors(){
        return $this->errors;
    }

    

/* Olivier */    
    public function ShowAllCurrentCategories($em,$app){
    //$em = $this->getEntityManager();
    $categoryRepository = $em->getRepository('scrum\ScotchLodge\Entities\Category');
    $categories = $this->em->getRepository('scrum\ScotchLodge\Entities\Category')->findAll();
    if(count($categories)> 0){
            return $categories;
        }else{
            return null;
        }
    return $categories;
    
    }
/* End Olivier */


    
    /* End Search functions */

}
