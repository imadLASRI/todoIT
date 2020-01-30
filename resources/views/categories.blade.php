@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a Category</div>
                <div class="card-body">
                    <form action="{{ route('storeCategories') }}" method="POST" data-validate="parsley">
                        @csrf
                        <input type="text" name="name" placeholder="Name of the category" class="form-control" required> <br>
                        <textarea name="description" cols="50" rows="5" style="resize: none;" placeholder="Category description" class="form-control" required></textarea>
                        <button type="submit">Add Category</button>
                    </form>
                </div>
                <div class="card-header">
                    All your current categories
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
                <div class="card-body">
                        @foreach($categories as $category)
                        <form action="{{ route('updateCategory') }}" method="POST" data-validate="parsley">
                        @csrf
                            <label>Category:</label>
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control" required><br>
                            <input type="hidden" name="id" value="{{ $category->id }}" class="form-control" required>
                            <textarea name="description" cols="50" rows="5" style="resize: none;" placeholder="Category description" class="form-control" required>{{ $category->description }}</textarea>
                            <button type="submit" class="taskButton">Update</button>
                            <a href="deleteCategory/{{ $category->id }}" class="taskButton">Delete</a>
                            <br>
                        </form>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection