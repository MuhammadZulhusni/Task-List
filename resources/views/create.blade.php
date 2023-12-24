<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

@extends('layouts.app')

@section('styles')
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
      height: 100vh;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    #bg-video {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    .overlay {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 34%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container {
      margin: 1px;
      height: auto;
      padding: 1px; /* Adjust the padding as needed */
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 30px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }   


    .form {
      width: 70%;
      height: 60%;
      display: grid;
      margin: 0 auto; /* Center the form horizontally */
    }

    form{
      display: grid;
      gap: 30px;
    }

    label {
      font-weight: bold;
      margin-bottom: 5px;
      margin: 0 auto; /* Center the form horizontally */
    }

    input,
    textarea {
      width: 10%; /* Adjust the width as needed */
      padding: 30px;
      border: 1px solid #ced4da;
      border-radius: 4px;
      box-sizing: border-box;
    }

    textarea {
      resize: vertical; /* Allow vertical resizing only */
    }

    .error-message {
      color: red;
      font-size: 0.8rem;
    }
  </style>
@endsection

@section('content')
  <!-- Add the background video -->
  <video autoplay muted loop id="bg-video">
    <source src="{{ url('media/ocean.mp4') }}" type="video/mp4">
  </video>

  <!-- Overlay for the form -->
  <div class="overlay">
    <div class="container">
      <!-- Title for the form -->
      <h2 class="text-center mb-4 text-black fs-2" style="font-family: 'Times New Roman', Times, serif; font-size: 3em;">
        Add Task
      </h2>

      <!-- Task creation form -->
      <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <!-- Title input -->
        <div>
          <b><center><label for="title">Title</label></center></b>
          <input type="text" name="title" id="title" class="form" value="{{ old('title') }}" />
          @error('title')
            <!-- Display error message if validation fails -->
            <center><p class="error-message">{{ $message }}</p></center>
          @enderror
        </div>

        <!-- Description textarea -->
        <div>
          <center><label for="description" class="label">Description</label></center>
          <textarea name="description" id="description" class="form">{{ old('description') }}</textarea>
          @error('description')
            <!-- Display error message if validation fails -->
            <center><p class="error-message">{{ $message }}</p></center>
          @enderror
        </div>

        <!-- Long Description textarea -->
        <div>
          <center><label for="long_description" class="label">Long Description</label></center>
          <textarea name="long_description" id="long_description" class="form">{{ old('long_description') }}</textarea>
          @error('long_description')
            <!-- Display error message if validation fails -->
            <center><p class="error-message">{{ $message }}</p></center>
          @enderror
        </div>

        <!-- Submit button -->
        <div>
          <center><button type="submit" class="btn btn-outline-primary">Add Task</button></center>
        </div>

        <!-- Back button -->
        <div>
          <center><a href="{{ route('tasks.index') }}" class="btn btn-outline-danger">Back</a></center>
        </div>
      </form>
    </div>
  </div>
@endsection

