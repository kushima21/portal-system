@extends('layout.default')

@section('content')
<div class="w-full h-full">

    <!-- Breadcrumb -->
    <div class="w-full h-[2-%] relative rounded-lg border border-gray-300 z-10">
        <div class="flex items-center gap-3 p-5">
            <span>Admin</span> <span>></span>
            <span>Manage</span> <span>></span>
            <span>Enrollment</span>
        </div>

        <div class="w-[80%] p-5 flex items-center justify-between">
            <h2 class="text-xl font-semibold">Enrollment</h2>
            <div class="flex gap-3 items-center">
               <form method="GET" action="">
                <input 
                type="text"
                name="search"
                placeholder="Search..."
                class="w-[300px] h-[40px] rounded-lg border border-gray-300 px-3"
                onkeyup="searchTable()">
            </form>
            </div>
        </div>
    </div>

    <!-- Alerts -->
    <div class="mt-4 px-5">
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <strong>Oops!</strong>
            <ul class="list-disc list-inside mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif
    </div>

    <!-- TABLE WRAPPER -->
    <div class="w-full mt-5 max-h-[calc(100%-100px)] overflow-y-auto border border-gray-200 rounded-lg">
        <table id="enrollmentTable" class="w-full table-fixed border-collapse">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs cursor-pointer">
                <tr class="h-[50px]">
                    <th class="w-12 text-center"><input type="checkbox"></th>
                    <th class="px-5 text-left" onclick="sortTable(1)">Academic Year &#x25B2;&#x25BC;</th>
                    <th class="px-5 text-left" onclick="sortTable(2)">Status &#x25B2;&#x25BC;</th>
                    <th class="px-5 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enrollments as $enroll)
                <tr class="h-[50px] border-b border-gray-200">
                    <td class="text-center"><input type="checkbox"></td>
                    <td class="px-5">{{ $enroll->academic_year }}</td>
                    <td class="px-5">{{ ucfirst($enroll->status) }}</td>
                    <td class="px-5 flex gap-2">
                        <!-- Edit button -->
                        <button type="button" 
                                onclick="openEditModal('{{ $enroll->id }}', '{{ $enroll->academic_year }}', '{{ $enroll->status }}')"
                                class="px-3 py-1 bg-blue-500 text-white rounded-lg">
                            Edit
                        </button>

                        <!-- Delete form -->
                        <form action="{{ route('enrollment.destroy', $enroll->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 hidden flex justify-center items-center z-50">
    <div class="bg-white w-[420px] p-8 rounded-2xl shadow-2xl relative">
        <button onclick="closeEditModal()" class="absolute top-3 right-4 text-gray-400 hover:text-red-500 text-2xl font-bold">&times;</button>
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Edit Enrollment</h2>
       <form id="editForm" method="POST" class="space-y-4">
    @csrf
    @method('PUT') <!-- kini ang importante para ma-recognize nga PUT ang method -->
    <div>
    <label class="text-sm text-gray-600">Academic Year</label>
    <input type="text" name="academic_year" id="edit_year" 
           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none" required>
</div>
<div>
    <label class="text-sm text-gray-600">Status</label>
    <select name="status" id="edit_status" 
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none" required>
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
    </select>
</div>
<button type="submit" 
        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg transition">
    Update Enrollment
</button>
</form>
    </div>
</div>

<!-- Floating Add Button & Add Enrollment Modal -->
<div x-data="{ openAdd: false }">
    <!-- Floating button -->
    <button @click="openAdd = true" 
            class="fixed bottom-8 right-8 bg-green-600 text-white p-4 rounded-full shadow-lg hover:bg-green-500 transition-transform transform hover:scale-110 z-40">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
    </button>

    <!-- Add Enrollment Modal -->
    <div x-show="openAdd" x-transition.opacity.duration.300ms
         class="fixed inset-0 flex justify-center items-center z-50 pointer-events-none">
        <div @click.away="openAdd = false" 
             class="bg-white rounded-2xl shadow-2xl w-96 p-8 transform transition-all duration-300 scale-95 pointer-events-auto">
            <button @click="openAdd = false" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-2xl font-bold">&times;</button>
            
            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Add Enrollment</h3>

            <form action="{{ route('enrollment.store') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Academic Year</label>
                    <input type="text" name="academic_year" placeholder="YYYY-YYYY" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                        <option value="">--Select Status--</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="w-full bg-green-600 text-white font-semibold py-2 rounded-lg hover:bg-green-500 transition">
                    Add Enrollment
                </button>
            </form>
        </div>
    </div>
</div>

<script src="//unpkg.com/alpinejs" defer></script>
<script>
const table = document.getElementById('enrollmentTable').getElementsByTagName('tbody')[0];
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

function openEditModal(id, year, status) {
    document.getElementById("editModal").classList.remove("hidden");
    document.getElementById("edit_year").value = year;
    document.getElementById("edit_status").value = status;
    document.getElementById("editForm").action = "/enrollments/" + id;
}
function closeEditModal() {
    document.getElementById("editModal").classList.add("hidden");
}
function searchTable() {
    let input = document.querySelector('input[name="search"]');
    let filter = input.value.toLowerCase();
    let table = document.getElementById("enrollmentTable");
    let rows = table.getElementsByTagName("tr");
    for (let i = 1; i < rows.length; i++) {
        let year = rows[i].getElementsByTagName("td")[1];
        let status = rows[i].getElementsByTagName("td")[2];
        if (year && status) {
            let yearText = year.textContent || year.innerText;
            let statusText = status.textContent || status.innerText;
            rows[i].style.display = (yearText.toLowerCase().includes(filter) || statusText.toLowerCase().includes(filter)) ? '' : 'none';
        }
    }
}
displayTable(currentPage);

</script>
@endsection