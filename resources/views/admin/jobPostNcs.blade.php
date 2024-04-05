@extends('layouts.admin')
@section('content')
<div class="px-4 mx-auto mt-5 mb-10 max-w-7xl">
    <div class="flex justify-between w-full">
        <div class="ml-5 text-sm font-semibold">
            Employment News
        </div>

        @if(session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => { show = false },3000)" x-show="show"  class="flex items-center p-2 mb-4 text-white bg-green-600 rounded" >
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 pt-1 mr-3">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
      <span>
        {{ session('success') }}
      </span>
    </div>
    @endif




        
        {{-- @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            <strong>Success !</strong> {{ session('success') }}
        </div>
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif --}}
        <div>
            {{-- @if ($unpublished > 0)
            <a href="{{ route('unpublished.job') }}"
                class="px-4 py-1 mr-3 text-base font-medium text-black rounded bg-empex-yellow hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-600">
                ({{ $unpublished }}) unpublished jobs post
            </a>
            @endif --}}

            <a href="{{ route('create.jobs.post.Ncs') }}"
                class="px-4 py-1 text-base font-medium text-white rounded bg-empex-green hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                Add
            </a>
        </div>

    </div>

    <div class="mt-5">
        <div class="flex flex-col w-full">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b shadow">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-sm font-medium tracking-wide text-left uppercase">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-sm font-medium tracking-wide text-left uppercase">
                                        Organization Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-sm font-medium tracking-wide text-left uppercase">
                                        No of Posts
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-sm font-medium tracking-wide text-left uppercase">
                                        Due Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium tracking-wide text-right uppercase">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($jobs as $job)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm whitespace-nowrap">
                                        {{ $job->JobTitle }}
                                    </td>
                                    {{-- @else --}}
                                    <td class="px-6 py-4 text-sm whitespace-nowrap">
                                        {{ $job->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm whitespace-nowrap">
                                        {{ $job->NumberofOpenings }}
                                    </td>
                                    <td class="px-6 py-4 text-sm whitespace-nowrap">
                                        {{ date('d-M-Y', strtotime($job->JobPostExpiryDate)) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <a href="{{ route('edit.job.ncs', $job->id) }}"
                                            class="text-indigo-600 dark:text-indigo-500 hover:text-indigo-900 dark:hover:text-indigo-700">Edit</a>
                                    </td>
                                    <td>

                                        @livewire('delete-ncs-job', ['id' => $job->id])
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap" colspan="5">Jobs not found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="py-2">
                {{ $jobs->onEachSide(1)->links() }}
            </div>
        </div>
    </div>

</div>
@endsection