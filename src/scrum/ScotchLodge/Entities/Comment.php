<?php

namespace scrum\ScotchLodge\Entities;

use scrum\ScotchLodge\Entities\User;

/**
 * Comment entity
 *
 * @author joeri broos
 */
class Comment {

    private $id;
    /* @var $user User */
    private $user;
    /* @var $comment Comment */
    private $comment_id;
    private $comment_date;
    private $comment;
    
    function getId(){
        return $this->id;
    }
    
    function getUser(){
        return $this->user;
    }
    
    function getCommentId(){
        return $this->comment_id;
    }
    
    function getCommentDate(){
        return $this->comment_date;
    }
    
    function getComment(){
        return $this->comment;
    }
    
    function setId($id){
        $this->id = $id;
    }
    
    function setUser(User $user){
        $this->user = $user;
    }
    
    function setCommentId(Comment $comment){
        $this->comment_id = $comment;
    }
    
    function setCommentDate($comment_date){
        $this->comment_date = $comment_date;
    }
    
    function setComment($comment){
        $this->comment = $comment;
    }
    
}