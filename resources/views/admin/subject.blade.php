@extends('layout.default')

@section('content')
 <div class="fixed top-20  w-full bg-amber-300 shadow-md z-20">
    <div class="max-w-full mx-auto px-6 py-10 flex items-center">
      
        <nav class="flex items-center gap-2 text-gray-800 font-medium text-xl">
            <span>Admin</span>
            <span>&gt;</span>
            <span>Manage</span>
            <span>&gt;</span>
            <span>Subjects</span>
        </nav>
    </div>
</div>

    <div class="h-16"></div>

<div class="p-8 flex justify-center relative mt-6">

    <div class="w-full max-w-7xl"> 
        
        <h2 class="text-2xl font-semibold mb-6 text-center">Subject</h2>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
           <table class="w-full text-sm text-left border border-gray-200">
                
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-8 py-4">ID</th> 
                        <th class="px-8 py-4">Subject Name</th>
                        <th class="px-8 py-4">Grade Level</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    <tr class="hover:bg-gray-50">
                        <td class="px-8 py-4">1</td>
                        <td class="px-8 py-4">English</td>
                        <td class="px-8 py-4">Grade 7</td>
                    </tr>
                  
                </tbody>

            </table>
        </div>

    </div>

    <div x-data="{ open: false }" class="relative">

        <!-- Floating Add Button -->
        <button @click="open = true" 
                class="fixed bottom-8 right-8 bg-green-600 text-white p-4 rounded-full shadow-lg hover:bg-green-500 transition-transform transform hover:scale-110 z-40">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
        </button>

        <!-- Modal Form -->
        <div x-show="open" 
             x-transition.opacity.duration.300ms
             class="fixed inset-0 flex justify-center items-center z-50 pointer-events-none">
            
            <div @click.away="open = false" 
                 class="bg-white rounded-2xl shadow-2xl w-96 p-8 transform transition-all duration-300 scale-95 pointer-events-auto"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95">
                
                <!-- Close Button -->
                <button @click="open = false" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-2xl font-bold">&times;</button>
                
                <!-- Modal Title -->
                <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Add Subject</h3>
                
                <!-- Form -->
                <form action="#" method="POST" class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Subject Name</label>
                        <input type="text" name="subject_name" placeholder="Enter subject name"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Grade Level</label>
                        <select name="grade_level" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" required>
                            <option value="">Select Grade</option>
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-green-600 text-white font-semibold px-4 py-3 rounded-lg hover:bg-green-500 shadow-lg transition transform hover:scale-105">Add Subject</button>
                </form>
            </div>
        </div>

    </div>

</div>

<script src="//unpkg.com/alpinejs" defer></script>
@endsection