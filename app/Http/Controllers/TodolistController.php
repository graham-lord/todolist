<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    
    public function index() {
        $todolists = Todolist::all();
        return view('welcome', compact('todolists'));
    }
 

    public function store(Request $request) {
        $todo = $request->validate([
            'content' => 'required'
        ]);

        Todolist::create($todo);
        return back();
    }

   
    public function destroy(Todolist $todolist) {
        $todolist->delete();
        return back();
    }
}
