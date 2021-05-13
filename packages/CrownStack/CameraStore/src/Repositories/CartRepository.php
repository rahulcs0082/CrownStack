<?php

namespace CrownStack\CameraStore\Repositories;

use CrownStack\CameraStore\Repository\Repository;

class CartRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return Mixed
     */
    function model()
    {
        return 'CrownStack\CameraStore\Models\Cart';
    }
}