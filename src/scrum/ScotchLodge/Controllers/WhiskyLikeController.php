<?php

namespace scrum\ScotchLodge\Controllers;


use scrum\ScotchLodge\Controllers\Controller;
use scrum\ScotchLodge\Service\WhiskyLike\WhiskyLikeService;
use scrum\ScotchLodge\Entities\WhiskyLike;

/**
 * WhyskiLikeController controller
 * 
 * @author Olivier Masudi 
 */
class WhiskyLikeController extends Controller{
    
    private $Whiskylikesrv;
    private $em;
    private $app;

    public function __construct($em, $app) {
        parent::__construct($em, $app);
        $this->Whiskylikesrv = new WhiskyLikeService($em, $app);
        $this->em = $em;
        $this->app = $app;
    }
    
    
    public function addLike(){          
       $like= $this->Whiskylikesrv->addlike();
       echo '{"id":"0"}';
    }

}