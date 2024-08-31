@extends('layouts.app')

@section('content')


<!-- <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="border rounded-lg overflow-hidden ">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 ">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase ">Number</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase ">Prefix</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase ">Fullname</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase ">Suffix</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase ">Email</th>
                                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase ">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">{{$user->prefixname}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">{{ $user->fullname }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">{{ $user->suffixname }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                        <form action="{{ route('user.destroy', $user) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none ">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> -->

<!-- Table Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Card -->
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden ">
                    <!-- Header -->
                    <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 ">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 ">
                                Users
                            </h2>
                            <p class="text-sm text-gray-600 ">
                                Add users, edit and more.
                            </p>
                        </div>

                        <div>
                            <div class="inline-flex gap-x-2">
                                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent " href="{{ route('users.index.trashed') }}">
                                    Restore users
                                </a>

                                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="{{ route('user.create') }}">
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="M12 5v14" />
                                    </svg>
                                    Add user
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <table id="table-users" class="min-w-full divide-y divide-gray-200 ">
                        <thead class="bg-gray-50 ">
                            <tr>
                                <th scope="col" class="ps-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                                            Name
                                        </span>
                                    </div>
                                </th>


                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                                            Username
                                        </span>
                                    </div>
                                </th>


                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                                            Created
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-end"></th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 ">
                            @foreach ($users as $user)
                            <tr>
                                <td class="size-px whitespace-nowrap">
                                    <div class="ps-6 py-3">
                                        <div class="flex items-center gap-x-3">
                                            <img class="inline-block size-[38px] rounded-full"
                                                src="{{ $user->photo ? url('/storage/images/users/' . $user->photo) : url('/storage/images/img1.jpg') }}"
                                                alt="{{ $user->photo ? 'Avatar' : 'Default Avatar' }}">
                                            <div class="grow">
                                                <span class="block text-sm font-semibold text-gray-800 ">{{$user->prefixname}} {{$user->fullname}} {{$user->suffixname }}</span>
                                                <span class="block text-sm text-gray-500 ">{{$user->email}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="h-px w-72 whitespace-nowrap">
                                    <div class="px-6 py-3">
                                        <span class=" text-sm text-gray-800 ">{{$user->username}}</span>
                                    </div>
                                </td>


                                <td class="size-px whitespace-nowrap">
                                    <div class="px-6 py-3">
                                        <span class="text-sm text-gray-500 ">{{ $user->created_at->format('d M, H:i') }}</span>
                                    </div>
                                </td>

                                <td class="size-px whitespace-nowrap">

                                    <div class="px-6 py-1.5 flex gap-4">

                                        <a type="button" class="inline-flex items-center gap-x-1 text-sm text-green-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium " href="{{ route('user.show', $user) }}">
                                            View
                                        </a>

                                        <a type="button" class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium "
                                            href="{{ route('user.edit', $user) }}">
                                            Edit
                                        </a>
                                        <form action="{{ route('user.destroy', $user) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center gap-x-1 text-sm text-red-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium ">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!-- End Table -->

                    <!-- Footer -->
                    <div class="px-6 py-4  ">

                        {{ $users->links() }}

                    </div>
                    <!-- End Footer -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->
</div>
<!-- End Table Section -->



@endsection