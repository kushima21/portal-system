@extends('layout.default')

@section('content')
<div class="w-full h-full">

    <div class="w-full h-[22%] relative rounded-lg border border-gray-300 z-10">

        <div class="flex items-center gap-3 p-5">
            <span>Admin</span>
            <span>></span>
            <span>Manage</span>
            <span>></span>
            <span>Subjects</span>
        </div>

        <div class="w-[80%] p-5 flex items-center justify-between">
            <h2 class="text-xl font-semibold">Subjects</h2>

            <div class="flex gap-3 items-center">
                <form method="">
                    <input 
                        type="text" 
                        placeholder="Search..."
                        class="w-[300px] h-[40px] rounded-lg border border-gray-300 px-3"
                    >
                </form>
            </div>
        </div>

        <!-- TABLE WRAPPER -->
        <div class="w-full mx-auto overflow-y-auto-scroll mt-5">
            <table class="w-full">
                <thead>
                    <tr class="h-[50px]">
                        <th><input type="checkbox"></th>
                        <th class="text-left px-5">Subject Code</th>
                        <th class="text-left px-5">Subject Name</th>
                        <th class="text-left px-5">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="h-[50px] border-b border-gray-200">
                        <td class="pl-5"><input type="checkbox"></td>
                        <td class="pl-5">CS101</td>
                        <td class="pl-5">Introduction to Computer Science</td>
                        <td class="pl-5">
                            <button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                            <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                        </td>
                    </tr>

                    <tr class="h-[50px] border-b border-gray-200">
                        <td class="pl-5"><input type="checkbox"></td>
                        <td class="px-5">MATH201</td>
                        <td class="px-5">Calculus I</td>
                        <td class="px-5">
                            <button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                            <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                        </td>
                    </tr>

                    <tr class="h-[50px] border-b border-gray-200">
                        <td class="pl-5"><input type="checkbox"></td>
                        <td class="px-5">PHYS101</td>
                        <td class="px-5">General Physics</td>
                        <td class="px-5">
                            <button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                            <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                        </td>
                    </tr>

                    <tr class="h-[50px] border-b border-gray-200">
                        <td class="pl-5"><input type="checkbox"></td>
                        <td class="px-5">PHYS101</td>
                        <td class="px-5">General Physics</td>
                        <td class="px-5">
                            <button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                            <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                        </td>
                    </tr>

                    <tr class="h-['50px'] border-b border-gray-200">
                        <td class="pl-5"><input type="checkbox"></td>
                        <td class="px-5">PHYS101</td>
                        <td class="px-5">General Physics</td>
                        <td class="px-5">
                            <button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                            <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                        </td>
                    </tr>

                    <tr class="h-['50px'] border-b border-gray-200">
                        <td class="pl-5"><input type="checkbox"></td>
                        <td class="px-5">PHYS101</td>
                        <td class="px-5">General Physics</td>
                        <td class="px-5">
                            <button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                            <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                        </td>
                    </tr>

                    
                    <tr class="h-['50px'] border-b border-gray-200">
                        <td class="pl-5"><input type="checkbox"></td>
                        <td class="px-5">PHYS101</td>
                        <td class="px-5">General Physics</td>
                        <td class="px-5">
                            <button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                            <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                        </td>
                    </tr>

                    
                    <tr class="h-[50px] border-b border-gray-200">
                        <td class="pl-5"><input type="checkbox"></td>
                        <td class="px-5">PHYS101</td>
                        <td class="px-5">General Physics</td>
                        <td class="px-5">
                            <button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                            <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                        </td>
                    </tr>

                    
                    <tr class="h-[50px] border-b border-gray-200">
                        <td class="pl-5"><input type="checkbox"></td>
                        <td class="px-5">PHYS101</td>
                        <td class="px-5">General Physics</td>
                        <td class="px-5">
                            <button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                            <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</div>
@endsection