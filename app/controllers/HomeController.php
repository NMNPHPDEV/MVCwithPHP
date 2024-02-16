<?php

namespace App\Controllers;

use App\Models\User;

class HomeController
{
    public function index()
    {
        // Model kullanımı
        $user = new User($db);
        $users = $user->all();
        echo 'adsf';
        // View'a veri gönderme
        require_once '../views/home.php';
    }
}

