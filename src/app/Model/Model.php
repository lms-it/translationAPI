<?php
namespace App\Model;

interface Model
{
    function getByID($id);
    function delete($id);
    function create(Array $inputs);
    function update(Array $inputs);
}