@extends('layouts.app')

@section('adminContent')
<div class="card mb-3" >
    <div class="card-header">
        <div class="row flex-between-center">
            <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Edit Task</h5>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="row g-0 h-100">
            <div class="col-md-12 d-flex flex-center">
                <div class="p-4 p-md-5 flex-grow-1">
                    <form method="POST" action="{{ route('tasks.update', ['task' => $task->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input name="title" class="form-control @error('title') is-invalid @enderror" type="text" autocomplete="on" id="title" autofocus required value="{{ $task->title }}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input name="description" class="form-control @error('description') is-invalid @enderror" type="text" autocomplete="on" id="description" autofocus required value="{{ $task->description }}">
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Completed</label>
                            <select name="completed" class="form-select @error('completed') is-invalid @enderror" required>
                                <option value="1" {{ $task->completed ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ !$task->completed ? 'selected' : '' }}>No</option>
                            </select>
                            @error('completed')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Update Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
