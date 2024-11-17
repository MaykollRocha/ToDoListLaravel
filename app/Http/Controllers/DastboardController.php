<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\afazer;

class DastboardController extends Controller
{
    public function index()
    {
        $todos = afazer::where('id_user', auth()->user()->id)->get();
        return view('dashboard.index', compact('todos') );
    }
}
