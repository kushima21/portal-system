@extends('layout.default')

@section('content')
<div class="w-full h-full">

    <!-- Breadcrumb -->
    <div class="w-full h-[2-%] relative rounded-lg border border-gray-300 z-10">
        <div class="flex items-center gap-3 p-5">
            <span>Admin</span> <span>></span>
            <span>Manage</span> <span>></span>
            <span>Users</span>
        </div>

        <div class="w-[80%] p-5 flex items-center justify-between">
            <h2 class="text-xl font-semibold">Users</h2>
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
        <table id="userTable" class="w-full table-auto border-collapse">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs cursor-pointer">
                <tr class="h-[50px]">
                    <th class="w-12 text-center px-4">#</th>
                    <th class="px-5 text-left" onclick="sortTable(1)">User ID &#x25B2;&#x25BC;</th>
                    <th class="px-5 text-left" onclick="sortTable(2)">School ID &#x25B2;&#x25BC;</th>
                    <th class="px-5 text-left" onclick="sortTable(3)">Name &#x25B2;&#x25BC;</th>
                    <th class="px-5 text-left">Gender</th>
                    <th class="px-5 text-left">Contact</th>
                    <th class="px-5 text-left">Email</th>
                    <th class="px-5 text-left">Role</th>
                    <th class="px-5 text-left">Password</th>
                    <th class="px-5 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="h-[50px] border-b border-gray-200">
                    <td class="text-center px-4 py-2"><input type="checkbox"></td>
                    <td class="px-5 py-2">{{ $user->user_id }}</td>
                    <td class="px-5 py-2">{{ $user->school_id }}</td>
                    <td class="px-5 py-2">{{ $user->name }}</td>
                    <td class="px-5 py-2">{{ $user->gender }}</td>
                    <td class="px-5 py-2">{{ $user->contact_number }}</td>
                    <td class="px-5 py-2">{{ $user->email }}</td>
                    <td class="px-5 py-2">{{ $user->role }}</td>
                    <td class="px-5 py-2">{{ $user->password }}</td>
                    <td class="px-5 py-2 flex gap-3">
                        <button type="button" 
                                onclick="openEditModal(
                                    '{{ $user->user_id }}',
                                    '{{ $user->school_id }}',
                                    '{{ $user->name }}',
                                    '{{ $user->gender }}',
                                    '{{ $user->contact_number }}',
                                    '{{ $user->email }}',
                                    '{{ $user->role }}'
                                )"
                                class="px-3 py-1 bg-blue-500 text-white rounded-lg">
                            Edit
                        </button>

                        <form action="{{ route('user.destroy', $user->user_id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
<!-- Removed bg-black bg-opacity-40 so background stays visible -->
<div id="editModal" class="fixed inset-0 hidden flex justify-center items-center z-50">
    <div class="bg-white w-[420px] p-8 rounded-2xl shadow-2xl relative">
        <button onclick="closeEditModal()" class="absolute top-3 right-4 text-gray-400 hover:text-red-500 text-2xl font-bold">&times;</button>
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Edit User</h2>

        <form id="editForm" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="text-sm text-gray-600">School ID</label>
                <input type="text" name="school_id" id="edit_school"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none" required>
            </div>
            <div>
                <label class="text-sm text-gray-600">Name</label>
                <input type="text" name="name" id="edit_name"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none" required>
            </div>
            <div>
                <label class="text-sm text-gray-600">Gender</label>
                <input type="text" name="gender" id="edit_gender"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>
            <div>
                <label class="text-sm text-gray-600">Contact</label>
                <input type="text" name="contact_number" id="edit_contact"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>
            <div>
                <label class="text-sm text-gray-600">Email</label>
                <input type="email" name="email" id="edit_email"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>
            <div>
                <label class="text-sm text-gray-600">Role</label>
                <select name="role" id="edit_role"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
                    <option value="student">Student</option>
                    <option value="adviser">Adviser</option>
                    <option value="teacher">Teacher</option>
                    <option value="registrar">Registrar</option>
                    <option value="secretary">Secretary</option>
                    <option value="principal">Principal</option>
                    <option value="admin">Admin</option>
                    <option value="super_admin">Super Admin</option>
                </select>
            </div>
            <div>
                <label class="text-sm text-gray-600">Password</label>
                <input type="password" name="password" id="edit_password"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 outline-none"
                    placeholder="Leave blank to keep current">
            </div>
            <button class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg transition">
                Update User
            </button>
        </form>
    </div>
</div>

<!-- Floating Add Modal remains the same -->
<div x-data="{ open: false }">
    <button @click="open = true" 
            class="fixed bottom-8 right-8 bg-green-600 text-white p-4 rounded-full shadow-lg hover:bg-green-500 transition-transform transform hover:scale-110 z-40">
        +
    </button>

    <div x-show="open" x-transition.opacity.duration.300ms
         class="fixed inset-0 flex justify-center items-center z-50 pointer-events-none">
        <div @click.away="open = false" 
             class="bg-white rounded-2xl shadow-2xl w-96 p-8 transform transition-all duration-300 scale-95 pointer-events-auto">
            <button @click="open = false" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-2xl font-bold">&times;</button>
            
            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Add User</h3>

            <form action="{{ route('user.store') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">School ID</label>
                    <input type="text" name="school_id" placeholder="Enter school ID" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" name="name" placeholder="Enter name" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                    <input type="text" name="gender" placeholder="Enter gender" class="w-full border border-gray-300 rounded-lg px-4 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Contact</label>
                    <input type="text" name="contact_number" placeholder="Enter contact number" class="w-full border border-gray-300 rounded-lg px-4 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" placeholder="Enter email" class="w-full border border-gray-300 rounded-lg px-4 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                    <select name="role" class="w-full border border-gray-300 rounded-lg px-4 py-2">
                        <option value="student">Student</option>
                        <option value="adviser">Adviser</option>
                        <option value="teacher">Teacher</option>
                        <option value="registrar">Registrar</option>
                        <option value="secretary">Secretary</option>
                        <option value="principal">Principal</option>
                        <option value="admin">Admin</option>
                        <option value="super_admin">Super Admin</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" placeholder="Enter password" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                </div>
                <button type="submit" class="w-full bg-green-600 text-white font-semibold px-4 py-3 rounded-lg hover:bg-green-500">Add User</button>
            </form>
        </div>
    </div>
</div>

<script src="//unpkg.com/alpinejs" defer></script>
<script>
const table = document.getElementById('userTable').getElementsByTagName('tbody')[0];
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

function openEditModal(id, school, name, gender, contact, email, role) {
    const modal = document.getElementById("editModal");
    modal.classList.remove("hidden");
    modal.classList.add("flex");

    document.getElementById("edit_school").value = school;
    document.getElementById("edit_name").value = name;
    document.getElementById("edit_gender").value = gender;
    document.getElementById("edit_contact").value = contact;
    document.getElementById("edit_email").value = email;
    document.getElementById("edit_role").value = role;
    document.getElementById("edit_password").value = '';

    document.getElementById("editForm").action = "/user/" + id;
}

function closeEditModal() {
    const modal = document.getElementById("editModal");
    modal.classList.add("hidden");
    modal.classList.remove("flex");
}

function searchTable() {
    let input = document.querySelector('input[name="search"]');
    let filter = input.value.toLowerCase();
    rows.forEach(row => {
        const cells = row.getElementsByTagName("td");
        const match = Array.from(cells).some(td => td.innerText.toLowerCase().includes(filter));
        row.style.display = match ? '' : 'none';
    });
}
displayTable(currentPage);
</script>
@endsection