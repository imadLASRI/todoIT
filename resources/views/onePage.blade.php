@extends('layouts.app')

@section('content')

<div class="container1">
    <div class="quickMenu">
        <div class="search">
            <label for="searchbar" style="color: peru;">Search</label> <input type="text" id="search" placeholder=" Look for a task..">
        </div>

        <div class="menu">
            <p class="quick">QUICK MENU</p>
            <div class="menuItems" id="dashboard">
                <p>Dashboard</p>
            </div>
            <div class="dashboard">
                <a href="" id="add">Add Tasks</a>
            </div>

            <p class="quick">PROJECTS</p>
            @foreach($categories as $category)
            <div class="projects">
                <a href="">{{ $category->name }}</a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="tasks">
        <div class="tasksHead">
            <p>Tasks</p>
        </div>

        <!-- data-mcs-theme="customScroll-theme" -->
        <div class="scrollContainer" >
            @foreach($tasks as $task)
            <div class="task">
                <div class="showTask">
                    <div class="taskName">
                        <span class="checkDone" data-id="{{ $task->id }}">
                            @if($task->status == 'Done')
                            <img src="img/checkbox-ok.png" width="20" alt="">
                        </span>
                        <label class="taskLabel" style="text-decoration: line-through;">{{ $task->name }}</label>
                        @else
                        <img src="img/checkbox.png" width="20" alt="">
                        </span>
                        <label class="taskLabel" style="text-decoration: none;">{{ $task->name }}</label>
                        @endif
                    </div>
                    <div class="taskControls">
                        <div class="category">
                            <p>{{ $task->category->name }}</p>
                        </div>
                        <div>
                            <p>{{ date('j M', strtotime($task->start)) }}</p>
                        </div>
                        <div>
                            <a href="" class="taskButton edit" data-id="{{ $task->id }}">Edit</a>
                            <a href="" class="taskButton delete" data-id="{{ $task->id }}">Delete</a>
                        </div>
                    </div>
                </div>

                <ul class="taskDetails">
                    <li><span class="highlight" id="status{{ $task->id }}">{{ $task->status }}</span></li>
                    <li> <span class="highlight deadLine">{{ date('j M Y', strtotime($task->deadline)) }}</span></li><br>
                    <li>{{ $task->description }}</li>
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modals -->
<div class="modalON" style="display: none;">
    <!-- my modals -->
    <div id="editModal" class="modal" style="display: none;">
        <div class="modal-content">
            <form action="{{ route('updateTask') }}" method="POST" data-validate="parsley">
                @csrf
                <input name="name" type="text" value="" id="name" class="form-control" required><br>

                <textarea name="description" value="" id="desc" cols="50" rows="5" style="resize: none;" class="form-control" required></textarea><br>

                <div class="flexbix">
                    <select id="cat" name="category_id" class="form-control" required>
                        @foreach(Auth::user()->categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <input style="" type="date" id="start" name="start" value="" class="form-control" required>
                    <input type="date" id="deadline" name="deadline" value="" class="form-control" required>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Save Modifications</button>

                <!-- hidden input to get the task id  -->
                <input type="hidden" value="" id="id" name="id" class="form-control" required>
                <select style="display: none;" id="state" name="status" class="form-control" required>
                    <option value="Ongoing">Ongoing</option>
                    <option value="Done">Done</option>
                </select>
            </form>
        </div>
    </div>

    <div id="addModal" class="modal" style="display: none;">
        <div class="modal-content">

            <form action="{{ route('storeTasks') }}" method="POST" data-validate="parsley">
                @csrf
                <input id="newTaskName" name="name" type="text" placeholder="TODO or not TODO" style="width:400px;" class="form-control" required autocomplete="off"><br>
                <label for="category_id">Category: </label><select name="category_id" id="newTaskCat">
                    @foreach(Auth::user()->categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select><br>
                <textarea id="newTaskDesc" name="description" cols="50" rows="5" style="resize: none;" placeholder="Task description" class="form-control" required></textarea><br>
                <label for="start">Starting date</label>
                <input id="newTaskStart" type="date" name="start" value="{{ date('Y-m-d') }}" class="form-control" required><br>
                <label for="deadline">Dead line</label>
                <input id="newTaskDead" type="date" name="deadline" value="{{ date('Y-m-d') }}" class="form-control" required><br>
                <button id="addTaskbtn" type="submit" class="btn btn-primary">Add Task</button>
            </form>

        </div>
    </div>

</div>
<!-- End modals -->
@endsection