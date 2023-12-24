<!-- ni homepage -->

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

@extends('layouts.app')
@section('content')

    <!-- Add the background video -->
    <video autoplay muted loop id="bg-video">
        <source src="{{ url('media/ocean.mp4') }}" type="video/mp4">
    </video>

<div class="overlay">
    <!-- Overlay container with text content -->
    <div class="container text-overlay">

        <!-- Animated text heading -->
        <h1 class="ml6 text-center mb-4 text-white fs-2" style="font-family: 'Times New Roman', Times, serif; font-size: 3em;">
            <span class="text-wrapper">
                <span class="letters">The List of Tasks</span>
            </span>
        </h1>

        <!-- Task list container with a specified width for the form -->
        <div class="task-list form-width">

            <!-- Loop through each task -->
            @forelse ($tasks as $task)
                <div class="task-item">
                    <!-- Display task title as a link -->
                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                       class="{{ $task->completed ? 'completed' : '' }}">
                        {{ $task->title }}
                    </a>
                </div>
            @empty
                <!-- Display a message when there are no tasks -->
                <div class="no-tasks">There are no tasks!</div>
            @endforelse

            <br>

            <!-- Navigation link to add a new task -->
            <nav class="mb-4">
                <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task!</a>
            </nav>

            @if ($tasks->count())
                <!-- Display pagination links if there are tasks -->
                <nav class="mt-4 text-white">
                    {{ $tasks->links() }}
                </nav>
            @endif
        </div>
    </div>
</div>


<style>
        body {
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
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container.text-overlay {
            position: relative;
            z-index: 1;
            text-align: center; /* Center content in the container */
        }

        .task-list {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .task-item {
            margin-bottom: 10px;
            transition: background-color 0.3s ease; /* Smooth transition effect for background-color */
        }

        .task-item:hover {
            background-color: lightskyblue; /* Background color change on hover */
            border-radius: 4px; /* Optional: Add rounded corners on hover */
        }

        .completed {
            text-decoration: line-through;
        }

        .no-tasks {
            font-style: italic;
        }

        .form-width {
          max-width: 500px; /* Adjust the max-width as needed */
          width: 100%; /* Make the form width 100% of its container */
          margin: 0 auto; /* Center the form horizontally */
          padding: 20px; /* Add padding as needed */
          box-sizing: border-box; /* Include padding and border in the element's total width and height */
        }

        /* Additional styles for form height */
        .form-height {
          height: 200px; /* Set the height as needed */
          overflow-y: auto; /* Add vertical scroll if the content exceeds the height */
        }

        .ml6 {
            position: relative;
            font-weight: 900;
            font-size: 3.3em;
        }

        .ml6 .text-wrapper {
            position: relative;
            display: inline-block;
            padding-top: 0.2em;
            padding-right: 0.05em;
            padding-bottom: 0.1em;
            overflow: hidden;
        }

        .ml6 .letter {
            display: inline-block;
            line-height: 1em;
        }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

<script>
    // Wrap every letter in a span
    var textWrapper = document.querySelector('.ml6 .letters');
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline({ loop: true })
        .add({
            targets: '.ml6 .letter',
            translateY: ["1.1em", 0],
            translateZ: 0,
            duration: 750,
            delay: (el, i) => 50 * i
        }).add({
            targets: '.ml6',
            opacity: 0,
            duration: 1000,
            easing: "easeOutExpo",
            delay: 1000
        });
</script>

@endsection
