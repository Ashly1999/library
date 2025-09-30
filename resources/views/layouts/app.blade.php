<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title> <!-- Page title changes per page -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Sidebar -->
    <aside class="w-64 bg-blue-700 text-white fixed h-full p-6">
        <h2 class="text-2xl font-bold mb-6">@yield('panel-title')</h2>
        <ul class="space-y-3">
            @yield('sidebar-links') <!-- Menu items change per page -->
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 p-10">
        @yield('content') <!-- Page content goes here -->
    </main>

</body>

</html>