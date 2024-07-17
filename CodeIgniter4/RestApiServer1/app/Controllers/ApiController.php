<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

// add model 

use App\Models\UserModel;

class ApiController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
        return "Welcome to Rest API Controller in Codeigniter 4";
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function showUser($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function createUser()
    {
        // get form data 
        $rules = arary();
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function editUser($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function updateUser($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function deleteUser($id = null)
    {
        //
    }
}
