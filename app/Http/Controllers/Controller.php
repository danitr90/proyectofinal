<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use App\Models\Races;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(Request $request)
    {
        $value = $request->session()->get('user');
        $news = Noticias::ReturnAll();
        $news = $news->take(4);
        $races = Races::ReturnAll();
        return view('products', compact('news', 'races'));
    }
}
