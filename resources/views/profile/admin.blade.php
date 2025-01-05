@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-gray-100">
    <!-- Profile Card -->
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-3xl mx-auto">
        <!-- Header -->
        <div class="flex items-center mb-6">
            <!-- Back Button -->
            <a href="{{ route('admin.dashboard') }}"
                class="bg-gray-100 shadow-sm rounded-full p-2 hover:bg-gray-200 transition flex items-center justify-center"
                style="width: 40px; height: 40px;">
                <i class="fas fa-arrow-left text-green-700 text-lg"></i>
            </a>
            <h1 class="text-2xl font-bold text-green-700 ml-4">Admin Profile</h1>
        </div>

        <!-- Profile Avatar -->
        <div class="flex justify-center mb-6">
            <div class="h-24 w-24 rounded-full bg-green-100 flex items-center justify-center">
                <i class="fas fa-user text-green-500 text-5xl"></i>
            </div>
        </div>

        <!-- Profile Form -->
        <form>
            <div class="grid grid-cols-1 gap-4">
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-gray-700 font-semibold">Name</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}"
                        class="w-full border border-gray-300 rounded-md shadow-sm bg-gray-50 px-3 py-2 focus:ring-green-500 focus:border-green-500"
                        disabled>
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-gray-700 font-semibold">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}"
                        class="w-full border border-gray-300 rounded-md shadow-sm bg-gray-50 px-3 py-2 focus:ring-green-500 focus:border-green-500"
                        disabled>
                </div>

                <!-- Role Field -->
                <div>
                    <label for="role" class="block text-gray-700 font-semibold">Role</label>
                    <input type="text" id="role" name="role" value="{{ ucfirst($user->role) }}"
                        class="w-full border border-gray-300 rounded-md shadow-sm bg-gray-50 px-3 py-2 focus:ring-green-500 focus:border-green-500"
                        disabled>
                </div>
            </div>

            <!-- Actions -->
            <!-- <div class="mt-6 flex justify-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md shadow hover:bg-red-600 transition">
                        Logout
                    </button>
                </form>
            </div> -->
        </form>
    </div>
</div>
@endsection
