<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SlugController extends Controller
{
    public function making_slug($str)
    {
        $remove = array("@", "#", "(", ")", "*", "/", " ");
        return strtolower(str_replace($remove, "-", $str)).'-'.time();
    }
}
