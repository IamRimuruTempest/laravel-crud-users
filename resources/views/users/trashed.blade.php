@extends('layouts.app')

@section('content')



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
                                Deleted users
                            </h2>
                            <p class="text-sm text-gray-600 ">
                                Restore users and more.
                            </p>
                        </div>

                        <div>
                            <div class="inline-flex gap-x-2">
                                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent " href="/users">
                                    Back
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
                                            Deleted
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
                                        <span class="text-sm text-gray-500 ">{{ $user->deleted_at->format('d M, H:i') }}</span>
                                    </div>
                                </td>
                                <td class="size-px whitespace-nowrap">
                                    <div class="px-6 py-1.5 flex gap-4">
                                        <form action="{{ route('user.restore', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium ">
                                                Restore
                                            </button>
                                        </form>
                                        <form action="{{ route('user.force-delete', $user->id) }}"
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