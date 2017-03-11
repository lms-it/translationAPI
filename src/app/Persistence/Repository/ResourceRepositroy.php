<?php
/**
 * MONO SOLUTIONS RESELLER API
 *
 * @Developed by Mohamed Salem Lamiri
 * @version 1.0
 *
 **/

namespace App\Persistence\Repository;

/* Repository DESIGN PATTERN
* This class is used to define CRUD functions in order to avoid duplicated methods
* and to maintain a good code architecture and makes it easier to modify database & models without affecting controllers
*/


abstract class ResourceRepository {

    protected $model;

    function getById($id)
    {
        return $this->model->getByID($id);
    }

    function delete($id){
        //TODO IMPLEMENT
    }

    function create(Array $inputs){
        //TODO IMPLEMENT
    }

    function update(Array $inputs){
        //TODO IMPLEMENT
    }

}