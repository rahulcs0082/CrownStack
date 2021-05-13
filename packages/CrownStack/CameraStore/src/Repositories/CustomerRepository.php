<?php

namespace CrownStack\CameraStore\Repositories;

use CrownStack\CameraStore\Repository\Repository;

class CustomerRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return string
    */
    function model()
    {
        return 'CrownStack\CameraStore\Models\Customer';
    }
}