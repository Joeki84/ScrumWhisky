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

    public function __construct($em, $app) {
      $this->em = $em;
      $this->app = $app;
      $this->errors = null;
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
    
}