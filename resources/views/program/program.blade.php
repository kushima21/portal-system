@extends('layout.default')

@section('content')
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
                    <th class="px-5 text-left" onclick="sortTable(1)">Year Level &#x25B2;&#x25BC;</th>
                    <th class="px-5 text-left" onclick="sortTable(2)">Year Category &#x25B2;&#x25BC;</th>
                    <th class="px-5 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($programs as $program)
                <tr class="h-[50px] border-b border-gray-200">
                    <td class="text-center"><input type="checkbox"></td>
                    <td class="px-5">{{ $program->year_level }}</td>
                    <td class="px-5">{{ $program->year_category }}</td>
                    <td class="px-5 flex gap-2">
                        <!-- Edit button -->
                        <button type="button" 
                                onclick="openEditModal('{{ $program->program_id }}', '{{ $program->year_level }}', '{{ $program->year_category }}')"
                                class="px-3 py-1 bg-blue-500 text-white rounded-lg">
                            Edit
                        </button>

                        <!-- Delete form -->
                        <form action="{{ route('programs.destroy', $program->program_id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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

        <button onclick="closeEditModal()" 
        class="absolute top-3 right-4 text-gray-400 hover:text-red-500 text-2xl font-bold">
            &times;
        </button>

        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
            Edit Program
        </h2>

        <form id="editForm" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="text-sm text-gray-600">Year Level</label>
                <input type="text" name="year_level" id="edit_level"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none" required>
            </div>

            <div>
                <label class="text-sm text-gray-600">Year Category</label>
                <select name="year_category" id="edit_category"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
                    <option value="Junior High">Junior High</option>
                    <option value="Senior High">Senior High</option>
                </select>
            </div>

            <button class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg transition">
                Update Program
            </button>
        </form>

    </div>
</div>

<!-- Floating Add Program Modal -->
<div x-data="{ open: false }">
    <button @click="open = true" 
            class="fixed bottom-8 right-8 bg-green-600 text-white p-4 rounded-full shadow-lg hover:bg-green-500 transition-transform transform hover:scale-110 z-40">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
    </button>

    <div x-show="open" x-transition.opacity.duration.300ms
         class="fixed inset-0 flex justify-center items-center z-50 pointer-events-none">
        <div @click.away="open = false" 
             class="bg-white rounded-2xl shadow-2xl w-96 p-8 transform transition-all duration-300 scale-95 pointer-events-auto">
            
            <button @click="open = false" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-2xl font-bold">&times;</button>
            
            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Add Program</h3>
            
            <form action="{{ route('programs.store') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Year Level</label>
                    <input type="text" name="year_level" placeholder="Enter year level" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Year Category</label>
                    <select name="year_category" class="w-full border border-gray-300 rounded-lg px-4 py-2">
                        <option value="Junior High">Junior High</option>
                        <option value="Senior High">Senior High</option>
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

function openEditModal(id, level, category) {
    document.getElementById("editModal").classList.remove("hidden");
    document.getElementById("edit_level").value = level;
    document.getElementById("edit_category").value = category;
    document.getElementById("editForm").action = "/programs/" + id;
}

function closeEditModal() {
    document.getElementById("editModal").classList.add("hidden");
}

function searchTable() {
    let input = document.getElementById("searchInput");
    let filter = input.value.toLowerCase();
    let table = document.getElementById("programTable");
    let rows = table.getElementsByTagName("tr");
    for (let i = 1; i < rows.length; i++) {
        let level = rows[i].getElementsByTagName("td")[1];
        let category = rows[i].getElementsByTagName("td")[2];
        if (level && category) {
            let levelText = level.textContent || level.innerText;
            let categoryText = category.textContent || category.innerText;
            rows[i].style.display = (levelText.toLowerCase().includes(filter) || categoryText.toLowerCase().includes(filter)) ? '' : 'none';
        }
    }
}

displayTable(currentPage);
</script>
@endsection