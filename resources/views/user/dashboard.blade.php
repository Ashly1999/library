<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-green-700 text-white flex flex-col">
            <div class="p-6 text-center border-b border-green-600">
                <h2 class="text-2xl font-bold">User Panel</h2>
            </div>
            <nav class="flex-1 p-4">
                <ul class="space-y-3">
                    <li><a href="#" class="block py-2 px-4 rounded hover:bg-green-600">Dashboard</a></li>
                    <li><a href="{{route('register')}}" class="block py-2 px-4 rounded hover:bg-green-600">Add User</a></li>
                    <li><a href="{{route('details')}}" class="block py-2 px-4 rounded hover:bg-green-600">View User Details</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="block py-2 px-4 rounded hover:bg-green-600">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-10">
            <div class="bg-white shadow rounded p-6">
                <h1 class="text-3xl font-bold mb-4">Welcome, {{ auth()->user()->name }}!</h1>
                <p class="text-gray-700 text-lg">This is your user dashboard. Use the sidebar to navigate through your account.</p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                    <div class="bg-green-100 p-6 rounded shadow hover:bg-green-200 transitiown">
                        <h2 class="text-xl font-semibold">Profile</h2>
                        <p class="mt-2 text-gray-700">View and edit your profile information.</p>
                    </div>
                    <div class="bg-blue-100 p-6 rounded shadow hover:bg-blue-200 transition">
                        <h2 class="text-xl font-semibold">Orders</h2>
                        <p class="mt-2 text-gray-700">Check your orders and order status.</p>
                    </div>
                    <div class="bg-yellow-100 p-6 rounded shadow hover:bg-yellow-200 transition">
                        <h2 class="text-xl font-semibold">Settings</h2>
                        <p class="mt-2 text-gray-700">Manage your account preferences.</p>
                    </div>
                </div>
            </div>
        </main>

    </div>

</body>

</html>