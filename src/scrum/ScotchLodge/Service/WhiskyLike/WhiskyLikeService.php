<?php

namespace scrum\ScotchLodge\Service\WhiskyLike;

use Doctrine\ORM\EntityManager;
use Slim\Slim;
use scrum\ScotchLodge\Entities\WhiskyLike;

use \scrum\ScotchLodge\Service\Profile\ProfileService;
use \scrum\ScotchLodge\Service\Whisky\WhiskyService;

/**
 * WhyskiLikeService
 *
 * @author olivier masudi
 */
class WhiskyLikeService {
    
    private $em;
    private $app;
    private $whiskysrv;
    private $profilesrv;

    public function __construct($em, $app) {
      $this->em = $em;
      $this->app = $app;
    }

    
public function addlike($a,$b){
    
   $WhiskyLike= new WhiskyLike();

   $whiskysrv = new WhiskyService($this->em, $this->app);
   $whisky_object = $whiskysrv->retrieveWhiskyById($a);
   
   $usersrv = new ProfileService($this->em, $this->app);
   $user_object = $usersrv->searchUserById($b);
  
   
   $WhiskyLike->setUser($user_object);
   $WhiskyLike->setWhisky($whisky_object); 
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