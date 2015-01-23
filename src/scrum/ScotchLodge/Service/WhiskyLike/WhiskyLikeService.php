<?php

namespace scrum\ScotchLodge\Service\WhiskyLike;

use Doctrine\ORM\EntityManager;
use Slim\Slim;
use scrum\ScotchLodge\Entities\WhiskyLike;

/**
 * WhyskiLikeService
 *
 * @author olivier masudi
 */
class WhiskyLikeService {
    
    private $em;
    private $app;

    public function __construct($em, $app) {
      $this->em = $em;
      $this->app = $app;
    }

    
public function addlike(){
    
   $WhiskyLike= new WhiskyLike();
   $Whisky=$this->app->request->get('whisky_id');
   $user=$this->app->request->get('user_id');
   
   $WhiskyLike->setUser($user);
   $WhiskyLike->setWhisky($Whisky); 
   $this->em->persist($WhiskyLike);
   $this->em->flush();
   return $WhiskyLike;  
   
}    
    public function isalreadyLike($id_comment,$id_user){                      
       $like = $this->em->getRepository('scrum\ScotchLodge\Entities\WhiskyLike')->findBy(array('user_id'=> $id_user  ,'Whisky_id' => $id_comment));
       if(count($like)> 0){
            return true;
        }else{
            return null;
        }
        
    }
    
}