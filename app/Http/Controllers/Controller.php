<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
<<<<<<< HEAD
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
=======
    public function index()
    {
        return view('dashboard.index');
    }
>>>>>>> 70f6a11f6dbf0d4cfa10d7db3cb4d4e9133cbd6b
}
