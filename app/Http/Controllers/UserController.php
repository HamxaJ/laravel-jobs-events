<?php

namespace App\Http\Controllers;

use App\Events\OrderShiped;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Test function for Events  and Listners
     */

    Public function test(){
        //dd(OrderShiped::dispatch());
        $user = new User();
        $user->email = 'w8@gmail.com';
        $user->name = 'hamza';
        $user->password = '123456';
        $user->save();
        return OrderShiped::dispatch($user);
    }
}
