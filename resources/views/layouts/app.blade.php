<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel 10 Task List App</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>

  <style type="text/tailwindcss">
    .link {
      /* Use the Tailwind CSS classes directly */
      font-weight: 500;
      color: #4b5563;
      text-decoration: underline;
      text-decoration-color: fuchsia;
    }

    label {
      /* Use the Tailwind CSS classes directly */
      display: block;
      text-transform: uppercase;
      color: #374151;
      margin-bottom: 0.5rem;
    }

    input,
    textarea {
      /* Use the Tailwind CSS classes directly */
      box-shadow: 0 1px 2px rgba(74, 85, 104, 0.05);
      appearance: none;
      border: 1px solid #e5e7eb;
      width: 100%;
      padding: 0.5rem 0.75rem;
      color: #374151;
      outline: none;
    }

    .error {
      /* Use the Tailwind CSS classes directly */
      color: #ef4444;
      font-size: 0.875rem;
    }
  </style>
  <!--Purpose: This directive is a placeholder for including additional styles in the head section of the HTML document.
      Usage: Child views can extend this section and inject their specific styles by using the @section('styles') directive in the child view. --> 
  @yield('styles')
</head>


<body class="container mx-auto mt-10 mb-10 max-w-lg">
  <!-- Apply margin, maximum width, and center the container horizontally -->

  <h1 class="mb-4 text-2xl">@yield('title')</h1>
  <!-- Display the title in an h1 element with specific styling -->

  <div>
    <div x-data="{ flash: true }">
      <!-- Initialize Alpine.js state for flash message visibility -->

      @if (session()->has('success'))
        <!-- Check if a success message exists in the session -->

        <div x-show="flash"
          class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700"
          role="alert">
          <!-- Display a success message with specific styling -->

          <strong class="font-bold">Success!</strong>
          <div>{{ session('success') }}</div>

          <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <!-- Add a close button with an SVG icon -->

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke-width="1.5" @click="flash = false"
              stroke="currentColor" class="h-6 w-6 cursor-pointer">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </span>
        </div>
      @endif
      @yield('content')
      <!-- Display the content section, which is expected to be defined in child views -->
      <!-- Child views use the @section('content') directive to define the content that should replace or extend the content section in the parent view -->
    </div>
  </div>
</body>
</html>