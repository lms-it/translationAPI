<?php

namespace App\Http\Controller;


use App\Persistence\Repository\ResellerRepository;

class ResellerController{
    protected $resellerRepository;
    
    public function __construct(ResellerRepository $resellerRepository)
    {
        $this->resellerRepository = $resellerRepository;
    }

    public function get($id)
    {
        return $this->resellerRepository->getById($id);
    }
    
}
