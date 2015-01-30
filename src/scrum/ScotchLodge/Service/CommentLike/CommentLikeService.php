<?php
namespace scrum\ScotchLodge\Service\CommentLike;
use Doctrine\ORM\EntityManager;
use Slim\Slim;
use scrum\ScotchLodge\Entities\CommentLike;

/**
*
 *  * CommentLikeService
 *
 * @author olivier masudi
 */
class CommentLikeService {
    
    private $em;
    private $app;

    public function __construct($em, $app) {
      $this->em = $em;
      $this->app = $app;
    }

    
public function addlike(){
    
   $commenLike= new CommentLike();
   $comment=$this->app->request->post('comment_id');
   $user=$this->app->request->post('user_id');
   
   $commentLike->setUser($user);
   $commentLike->setComment($comment); 
   $this->em->persist($commentLike);
   $this->em->flush();
   return $commentLike;  
   
}    
    public function isalreadyLike($id_comment,$id_user){                      
       $like = $this->em->getRepository('scrum\ScotchLodge\Entities\CommentLike')->findBy(array('user_id'=> $id_user  ,'comment_id' => $id_comment));
       if(count($like)> 0){
            return true;
        }else{
            return null;
        }
        
    }
    
}