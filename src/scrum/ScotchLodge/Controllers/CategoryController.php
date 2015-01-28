<?php

namespace scrum\ScotchLodge\Controllers;

use Doctrine\ORM\EntityManager;
use Slim\Slim;
use scrum\ScotchLodge\Controllers\Controller;
use scrum\ScotchLodge\Service\Category\CategoryService;
use scrum\ScotchLodge\Service\Registration\RegistrationService;
use scrum\ScotchLodge\Entities\Event;
use scrum\ScotchLodge\Entities\User;

/**
 * EventController controller
 * 
 * @author joeri broos 
 */
class CategoryController extends Controller{
    
    /*@var $eventsrv EventService */
    private $catsrv;
    private $em;
    private $app;

    public function __construct($em, $app) {
        parent::__construct($em, $app);
        $this->catsrv = new CategoryService($em, $app);
        $this->em = $em;
        $this->app = $app;
    }
    
 
    
/* Olivier */
    
    
   public function editCategory($id){
        $category = $this->catsrv->retrieveCategoryById($id);
        $globals = $this->getGlobals();        
    }
    
    
    
        public function getCategories(){
          try{
          $globals = $this->getGlobals();  
          $categories = $this->catsrv->ShowAllCurrentCategories($this->em, $this->app);
          if($categories){
              $this->getApp()->render('Category/show_categories_list.html.twig', array('globals' => $globals, 'categories' => $categories));
          }
          else{
                $errors = $this->catsrv->getErrors();
                 $app = $this->getApp();
                $app->flash('error', 'No categories');
                $this->getApp()->render('Category/show_categories_list.html.twig', array('globals' => $globals,'errors' => $errors, 'categories' => $categories));
            }
        } catch (Exception $ex) {
            $this->getApp()->render('probleem.twig.html');
        }
          
          
        }
        
    
     
        
    
/* End Olivier    */
    
    
}