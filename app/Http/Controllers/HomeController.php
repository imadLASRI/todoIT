<?php

namespace App\Http\Controllers;

use App\Category;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // added orderBy...
        $tasks = Task::where('user_id', Auth::user()->id)->orderBy('deadline', 'asc')->get();
        
        // var_dump($tasks);dd();

        $categories = Category::where('user_id', Auth::user()->id)->get();
        // print_r($tasks);
        // print_r($categories);dd();


        return view('onePage', compact('tasks', 'categories'));
        // return view('home', compact('tasks'));
    }
}
