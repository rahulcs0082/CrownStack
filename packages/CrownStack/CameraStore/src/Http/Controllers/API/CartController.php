<?php

namespace CrownStack\CameraStore\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use CrownStack\CameraStore\Repositories\CartRepository;
use CrownStack\CameraStore\Repositories\CartItemRepository;
use CrownStack\CameraStore\Repositories\ProductRepository;
use CrownStack\CameraStore\Http\Resources\Cart as CartResource;

class CartController extends BaseController
{   
    /**
     * CartRepository instance
     *
     * @var \CrownStack\CameraStore\Repositories\CartRepository
     */
    protected $cartRepository;

    /**
     * CartItemRepository instance
     *
     * @var \CrownStack\CameraStore\Repositories\CartItemRepository
     */
    protected $cartItemRepository;

    /**
     * ProductRepository instance
     *
     * @var \CrownStack\CameraStore\Repositories\ProductRepository
     */
    protected $productRepository;

    /**
     * Create a new class instance.
     *
     * @param  \CrownStack\CameraStore\Repositories\CartRepository     $cartRepository
     * @param  \CrownStack\CameraStore\Repositories\CartItemRepository $cartItemRepository
     * @param  \CrownStack\CameraStore\Repositories\Productepository   $productRepository
     * 
     * @return void
    */
    public function __construct(
        CartRepository     $cartRepository,
        CartItemRepository $cartItemRepository,
        ProductRepository  $productRepository
    )
    {
        $this->cartRepository     = $cartRepository;
        $this->cartItemRepository = $cartItemRepository;
        $this->productRepository  = $productRepository;
    }

    /**
     * Get customer cart.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function get()
    {
        $cart = $this->cartRepository->findWhere(['customer_id' => auth()->user()->id]);

        return response()->json([
            'data' => $cart ? CartResource::collection($cart) : null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {   
        try {
            $product = $this->productRepository->findOneWhere(['id' => $id]);

            if (! is_null($product)) {
                $cartData['items_qty']   = request()->all()['qty'];
                $cartData['customer_id'] = auth()->user()->id;
                $cartData['grand_total'] = $cartData['base_grand_total'] = $product->price;
                $cartData['sub_total'] = $cartData['base_sub_total'] = $cartData['items_qty'] * $product->price;

                $cart =  $this->cartRepository->create($cartData);

                $cartItemData['quantity'] = $cartData['items_qty'];
                $cartItemData['name'] = $product->name;
                $cartItemData['cart_id'] = $cart->id;
                $cartItemData['product_id'] = $product->id;
                $cartItemData['price'] = $cartItemData['base_price'] = $product->price;
                $cartItemData['total'] = $cartItemData['base_total'] = $cartData['items_qty'] * $product->price;

                $this->cartItemRepository->create($cartItemData);

                return response()->json([
                    'message' => 'Item has been successfully added in cart',
                    'data'    => $cart ? new CartResource($cart) : null,
                ]);
            } else {
                return response()->json([
                    'message' => 'Invalid Product id',
                    'code'    => 400
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => $e->getCode()
            ]);
        }
    }
}