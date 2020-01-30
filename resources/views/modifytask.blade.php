@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modify the Task</div>
                <div class="card-body style="box-sizing:border-box;>
                    <form action="{{ route('updateTask') }}" method="POST" data-validate="parsley">
                        @csrf
                        <!-- add hidden input to get the task id  -->
                        <input type="hidden" value="{{ $task->id }}" name="id" class="form-control" required>
                        <input name="name" type="text" value="{{ $task->name }}" style="width:400px;" class="form-control" required>
                        <label for="category_id">Category: </label>
                        <select name="category_id" class="form-control" required>
                            @foreach(Auth::user()->categories as $category)
                            <option value="{{ $category->id }}" 
                                {{ ($category->id == $task->category_id) ? 'selected' : '' }}
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <label for="status">Status: </label>
                        <select name="status" class="form-control" required>
                            <option value="Ongoing" {{ ($task->status == 'Ongoing') ? 'selected' : '' }}>Ongoing</option>
                            <option value="Done" {{ ($task->status == 'Done') ? 'selected' : '' }}>Done</option>
                        </select>
                        <textarea name="description" cols="50" rows="5" style="resize: none;" class="form-control" required>{{ $task->description }}</textarea>
                        <label for="start">Start</label>
                        <input type="date" name="start" value="{{ $task->start }}" class="form-control" required>
                        <label for="deadline">Dead line</label>
                        <input type="date" name="deadline" value="{{ $task->deadline }}" class="form-control" required>
                        <button type="submit">Modify Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection