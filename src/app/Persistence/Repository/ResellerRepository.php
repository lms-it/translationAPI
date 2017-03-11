<?php
/**
 * MONO SOLUTIONS RESELLER API
 *
 * @Developed by Mohamed Salem Lamiri
 * @version 1.0
 *
 **/

namespace App\Persistence\Repository;
use App\Model\Reseller;

//Extends abstract ResourceRepository class

class ResellerRepository extends ResourceRepository {

    public function __construct(Reseller $reseller)
    {
        $this->model = $reseller;
    }
    
    function getDefaultText($id){
        return $this->model->getColById($id, $this->model->default_text);
    }
}