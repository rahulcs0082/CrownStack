<?php

namespace CrownStack\CameraStore\Http\Controllers\API;

use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Routing\Controller as BaseController;
use CrownStack\CameraStore\Repositories\CustomerRepository;
use CrownStack\CameraStore\Http\Resources\Customer as CustomerResource;

class CustomerController extends BaseController
{   
    /**
     * Repository object
     *
     * @var \CrownStack\CameraStore\Repositories\CustomerRepository
     */
    protected $customerRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \CrownStack\CameraStore\Repositories\CustomerRepository  $customerRepository
     * @return void
     */
    public function __construct(
        CustomerRepository $customerRepository
    )   {
        $this->customerRepository = $customerRepository;
    }
    
    /**
     * Method to store user's sign up form data to DB.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $jwtToken = null;

        $credentials = $request->only('email', 'password');

        if (! $jwtToken = JWTAuth::attempt($credentials)) {
            return response()->json([
                'error' => 'Invalid Email or Password',
            ], 401);
        }

        $customer = auth()->user();

        return response()->json([
            'token'   => $jwtToken,
            'message' => 'Logged in successfully.',
            'data'    => new CustomerResource($customer),
        ]);
    }
    
    /**
     * Method to store user's sign up form data to DB.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => 'required|string|email|unique:customers',
            'password'   => 'required|string|min:6',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $data = [
            'first_name'  => $request->get('first_name'),
            'last_name'   => $request->get('last_name'),
            'email'       => $request->get('email'),
            'password'    => $request->get('password'),
            'password'    => bcrypt($request->get('password'))
        ];

        $customer = $this->customerRepository->create($data);

        return response()->json([
            'message'  => 'Successfully registered',
            'customer' => $customer
        ], 201);
    }
    
    /**
     * Get details for current logged in customer
     *
     * @return \Illuminate\Http\Response
    */
    public function getAuthenticatedUser() {
        $customer = JWTAuth::parseToken()->authenticate();

        return response()->json([
            'data' => new CustomerResource($customer),
        ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {   
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Successfully logged out']);
    }
}