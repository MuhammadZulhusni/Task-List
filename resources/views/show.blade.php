<!-- Ni page untuk display datails after clik title from homepage -->
@extends('layouts.app')

@section('content')
    <!-- Video Background -->
<div class="video-background">
    <video autoplay muted loop id="bg-video">
        <source src="{{ url('media/ocean.mp4') }}" type="video/mp4">
    </video>
</div>

<!-- Task Details Container -->
<div class="task-details-container">

    <!-- Task Details Section -->
    <div class="task-details">
        <!-- Task Title -->
        <b><h1 class="mb-4 text-black fs-2">{{ $task->title }}</h1></b>

        <!-- Task Description -->
        <p class="mb-4 text-slate-700">{{ $task->description }}</p>

        <!-- Display Long Description if available -->
        @if ($task->long_description)
            <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
        @endif

        <!-- Task Creation and Update Timestamps -->
        <p class="mb-4 text-sm text-slate-500">
            Created {{ $task->created_at->diffForHumans() }} • Updated {{ $task->updated_at->diffForHumans() }}
        </p>

        <!-- Task Completion Status -->
        <p class="mb-4">
            @if ($task->completed)
                <span class="font-medium text-green-500">Completed</span>
            @else
                <span class="font-medium text-red-500">Not completed</span>
            @endif
        </p>

        <!-- Task Action Buttons -->
        <div class="flex gap-2 justify-center">
            <!-- Edit Task Button -->
            <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn">Edit</a>

            <!-- Toggle Task Completion Button -->
            <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
                @csrf
                @method('PUT')
                <button type="submit" class="btn">
                    Mark as {{ $task->completed ? 'not completed' : 'completed' }}
                </button>
            </form>

            <!-- Delete Task Button -->
            <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn">Delete</button>
            </form>
        </div>
    </div>
</div>


<center>
  <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="back-link">
          <span class="arrow">←</span> Go back to the task list
        </a>
  </div>
</center>


<style>
/* Video Background Styling */
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
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Task Details Container Styling */
        .task-details-container {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white; /* Adjust text color for better visibility */
        }

        .task-details {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        .btn {
            /* Add your button styles here */
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: royalblue;
        }

        .justify-center {
          justify-content: center;  
        }

        /* Your existing styles */

        /* Back link styling */
        .back-link {
          display: inline-block;
          text-decoration: none;
          color: white; /* Link color */
          font-weight: bold;
          font-size: 16px; /* Adjust font size as needed */
        }

        .back-link:hover {
          text-decoration: underline;
        }

        .arrow {
          margin-right: 5px; /* Adjust spacing between arrow and text */
        }

        /* Additional styling if you want to change the arrow color */
        .arrow::before {
          content: '←';
            color: white; /* Arrow color */
          }
</style>
@endsection
