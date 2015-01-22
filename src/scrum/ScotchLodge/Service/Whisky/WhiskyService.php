<?php

namespace scrum\ScotchLodge\Service\Whisky;

use Doctrine\ORM\EntityManager;
use Slim\Slim;
use scrum\ScotchLodge\Entities\Whisky;
use scrum\ScotchLodge\Service\Validation\WhiskyValidation as Val;
use scrum\ScotchLodge\Service\Region\RegionService;
use scrum\ScotchLodge\Service\Distillery\DistilleryService;
use scrum\ScotchLodge\Service\Barrel\BarrelService;

/**
 * WhiskyService
 *
 * @author joeri broos
 */

class WhiskyService{
    
    private $em;
    private $app;
    private $errors;
    private $entity;

    public function __construct($em, $app) {
      $this->em = $em;
      $this->app = $app;
      $this->errors = null;
      $this->entity = "scrum\ScotchLodge\Entities\Whisky";
    }

    public function getErrors(){
        return $this->errors;
    }

    /* Begin Add function */    
    /**
     * Create a new whisky, returns a Whisky when there are no errors,
     * otherwhise it gives a false in return.
     * @return boolean|Whisky
     */
    public function addWhisky(){
        $val = new Val($this->app, $this->em);
        if($val->validate()){        
            $name = $this->app->request->post('name');
            $image_path = $this->app->request->post('image_path');
            $region = $this->app->request->post('region');
            $distillery = $this->app->request->post('distillery');
            $price = $this->app->request->post('price');
            $age = $this->app->request->post('age');
            $alcohol = $this->app->request->post('alcohol');
            $barrel = $this->app->request->post('barrel');

            /* @var $whisky Whisky */
            $whisky = new Whisky();
            $whisky->setName($name);
            $whisky->setImagePath($image_path);
            /* @var $region Region */
            $regsrv = new RegionService($this->em, $this->app);
            $region_object = $regsrv->getRegionObject($region);
            $whisky->setRegion($region_object);
            /* @var $distillery Distillery */
            $dissrv = new DistilleryService($this->em, $this->app);
            $distillery_object = $dissrv->getDistilleryObject($distillery);
            $whisky->setDistillery($distillery_object);
            $whisky->setPrice($price);
            $whisky->setAge($age);
            $whisky->setAlcohol($alcohol);
            /* @var $barrel Barrel */
            $barsrv = new BarrelService($this->em, $this->app);
            $barrel_object = $barsrv->getBarrelObject($barrel);
            $whisky->setBarrel($barrel_object);

            $this->em->persist($whisky);
            $this->em->flush();
            return $whisky;
        }
        $this->errors = $val->getErrors();
        return false;
    }
    /* End Add function */    

    /* Begin Update function */
    /**
     * Update the fields of a whisky
     * @param Whisky $whisky
     */
    public function updateWhisky(Whisky $whisky){
        $name = $this->app->request->post('name');
        if($whisky->getName() != $name){
            $whisky->setName($name);
        }

        $image_path = $this->app->request->post('image_path');
        if($whisky->getImagePath() != $image_path){
            $whisky->setImagePath($image_path);
        }
        
        $region = $this->app->request->post('region');
        if($whisky->getRegion()->getId() != $region){
            $regsrv = new RegionService($this->em, $this->app);
            $region_object = $regsrv->getRegionObject($region);
            $whisky->setRegion($region_object);
        }
        
        $distillery = $this->app->request->post('distillery');
        if($whisky->getDistillery()->getId() != $distillery){
            $distsrv = new DistilleryService($this->em, $this->app);
            $distillery_object = $distsrv->getDistilleryObject($distillery);
            $whisky->setDistillery($distillery_object);
        }
        
        $price = $this->app->request->post('price');
        if($whisky->getPrice() != $price){
            $whisky->setPrice($price);
        }
        
        $age = $this->app->request->post('age');
        if($whisky->getAge() != $age){
            $whisky->setAge($age);
        }
        
        $alcohol = $this->app->request->post('alcohol');
        if($whisky->getAlcohol() != $alcohol){
            $whisky->setAlcohol($alcohol);
        }
        
        $barrel = $this->app->request->post('barrel');
        if($whisky->getBarrel()->getId() != $barrel){
            $barsrv = new BarrelService($this->em, $this->app);
            $barrel_object = $barsrv->getBarrelObject($barrel);
            $whisky->setBarrel($barrel_object);
        }

        $this->em->persist($whisky);
        $this->em->flush();
    }
    /* End Update function */

    /* Begin Search functions */
    /**
     * Retrieve a whisky by is Id
     * @param int $id
     * @return Whisky $whisky
     */
    public function retrieveWhiskyById($id){
        $whisky = $this->em->getRepository($this->entity)->find($id);
        if(count($whisky)> 0){
            return $whisky;
        }else{
            return null;
        }
    }
    
    public function latestReviews($limit = null) {
      $repo = $this->em->getRepository('scrum\ScotchLodge\Entities\Whisky');
      $latest = $repo->getLatestReviews($limit);
      return $latest;
    }
    
    public function popularReviews($limit = null) {
      $repo = $this->em->getRepository('scrum\ScotchLodge\Entities\Whisky');
      $popular = $repo->getPopularReviews($limit);
      return $popular;
    }
    
    public function retrieveReviews($limit) {
      $reviews['latest'] = $this->latestReviews($limit);
      $reviews['popular'] = $this->popularReviews($limit);
      return $reviews;
    }

    
        
/* Olivier whisky service*/
    
public function advanced_search_whisky_result(){

            if($this->app->request->post('region')!=null)  
            $req["region"] = $this->app->request->post('region');
            
            if($this->app->request->post('distillery')!=null)  
            $req["distillery"] = $this->app->request->post('distillery');
            
            if($this->app->request->post('bottler')!=null)  
            $req["barrel"] = $this->app->request->post('bottler');
            
            if($this->app->request->post('age')!=null)  
            $req["age"]= $this->app->request->post('age');
            
            if($this->app->request->post('abv')!=null)  
            $req["alcohol"] = $this->app->request->post('abv');
            
            if($this->app->request->post('name')!=null)  
            $req["name"] = $this->app->request->post('name');
            
            if(isset($req))
            {
              $whisky = $this->em->getRepository($this->entity)->findBy($req);
              return $whisky;
            }
            else
             {
              $whisky = $this->em->getRepository($this->entity)->findall();
              return $whisky;
            }
}    
    
/* Olivier */  
    
}