@extends('layout.default')

@section('content')
@php
    // Dummy programs data
    $programs = [
        (object)[
            'program_id' => 1,
            'program_code' => 'JHS-01',
            'program_name' => 'Junior High School - STEM',
            'level' => 'highschool'
        ],
        (object)[
            'program_id' => 2,
            'program_code' => 'JHS-02',
            'program_name' => 'Junior High School - ABM',
            'level' => 'highschool'
        ],
        (object)[
            'program_id' => 3,
            'program_code' => 'SHS-01',
            'program_name' => 'Senior High School - STEM',
            'level' => 'seniorhigh'
        ],
        (object)[
            'program_id' => 4,
            'program_code' => 'SHS-02',
            'program_name' => 'Senior High School - ABM',
            'level' => 'seniorhigh'
        ]
    ];
@endphp

<div class="w-full h-full">

    <!-- Breadcrumb -->
    <div class="w-full h-[2-%] relative rounded-lg border border-gray-300 z-10">
        <div class="flex items-center gap-3 p-5">
            <span>Admin</span> <span>></span>
            <span>Manage</span> <span>></span>
            <span>Programs</span>
        </div>

        <div class="w-[80%] p-5 flex items-center justify-between">
            <h2 class="text-xl font-semibold">Programs</h2>
            <div class="flex gap-3 items-center">
               <form method="GET" action="">
                <input 
                type="text"
                name="search"
                placeholder="Search..."
                id="searchInput"
                onkeyup="searchTable()"
                class="w-[300px] h-[40px] rounded-lg border border-gray-300 px-3">
            </form>
            </div>
        </div>
    </div>

    <!-- TABLE WRAPPER -->
    <div class="w-full mt-5 max-h-[calc(100%-100px)] overflow-y-auto border border-gray-200 rounded-lg">
        <table id="programTable" class="w-full table-fixed border-collapse">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs cursor-pointer">
                <tr class="h-[50px]">
                    <th class="w-12 text-center"><input type="checkbox"></th>
                    <th class="px-5 text-left" onclick="sortTable(1)">Program Code &#x25B2;&#x25BC;</th>
                    <th class="px-5 text-left" onclick="sortTable(2)">Program Name &#x25B2;&#x25BC;</th>
                    <th class="px-5 text-left" onclick="sortTable(3)">Level &#x25B2;&#x25BC;</th>
                    <th class="px-5 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($programs as $program)
                <tr class="h-[50px] border-b border-gray-200">
                    <td class="text-center"><input type="checkbox"></td>
                    <td class="px-5">{{ $program->program_code }}</td>
                    <td class="px-5">{{ $program->program_name }}</td>
                    <td class="px-5">{{ ucfirst($program->level) }}</td>
                    <td class="px-5 flex gap-2">
                        <!-- Edit button -->
                        <button type="button" 
                                onclick="openEditModal('{{ $program->program_id }}', '{{ $program->program_code }}', '{{ $program->program_name }}', '{{ $program->level }}')"
                                class="px-3 py-1 bg-blue-500 text-white rounded-lg">
                            Edit
                        </button>

                        <!-- Delete form -->
                        <form action="#" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="flex justify-center mt-3 gap-2">
            <button class="px-3 py-1 bg-gray-300 rounded" id="prevBtn">Prev</button>
            <span id="pageInfo" class="px-3 py-1"></span>
            <button class="px-3 py-1 bg-gray-300 rounded" id="nextBtn">Next</button>
        </div>
    </div>
</div>

