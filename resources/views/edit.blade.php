@extends('layouts.app')

@section('styles')
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
        background: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .video-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: -1;
    }

    #bg-video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    form {
        background: rgba(255, 255, 255, 0.8); /* Transparent white background */
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.9);
        width: 400px;
        text-align: center;
        position: relative;
        z-index: 1;
        transition: background 0.3s ease, transform 0.3s ease; /* Adding transition for smooth effect */
    }

    form:hover {
        background: rgba(255, 255, 255, 0.9); /* Slightly less transparent on hover */
        transform: translate(0, -5px); /* Move the form up a bit on hover */
    }

    h1 {
        margin-bottom: 20px;
        color: #333;
        font-size: 9rem; /* Increase font size */
        font-weight: bold; /* Make it bold */
        text-transform: uppercase; /* Uppercase text */
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
        color: #333;
    }

    input,
    textarea {
        width: calc(100% - 16px);
        padding: 10px;
        margin-bottom: 20px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .error-message {
        color: red;
        font-size: 0.8rem;
        text-align: center; /* Center the error message */
    }

    button {
        background-color: #3498db;
        color: #fff;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #2980b9;
    }

    @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }
        100% {
            background-position: 100% 50%;
        }
    }

    .update-button {
      background-color: #3498db; /* Green background color */
      color: black; /* White text color */
      padding: 12px 20px; /* Padding for better visual */
      border: none; /* No border */
      border-radius: 4px; /* Rounded corners */
      cursor: pointer; /* Cursor pointer on hover */
      transition: background-color 0.3s ease; /* Smooth transition effect */
    }

    .update-button:hover {
      background-color: #3498db; /* Darker green on hover */
    }

    .back-button {
    display: inline-block;
    text-decoration: none;
    background-color: #3498db; /* Blue background color */
    color: #fff; /* White text color */
    padding: 10px 20px; /* Padding for better visual */
    border-radius: 4px; /* Rounded corners */
    cursor: pointer; /* Cursor pointer on hover */
    transition: background-color 0.3s ease; /* Smooth transition effect */
    }

    .back-button:hover {
      background-color: #2980b9; /* Darker blue on hover */
    }

    .arrow {
      margin-right: 5px; /* Adjust spacing between arrow and text */
    }
</style>
@endsection

@section('content')
<div class="video-background">
    <!-- Video background for the form -->
    <video autoplay muted loop id="bg-video">
        <source src="{{ url('media/ocean.mp4') }}" type="video/mp4">
    </video>
</div>

<!-- Task update form -->
<form method="POST" action="{{ route('tasks.update', ['task' => $task->id]) }}">
    @csrf
    @method('PUT') <!-- Using the HTTP PUT method for update -->

    <b><h1>Edit Task</h1></b>
    <br>

    <!-- Title input -->
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $task->title }}" />
        @error('title')
        <!-- Display error message if validation fails -->
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <!-- Description textarea -->
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="5">{{$task->description}}</textarea>
        @error('description')
        <!-- Display error message if validation fails -->
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <!-- Long Description textarea -->
    <div>
        <label for="long_description">Long Description</label>
        <textarea name="long_description" id="long_description" rows="10">{{$task->long_description}}</textarea>
        @error('long_description')
            <!-- Display error message if validation fails -->
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <!-- Submit button -->
    <div>
      <button type="submit" class="update-button">Update Task</button>
    </div>

    <br>

    <!-- Back button to return to the task list -->
    <div>
      <a href="{{ route('tasks.index') }}" class="back-button">
        <span class="arrow">←</span> Go back to the task list
      </a>
    </div>
</form>
@endsection

