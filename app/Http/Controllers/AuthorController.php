<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = User::all();
        
        // Vue
        return view('authors.index', [
            'title' => 'Bienvenue',
            'authors' => $authors,
        ]);
    }
}
