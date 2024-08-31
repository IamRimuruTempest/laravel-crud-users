@extends('layouts.app')

@section('content')

<!-- Card Section -->
<div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 mx-auto"><!-- Card -->
    <div class="bg-white rounded-xl shadow p-4 sm:p-7 ">
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-800 ">
                Profile
            </h2>
            <p class="text-sm text-gray-600 ">
                Manage your name, password and account settings.
            </p>
        </div>
        <form method="POST" action="{{ route('user.update', $user) }}" enctype=multipart/form-data>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="photo-icon" class="block mb-2 text-sm  text-gray-900 ">Photo <span
                        class="text-xs text-gray-500">(SVG, PNG or JPG)</span></label>
                <div class="relative">
                    <label for="file-input" class="sr-only">Choose file</label>
                    <input type="file" name="photo" id="photo" class="block w-full border border-gray-300 rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                            file:bg-gray-50 file:border-0
                            file:me-4
                            file:py-2.5 file:px-4
                           ">

                </div>

                <div class="mt-3 hidden">
                    <div class="relative">
                        <input name="old_photo" type="text" id="old_photo"
                            value="{{ $user->photo }}"
                            class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 ">
                    </div>

                </div>

            </div>

            <div class="mb-3 flex gap-3">
                <div class="w-32">
                    <label for="prefixname-icon" class="block mb-2 text-sm  text-gray-900">Prefix <span
                            class="text-xs text-gray-500">(Mr,Mrs or Ms)</span></label>
                    <div class="relative flex gap-3">
                        <input name="prefixname" type="text" id="prefixname" value="{{ $user->prefixname }}"
                            class="w-32 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 ">
                    </div>
                    @error('prefixname')
                    <span class="text-red-600 text-xs" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="firstname-confirm" class="block mb-2 text-sm  text-gray-900">First Name</label>
                    <div class="relative flex gap-3">
                        <input name="firstname" type="text" id="firstname" required value="{{ $user->firstname }}"
                            class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    </div>
                    @error('firstname')
                    <span class="text-red-600 text-xs" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="middlename-confirm" class="block mb-2 text-sm  text-gray-900">Middle Name</label>
                    <div class="relative flex gap-3">
                        <input name="middlename" type="text" id="middlename" value="{{ $user->middlename }}"
                            class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    </div>
                    @error('middlename')
                    <span class="text-red-600 text-xs" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="lastname-confirm" class="block mb-2 text-sm  text-gray-900">Last Name</label>
                    <div class="relative flex gap-3">
                        <input name="lastname" type="text" id="lastname" required value="{{ $user->lastname }}"
                            class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    </div>
                    @error('lastname')
                    <span class="text-red-600 text-xs" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="w-24">
                    <label for="suffixname-confirm" class="block mb-2 text-sm  text-gray-900">Suffix</label>
                    <div class="relative flex gap-3">
                        <input name="suffixname" type="text" id="suffixname" value="{{ $user->suffixname }}"
                            class="w-24 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 ">
                    </div>
                    @error('suffixname')
                    <span class="text-red-600 text-xs" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 flex gap-3">
                <div class="w-full">
                    <label for="username-icon" class="block mb-2 text-sm  text-gray-900">Username</label>
                    <div class="relative flex gap-3">
                        <input name="username" type="text" id="username" required value="{{ $user->username }}"
                            class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="username">
                    </div>
                    @error('username')
                    <span class="text-red-600 text-xs" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="email-icon" class="block mb-2 text-sm  text-gray-900">Email</label>
                    <div class="relative flex gap-3">
                        <input name="email" type="email" id="email" required value="{{ $user->email }}"
                            class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="juandelacruz@gmail.com">
                    </div>
                    @error('email')
                    <span class="text-red-600 text-xs" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 flex gap-3">
                <div class="w-full">
                    <label for="password-icon" class="block mb-2 text-sm  text-gray-900">Password</label>
                    <div class="relative flex gap-3">
                        <input name="password" type="password" id="password"
                            class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="password">
                    </div>
                    @error('password')
                    <span class="text-red-600 text-xs" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="password-confirm" class="block mb-2 text-sm  text-gray-900">Confirm Password</label>
                    <div class="relative flex gap-3">
                        <input name="password_confirmation" type="password" id="password-confirm"
                            class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="juandelacruz@gmail.com">
                    </div>
                </div>
                @error('password_confirmation')
                <span class="text-red-600 text-xs" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type-icon" class="block mb-2 text-sm  text-gray-900 ">Usertype</label>
                <div class="relative">

                    <select name="type" id="type"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option value="user" {{ $user->type == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $user->type == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>


                </div>


            </div>


            <div class="mt-5 flex justify-end gap-x-2">
                <button type="button" onclick="window.history.back();"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none ">
                    Cancel
                </button>
                <button type="submit"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none ">
                    Update changes
                </button>
            </div>

        </form>
    </div>
    <!-- End Card -->
</div>
<!-- End Card Section -->

@endsection