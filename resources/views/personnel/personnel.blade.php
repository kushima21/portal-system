@extends('layout.default')

@section('content')
<div class="w-full h-full px-5 py-5">

    <!-- Breadcrumb -->
    <div class="w-full rounded-lg border border-gray-300 mb-5">
        <div class="flex items-center gap-3 p-5">
            <span>Admin</span> <span>></span>
            <span>Manage</span> <span>></span>
            <span>Personnel</span>
        </div>

        <div class="flex items-center justify-between p-5">
            <h2 class="text-xl font-semibold">Personnel</h2>
            <input id="searchInput" type="text" placeholder="Search..."
                class="w-[300px] h-[40px] rounded-lg border border-gray-300 px-3"
                onkeyup="searchTable()">
        </div>
    </div>

    <!-- Alerts -->
    <div class="mb-4">
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

    <!-- Table -->
    <div class="w-full overflow-x-auto border border-gray-200 rounded-lg">
        <table id="personnelTable" class="w-full table-auto border-collapse text-sm">
            <thead class="bg-gray-100 text-gray-700 uppercase">
                <tr class="h-12">
                    <th class="px-4 py-2 text-left">Personnel ID</th>
                    <th class="px-4 py-2 text-left">First Name</th>
                    <th class="px-4 py-2 text-left">Last Name</th>
                    <th class="px-4 py-2 text-left">Middle Name</th>
                    <th class="px-4 py-2 text-left">Gender</th>
                    <th class="px-4 py-2 text-left">Birthdate</th>
                    <th class="px-4 py-2 text-left">Contact</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Civil Status</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($personnels as $person)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $person->personel_id }}</td>
                    <td class="px-4 py-2">{{ $person->fname }}</td>
                    <td class="px-4 py-2">{{ $person->lname }}</td>
                    <td class="px-4 py-2">{{ $person->mname }}</td>
                    <td class="px-4 py-2">{{ $person->gender }}</td>
                    <td class="px-4 py-2">{{ $person->birthdate }}</td>
                    <td class="px-4 py-2">{{ $person->contact_number }}</td>
                    <td class="px-4 py-2">{{ $person->email }}</td>
                    <td class="px-4 py-2">{{ $person->civil_status }}</td>
                    <td class="px-4 py-2 flex gap-2">
                        <button onclick="openEditModal(
                            '{{ $person->personel_id }}',
                            '{{ $person->fname }}',
                            '{{ $person->lname }}',
                            '{{ $person->mname }}',
                            '{{ $person->gender }}',
                            '{{ $person->birthdate }}',
                            '{{ $person->religion }}',
                            '{{ $person->address }}',
                            '{{ $person->nationality }}',
                            '{{ $person->contact_number }}',
                            '{{ $person->email }}',
                            '{{ $person->civil_status }}'
                        )" class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Edit</button>

                       <form action="{{ route('personnel.destroy', $person->personel_id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
    @csrf
    @method('DELETE')
    <button class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600">Delete</button>
</form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-3 gap-2">
        <button class="px-3 py-1 bg-gray-300 rounded" id="prevBtn">Prev</button>
        <span id="pageInfo" class="px-3 py-1"></span>
        <button class="px-3 py-1 bg-gray-300 rounded" id="nextBtn">Next</button>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 hidden flex justify-center items-center z-50 bg-black/40">
    <div class="bg-white w-[420px] p-8 rounded-2xl shadow-2xl relative">
        <button onclick="closeEditModal()" class="absolute top-3 right-4 text-gray-400 hover:text-red-500 text-2xl font-bold">&times;</button>
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Edit Personnel</h2>
        <form id="editForm" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <input id="edit_personel_id" name="personel_id" class="w-full border p-2 rounded" placeholder="Personnel ID" readonly>
            <input id="edit_fname" name="fname" class="w-full border p-2 rounded" placeholder="First Name">
            <input id="edit_lname" name="lname" class="w-full border p-2 rounded" placeholder="Last Name">
            <input id="edit_mname" name="mname" class="w-full border p-2 rounded" placeholder="Middle Name">
            <select id="edit_gender" name="gender" class="w-full border p-2 rounded">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <input type="date" id="edit_birthdate" name="birthdate" class="w-full border p-2 rounded">
            <input id="edit_religion" name="religion" class="w-full border p-2 rounded" placeholder="Religion">
            <input id="edit_address" name="address" class="w-full border p-2 rounded" placeholder="Address">
            <input id="edit_nationality" name="nationality" class="w-full border p-2 rounded" placeholder="Nationality">
            <input id="edit_contact" name="contact_number" class="w-full border p-2 rounded" placeholder="Contact">
            <input id="edit_email" name="email" class="w-full border p-2 rounded" placeholder="Email">
            <select id="edit_civil_status" name="civil_status" class="w-full border p-2 rounded">
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Widowed">Widowed</option>
            </select>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg">Update Personnel</button>
        </form>
    </div>
