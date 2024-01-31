<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $users = [
            [
                "name"=> "Stas",
                "age"=>21
            ],
            [
                "name"=> "Maria",
                "age"=>21
            ]
            ,
            [
                "name"=> "Jonh",
                "age"=>23
            ]
            ,
            [
                "name"=> "Anna",
                "age"=>34
            ]
        ];
        return view("profile",["users" => $users]);
    }
}
