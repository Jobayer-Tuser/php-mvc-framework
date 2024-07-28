<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Provider\Attributes\{Post};
use Provider\Attributes\Get;


class ServiceController
{

    #[Get("/getQuery")]
    public function index()
    {
//        Database::table("product")
//            ->select("name", "price", "date")
//            ->join("roles", "roles.id", "=", "users.role_id")
//            ->rightJoin("roles", "roles.id", "=", "users.role_id")
//            ->leftJoin("roles", "roles.id", "=", "users.role_id")
//            ->where("id" , "=" , 20)
//            ->where("name" , "!=", "Jobayer")
//            ->orWhere("name", "=>", 10)
//            ->orderBy("id")
//            ->orderBy("name", "desc")
//            ->limit(20)
//            ->offset(20)
//            ->getQuery();
//
//        Database::table("product")->insert(['name' => "jobyaer"]);
//        Database::table("product")->where(['id', "=", 1])->update(['name' => "tuser"]);
//        Database::table("product")->where(['id', "=", 1])->delete();

        return Admin::select("admin_name", "admin_email")->getQuery();

        $data = ['name' => "Jobayer"];
        return view("service.dashboard", $data);
    }

    #[Post("/store")]
    public function store() : void
    {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
}