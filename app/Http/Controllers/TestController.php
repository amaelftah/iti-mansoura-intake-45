<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller //StudlyCase
{
    public function someAction() //camelCase
    {
        $localName = 'Mohamed';
        $age = 30;
        $email = '1234@gmail.com';
    
        return view('test', [
            'name' => $localName,
            'age' => $age
        ]);
    }
}
