<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="container mx-auto">
                        <h1 class="text-2xl font-bold mb-5">Simple Time Tracker</h1>

                        <!-- Start Time Tracking -->
                        <form action="{{ route('time-tracker.start') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                                Start Tracking
                            </button>
                        </form>

                        <!-- Display Active Time Entries -->
                        <div class="mt-10">
                            <h2 class="text-xl font-semibold mb-3">Active Time Entries</h2>
                            @foreach($entries as $entry)
                                @if(!$entry->end_time)
                                    <div class="bg-white p-4 rounded shadow mb-3">
                                        <p>Started at: {{ $entry->start_time }}</p>
                                        <form action="{{ route('time-tracker.stop', $entry->id) }}" method="POST" class="mt-3">
                                            @csrf
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">
                                                Stop Tracking
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <!-- Display All Time Entries -->
                        <div class="mt-10">
                            <h2 class="text-xl font-semibold mb-3">All Time Entries</h2>
                            @foreach($entries as $entry)
                                <div class="bg-white p-4 rounded shadow mb-3">
                                    <p>Start Time: {{ $entry->start_time }}</p>
                                    <p>End Time: {{ $entry->end_time ?? 'In Progress' }}</p>
                                    <p>Duration: {{ $entry->end_time ? $entry->start_time->diffForHumans($entry->end_time, true) : 'In Progress' }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
