<?php

namespace CrownStack\CameraStore\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ResourceController extends BaseController
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * Repository object
     *
     * @var \CrownStack\CameraStore\Repositories\Repository
     */
    protected $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        $this->_config = request('_config');

        if ($this->_config) {
            $this->repository = app($this->_config['repository']);
        }
    }

    /**
     * Returns a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $query = $this->repository->scopeQuery(function($query) {
            
            return $query;
        })->get();

        return $this->_config['resource']::collection($query);
    }

    /**
     * Returns a individual resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function get($id)
    {
        $query = $this->repository->findOrFail($id);

        return new $this->_config['resource']($query);
    }
}
