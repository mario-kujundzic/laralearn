<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Blacklist;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTProvider;

class DataController extends Controller
{
    //
    public function __construct()
    {
        config([
            'jwt.blacklist_enabled' => true,
            'jwt.blacklist_grace_period' => 20,
        ]);
        $this->middleware('auth:api', ['except' => ['open']]);
    }

    public function open() 
    {
        return response()->json("This data is for all users");
    }

    public function close()
    {
        return response()->json("This data is for registered users only");
    }

    public function blacklist()
    {
        JWTAuth::invalidate(JWTAuth::parseToken(), $force_forever = false);
        return response()->json(['message' => 'blacklisted' ]);
    }
}
