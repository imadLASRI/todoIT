@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div>
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                </div>
                <div class="card-header">NOt the one used -- Add something todo</div>
                <div class="card-body tasks">
                    <form action="{{ route('storeTasks') }}" method="POST" data-validate="parsley">
                        @csrf
                        <input name="name" type="text" placeholder="TODO or not TODO" style="width:400px;" class="form-control" required><br>
                        <label for="category_id">Category: </label><select name="category_id">
                            @foreach(Auth::user()->categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select><br>
                        <textarea name="description" cols="50" rows="5" style="resize: none;" placeholder="Task description" class="form-control" required></textarea><br>
                        <label for="start">Starting date</label>
                        <input type="date" name="start" value="{{ date('Y-m-d') }}" class="form-control" required><br>
                        <label for="deadline">Dead line</label>
                        <input type="date" name="deadline" value="{{ date('Y-m-d') }}" class="form-control" required><br>
                        <button type="submit">Add Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection