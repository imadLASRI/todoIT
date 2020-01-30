<?php

namespace App\Http\Controllers;

use App\Category;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('user_id', Auth::user()->id);


        if($category->count()){
            return view('tasks');
        }else{
            return redirect()->back()->withErrors('Add a category first');
        }
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
        $task = Task::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'category_id' => $request['category_id'],
            'user_id' => Auth::user()->id,
            'start' => $request['start'],
            'deadline' => $request['deadline'],
        ]);

        $itsCategory = Category::find($request['category_id']);

        return response()->json(['task' => $task, 'itsCategory' => $itsCategory->name]);
        // return redirect()->back()->with('message', 'Task added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);

        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $task = Task::find($request["id"]);
        
        $task->update([
            'id' => $request['id'],
            'name' => $request['name'],
            'description' => $request['description'],
            'category_id' => $request['category_id'],
            'status' => $request['status'],
            'user_id' => Auth::user()->id,
            'start' => $request['start'],
            'deadline' => $request['deadline'],
        ]);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return response()->json($task->id);
    }

    public function done(Request $request){
        $task = Task::find($request['id']);

        ($task->status == "Done") ? $task->status = "Ongoing" : $task->status = "Done";
        $task->save();

        return response()->json($task->status);
    }
}
