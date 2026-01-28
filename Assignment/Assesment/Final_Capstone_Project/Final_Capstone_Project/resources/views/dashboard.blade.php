<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Quick Links -->
            <div class="flex space-x-4">
                <a href="{{ route('exams.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    + New Exam
                </a>
                <a href="{{ route('exams.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Manage Exams
                </a>
                <a href="{{ route('assignments.create') }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                   + New Assignment
                </a>
           </div>

            <!-- Upcoming Exams -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4 text-indigo-700">📅 Upcoming Exams</h3>
                    @if(isset($upcomingExams) && $upcomingExams->count() > 0)
                        <ul class="divide-y divide-gray-200">
                            @foreach($upcomingExams as $exam)
                                <li class="py-2">
                                    <div class="flex justify-between">
                                        <div>
                                            <span class="font-semibold text-lg">{{ $exam->title }}</span> 
                                            <span class="text-gray-500 text-sm">({{ $exam->subject }})</span>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-sm font-bold text-gray-700">{{ $exam->start_time->format('M d, Y h:i A') }}</div>
                                            <div class="text-xs text-gray-500">{{ $exam->duration_minutes }} mins</div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500 italic">No upcoming exams scheduled.</p>
                    @endif
                </div>
            </div>

            <!-- Assignments -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-green-700">📝 Assignments</h3>
                        <a href="{{ route('assignments.index') }}" class="text-sm text-blue-500 hover:text-blue-700 underline">View All Assignments</a>
                    </div>
                    @if(isset($pendingAssignments) && $pendingAssignments->count() > 0)
                         <ul class="divide-y divide-gray-200">
                            @foreach($pendingAssignments as $assignment)
                                <li class="py-2 flex justify-between items-center">
                                    <a href="{{ route('assignments.show', $assignment) }}" class="text-indigo-600 font-medium hover:underline">
                                        {{ $assignment->title }}
                                    </a> 
                                    <span class="px-2 py-1 text-xs rounded-full {{ $assignment->due_date->isPast() ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                        Due {{ $assignment->due_date->diffForHumans() }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                         <p class="text-gray-500 italic">No pending assignments.</p>
                    @endif
                </div>
            </div>

            <!-- Past Exams -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg opacity-75">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4 text-gray-600">History: Past Exams</h3>
                    @if(isset($pastExams) && $pastExams->count() > 0)
                        <ul class="list-disc pl-5 text-gray-500">
                            @foreach($pastExams as $exam)
                                <li>
                                    {{ $exam->title }} ({{ $exam->subject }}) - Ended {{ $exam->start_time->diffForHumans() }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-400 italic">No past exams.</p>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
