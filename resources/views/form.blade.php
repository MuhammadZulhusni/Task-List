@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')
<!-- the purpose of this line is to dynamically set the title of the page based on whether the view is used for editing an existing task or adding a new task -->

@section('styles')
  <style>
    .error-message {
      color: red;
      font-size: 0.8rem;
    }
  </style>
@endsection

@section('content')
  <!-- Task Form -->
  <form method="POST"
    action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
    @csrf
    @isset($task)
      @method('PUT')
    @endisset
    
    <!-- Title Input -->
    <div class="mb-4">
      <label for="title">
        Title
      </label>
      <input type="text" name="title" id="title"
        class="{{ $errors->has('title') ? 'border-red-500' : '' }}"
        value="{{ $task->title ?? old('title') }}" />
      @error('title')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>

    <!-- Description Input -->
    <div class="mb-4">
      <label for="description">Description</label>
      <textarea name="description" id="description"
        class="{{ $errors->has('description') ? 'border-red-500' : '' }}"
        rows="5">{{ $task->description ?? old('description') }}</textarea>
      @error('description')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>

    <!-- Long Description Input -->
    <div class="mb-4">
      <label for="long_description">Long Description</label>
      <textarea name="long_description" id="long_description"
        class="{{ $errors->has('long_description') ? 'border-red-500' : '' }}"
        rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
      @error('long_description')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>

    <!-- Form Submission Buttons -->
    <div class="flex items-center gap-2">
      <button type="submit" class="btn">
        @isset($task)
          <!-- Update Task Button -->
          Update Task
        @else
          <!-- Add Task Button -->
          Add Task
        @endisset
      </button>
      <!-- Cancel Link -->
      <a href="{{ route('tasks.index') }}" class="link">Cancel</a>
    </div>
  </form>
  <!-- End of Task Form -->
@endsection
