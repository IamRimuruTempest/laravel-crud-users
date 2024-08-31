@extends('layouts.app')

@section('content')

<div class="w-full max-w-sm bg-white border border-gray-300 rounded-lg shadow mx-auto">
    <div class="flex justify-end px-4 pt-4">
        <a href="/users" class="inline-block text-gray-500    focus:ring-4 focus:outline-none focus:ring-gray-200  rounded-lg text-sm p-1.5" type="button">

            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-square w-6 h-6" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
            </svg>
        </a>

    </div>
    <div class="flex flex-col items-center py-10">
        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Bonnie image" />
        <h5 class="mb-1 text-xl font-medium text-gray-900 ">{{$user->prefixname}}. {{$user->fullname}} {{$user->suffixname}}</h5>
        <span class="text-sm text-gray-500 ">{{$user->username}}</span>
        <div class="flex mt-4 md:mt-6">
            <p class="mb-3 text-sm text-gray-700 ">Email: {{$user->email}}</p>
        </div>
    </div>
</div>



@endsection