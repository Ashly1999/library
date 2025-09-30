@extends('layouts.app') <!-- This uses the layout we created -->

@section('title', 'Admin Panel') <!-- Title -->
@section('panel-title', 'Admin Panel') <!-- Sidebar title -->

@section('sidebar-links') <!-- Sidebar menu items -->
<li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-600">Dashboard</a></li>
<li><a href="{{route('details')}}" class="block py-2 px-4 rounded hover:bg-blue-600">User Details</a></li>
<li><a href="{{route('catview')}}" class="block py-2 px-4 rounded hover:bg-blue-600">Category</a></li>
<li><a href="{{route('view')}}" class="block py-2 px-4 rounded hover:bg-blue-600">Book Details</a></li>
<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block py-2 px-4 rounded hover:bg-blue-600">Logout</a></li>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
@endsection

@section('content') <!-- Main content -->
<h1 class="text-3xl font-bold mb-4">Welcome, {{ auth()->user()->name }}!</h1>
<p>This is your admin dashboard.</p>
@endsection