<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\MessageBag;
//use Tymon\JWTAuth\JWTAuth;

use JWTAuth;
use Namshi\JOSE\JWT;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Crypt;
use  Monarobase\CountryList\CountryListFacade;



class DataController extends Controller
{
    //
    public  function erea()
    {



        $Countries = new CountryListFacade();
        return $Countries::getList('en', 'json');

    }
}
