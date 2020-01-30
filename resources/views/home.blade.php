@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p>Welcome home {{ Auth::user()->name }}</p>
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{$errors->first()}}
                    </div>
                    @endif
                </div>
                <a href="{{ route('Task') }}" class="taskButton">{{ trans_choice('connect.task',10) }}</a>
                <a href="{{ route('Category') }}" class="taskButton">CATEGORIES</a>
            </div>

            <div class="card">
                <div class="card-header">All Your Current {{ trans_choice('connect.task',10) }}</div>
                <div class="card-body">
                    @foreach($tasks as $task)
                    <div class="task">
                        <label class="taskLabel"> Task: {{ $task->name }}</label>
                        <ul class="taskDetails">
                            <li>Category: {{ $task->category->name }}</li>
                            <li>Description: {{ $task->description }}</li>
                            <li>Status: <span id="status{{ $task->id }}">{{ $task->status }}</span></li>
                            <li>Start: {{ date('m-d-Y', strtotime($task->start)) }}</li>
                            <li>Deadline: {{ date('m-d-Y', strtotime($task->deadline)) }}</li>
                        </ul>
                    </div>
                    <a href="" class="taskButton makeItDone" data-id="{{ $task->id }}">Mark as Done</a>
                    <a href="editTask/{{ $task->id }}" class="taskButton ">Edit</a>
                    <a href="" class="taskButton delete" data-id="{{ $task->id }}">Delete</a>
                    <br>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
        
    </div>
</div>
</div>
@endsection