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
    
   $commentid=$this->app->request->post('commentid');
   $likeid=$this->app->request->post('likeid');
   $userid=$this->app->request->post('userid');
   $status=$this->app->request->post('status');
   
   $usersrv = new ProfileService($this->em, $this->app);
   $user = $usersrv->searchUserById($userid);

   $commentsrv = new CommentService($this->em, $this->app);
   $comment = $commentsrv->retrieveCommentById($commentid);
   
   $CommentLike = $this->isalreadyLike($commentid,$userid);
   
   $c = $CommentLike;
   if($CommentLike)
   {
         //$CommentLike->setUser($user);
         //$CommentLike->setWhisky($comment);
         $CommentLike->setState($status);         
   }
   else
   {
       $CommentLike= new WhiskyLike();
       $CommentLike->setUser($user);
       $CommentLike->setWhisky($comment);
       $CommentLike->setState($status);
       
   }    

      $this->em->persist($CommentLike);
      $this->em->flush();    

   return $CommentLike;  
   
}    
    
    public function isalreadyLike($id_comment,$id_user){                      
       $like = $this->em->getRepository('scrum\ScotchLodge\Entities\CommentLike')->findBy(array('user'=> $id_user  ,'comment' => $id_comment));
       if(count($like)> 0){
            return like;
        }else{
            return null;
        }
        
    }
    
}