</div>

<!-- Add Modal -->
<div x-data="{ open: false }">
    <button @click="open = true"
        class="fixed bottom-8 right-8 bg-green-600 text-white p-4 rounded-full shadow-lg hover:bg-green-500 z-40">+</button>

    <div x-show="open" x-transition.opacity.duration.300ms class="fixed inset-0 flex justify-center items-center z-50 pointer-events-none">
        <div @click.away="open = false" class="bg-white rounded-2xl shadow-2xl w-96 p-8 transform transition-all duration-300 scale-95 pointer-events-auto">
            <button @click="open = false" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-2xl font-bold">&times;</button>

            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Add Personnel</h3>

            <form action="{{ route('personnel.store') }}" method="POST" class="space-y-5">
                @csrf
                <input name="personel_id" class="w-full border p-2 rounded" placeholder="Personnel ID">
                <input name="fname" class="w-full border p-2 rounded" placeholder="First Name">
                <input name="lname" class="w-full border p-2 rounded" placeholder="Last Name">
                <input name="mname" class="w-full border p-2 rounded" placeholder="Middle Name">
                <select name="gender" class="w-full border p-2 rounded">
                    <option value="">Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <input type="date" name="birthdate" class="w-full border p-2 rounded">
                <input name="religion" class="w-full border p-2 rounded" placeholder="Religion">
                <input name="address" class="w-full border p-2 rounded" placeholder="Address">
                <input name="nationality" class="w-full border p-2 rounded" placeholder="Nationality">
                <input name="contact_number" class="w-full border p-2 rounded" placeholder="Contact">
                <input name="email" class="w-full border p-2 rounded" placeholder="Email">
                <select name="civil_status" class="w-full border p-2 rounded">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>
                </select>
                <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-500">Add Personnel</button>
            </form>
        </div>
    </div>
</div>

<script src="//unpkg.com/alpinejs" defer></script>
<script>
const tableBody = document.getElementById('personnelTable').getElementsByTagName('tbody')[0];
const rows = Array.from(tableBody.getElementsByTagName('tr'));
const rowsPerPage = 10;
let currentPage = 1;
const totalPages = Math.ceil(rows.length / rowsPerPage);

// Function to handle pagination display
function displayTable(page) {
    rows.forEach((row, index) => {
        row.style.display = (index >= (page-1)*rowsPerPage && index < page*rowsPerPage) ? '' : 'none';
    });
    document.getElementById('pageInfo').innerText = `Page ${page} of ${totalPages}`;
}

// Pagination buttons
document.getElementById('prevBtn').addEventListener('click', () => {
    if (currentPage > 1) currentPage--;
    displayTable(currentPage);
});
document.getElementById('nextBtn').addEventListener('click', () => {
    if (currentPage < totalPages) currentPage++;
    displayTable(currentPage);
});

// Open Edit Modal
function openEditModal(id, fname, lname, mname, gender, birthdate, religion, address, nationality, contact, email, civil_status){
    document.getElementById("editModal").classList.remove("hidden");
    document.getElementById("editForm").action="/personnel/"+id;
    document.getElementById("edit_personel_id").value=id;
    document.getElementById("edit_fname").value=fname;
    document.getElementById("edit_lname").value=lname;
    document.getElementById("edit_mname").value=mname;
    document.getElementById("edit_gender").value=gender;
    document.getElementById("edit_birthdate").value=birthdate;
    document.getElementById("edit_religion").value=religion;
    document.getElementById("edit_address").value=address;
    document.getElementById("edit_nationality").value=nationality;
    document.getElementById("edit_contact").value=contact;
    document.getElementById("edit_email").value=email;
    document.getElementById("edit_civil_status").value=civil_status;
}

// Close Edit Modal
function closeEditModal(){
    document.getElementById("editModal").classList.add("hidden");
}

// Search function
function searchTable(){
    const filter = document.getElementById("searchInput").value.toLowerCase();
    rows.forEach(row => {
        const rowText = row.textContent.toLowerCase();
        row.style.display = rowText.includes(filter) ? '' : 'none';
    });
}

// Initial display
displayTable(currentPage);
</script>
@endsection