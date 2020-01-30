<?php

namespace App\Http\Controllers;

use App\Category;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monolog\Formatter\ElasticsearchFormatter;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('user_id', Auth::user()->id)->get();

        return view('categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'user_id' => Auth::user()->id
        ]);

        if ($category->save()) {
            return redirect()->back()->with('message', 'Category added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category = Category::find($request['id']);

        $category->update([
            'id' => $request['id'],
            'description' => $request['description'],
            'name' => $request['name'],
            'user_id' => Auth::user()->id
        ]);

        return redirect()->back()->with('message', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $usedinTask = Task::where('category_id', $category->id)->get();

        if(!$usedinTask->count()){
            $category->delete();
            return redirect()->back()->with('message', 'Category deleted!');
        }
        else{
            return redirect()->back()->withErrors('Category currently used');
        }
    }
}
