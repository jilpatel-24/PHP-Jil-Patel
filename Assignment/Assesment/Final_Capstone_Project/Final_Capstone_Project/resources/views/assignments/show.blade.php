<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $assignment->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-bold mb-2">Description</h3>
                        <div class="prose max-w-none text-gray-700">
                            {{ $assignment->description }}
                        </div>
                    </div>
                    <div class="mb-6">
                        <p class="font-bold">Due Date: <span class="{{ $assignment->due_date->isPast() ? 'text-red-600' : 'text-green-600' }}">{{ $assignment->due_date->format('l, F j, Y g:i A') }}</span></p>
                    </div>
                </div>
            </div>

            <!-- Submission Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Submission</h3>
                    
                    @if(isset($submission))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                            <p class="font-bold">Submitted!</p>
                            <p>You submitted this assignment on {{ $submission->submitted_at->format('M d, Y H:i:s') }}.</p>
                            <p class="mt-2 text-sm">File: {{ basename($submission->file_path) }}</p>
                        </div>
                        <p class="text-gray-600 mb-2">If you wish to resubmit, upload a new file below.</p>
                    @endif

                    <form action="{{ route('assignments.submit', $assignment) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Upload File</label>
                            <input type="file" name="file" class="w-full border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700">
                                {{ isset($submission) ? 'Resubmit Assignment' : 'Submit Assignment' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