<!-- Edit Program Modal -->
<div id="editModal" class="fixed inset-0 hidden flex justify-center items-center z-50">
    <div class="bg-white w-[420px] p-8 rounded-2xl shadow-2xl relative">
        <button onclick="closeEditModal()" class="absolute top-3 right-4 text-gray-400 hover:text-red-500 text-2xl font-bold">&times;</button>
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Edit Program</h2>
        <form id="editForm" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="text-sm text-gray-600">Program Code</label>
                <input type="text" name="program_code" id="edit_code" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none" required>
            </div>
            <div>
                <label class="text-sm text-gray-600">Program Name</label>
                <input type="text" name="program_name" id="edit_name" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none" required>
            </div>
            <div>
                <label class="text-sm text-gray-600">Level</label>
                <select name="level" id="edit_level" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    <option value="highschool">High School</option>
                    <option value="seniorhigh">Senior High</option>
                </select>
            </div>
            <button class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg transition">Update Program</button>
        </form>
    </div>
</div>

<!-- Floating Add Program Modal -->
<div x-data="{ open: false }">
    <button @click="open = true" class="fixed bottom-8 right-8 bg-green-600 text-white p-4 rounded-full shadow-lg hover:bg-green-500 transition-transform transform hover:scale-110 z-40">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
    </button>

    <div x-show="open" x-transition.opacity.duration.300ms class="fixed inset-0 flex justify-center items-center z-50 pointer-events-none">
        <div @click.away="open = false" class="bg-white rounded-2xl shadow-2xl w-96 p-8 transform transition-all duration-300 scale-95 pointer-events-auto">
            <button @click="open = false" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-2xl font-bold">&times;</button>
            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Add Program</h3>
            <form action="#" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Program Code</label>
                    <input type="text" name="program_code" placeholder="Enter program code" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Program Name</label>
                    <input type="text" name="program_name" placeholder="Enter program name" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Level</label>
                    <select name="level" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                        <option value="highschool">High School</option>
                        <option value="seniorhigh">Senior High</option>
                    </select>
                </div>
                <button type="submit" class="w-full bg-green-600 text-white font-semibold px-4 py-3 rounded-lg hover:bg-green-500">Add Program</button>
            </form>
        </div>
    </div>
</div>

<script src="//unpkg.com/alpinejs" defer></script>
<script>
const table = document.getElementById('programTable').getElementsByTagName('tbody')[0];
const rows = Array.from(table.getElementsByTagName('tr'));
const rowsPerPage = 10;
let currentPage = 1;
const totalPages = Math.ceil(rows.length / rowsPerPage);

function displayTable(page) {
    rows.forEach((row, index) => {
        row.style.display = (index >= (page-1)*rowsPerPage && index < page*rowsPerPage) ? '' : 'none';
    });
    document.getElementById('pageInfo').innerText = `Page ${page} of ${totalPages}`;
}

document.getElementById('prevBtn').addEventListener('click', () => {
    if (currentPage > 1) currentPage--;
    displayTable(currentPage);
});

document.getElementById('nextBtn').addEventListener('click', () => {
    if (currentPage < totalPages) currentPage++;
    displayTable(currentPage);
});

function sortTable(colIndex) {
    const sortedRows = rows.sort((a,b) => {
        const aText = a.children[colIndex].innerText.toLowerCase();
        const bText = b.children[colIndex].innerText.toLowerCase();
        return aText > bText ? 1 : aText < bText ? -1 : 0;
    });
    sortedRows.forEach(row => table.appendChild(row));
    displayTable(currentPage);
}

function openEditModal(id, code, name, level) {
    document.getElementById("editModal").classList.remove("hidden");
    document.getElementById("edit_code").value = code;
    document.getElementById("edit_name").value = name;
    document.getElementById("edit_level").value = level;
    document.getElementById("editForm").action = "/program/" + id;
}

function closeEditModal() {
    document.getElementById("editModal").classList.add("hidden");
}

function searchTable() {
    let input = document.getElementById("searchInput");
    let filter = input.value.toLowerCase();
    rows.forEach(row => {
        let code = row.children[1].innerText.toLowerCase();
        let name = row.children[2].innerText.toLowerCase();
        row.style.display = (code.includes(filter) || name.includes(filter)) ? '' : 'none';
    });
}

displayTable(currentPage);
</script>
@endsection