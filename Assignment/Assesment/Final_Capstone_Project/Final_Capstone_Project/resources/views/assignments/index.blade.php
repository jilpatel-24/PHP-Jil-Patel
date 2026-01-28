<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assignments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     <div class="mb-4 flex justify-between">
                        <h3 class="text-lg font-medium">Available Assignments</h3>
                        <a href="{{ route('assignments.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Create New Assignment</a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($assignments as $assignment)
                        <div class="border rounded-lg p-4 hover:shadow-lg transition">
                            <h4 class="text-xl font-bold mb-2">{{ $assignment->title }}</h4>
                            <p class="text-gray-600 mb-2 line-clamp-2">{{ $assignment->description }}</p>
                            <p class="text-sm font-semibold {{ $assignment->due_date->isPast() ? 'text-red-500' : 'text-green-500' }}">
                                Due: {{ $assignment->due_date->format('M d, Y H:i') }}
                            </p>
                            <div class="mt-4">
                                <a href="{{ route('assignments.show', $assignment) }}" class="block text-center bg-gray-800 text-white py-2 rounded hover:bg-gray-700">View & Submit</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if($assignments->isEmpty())
                        <p class="text-gray-500 italic">No assignments available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
