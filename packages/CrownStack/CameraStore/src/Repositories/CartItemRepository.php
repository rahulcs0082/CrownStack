<?php

namespace CrownStack\CameraStore\Repositories;

use CrownStack\CameraStore\Repository\Repository;

class CartItemRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return Mixed
     */
    function model()
    {
        return 'CrownStack\CameraStore\Models\CartItem';
    }
}