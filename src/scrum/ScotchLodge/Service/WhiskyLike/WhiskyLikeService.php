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

    public function __construct($em, $app) {
      $this->em = $em;
      $this->app = $app;
    }

    
public function addlike(){
    
   $whiskyid=$this->app->request->post('whiskyid');
   $likeid=$this->app->request->post('likeid');
   $userid=$this->app->request->post('userid');
   $status=$this->app->request->post('status');
   
   $usersrv = new ProfileService($this->em, $this->app);
   $user = $usersrv->searchUserById($userid);

   $whiskysrv = new WhiskyService($this->em, $this->app);
   $whisky = $whiskysrv->retrieveWhiskyById($whiskyid);
   
   
   $WhiskyLike = $this->em->find('scrum\ScotchLodge\Entities\WhiskyLike',$likeid );
   if($WhiskyLike != NULL)
   {
         $WhiskyLike->setUser($user);
         $WhiskyLike->setWhisky($whisky);
         $WhiskyLike->setState($status);
         //$this->em->merge($WhiskyLike);
   }
   else
   {
       $WhiskyLike= new WhiskyLike();
       $WhiskyLike->setUser($user);
       $WhiskyLike->setWhisky($whisky);
       $WhiskyLike->setState($status);
       
   }    

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