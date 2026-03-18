@extends('layout.default')

@section('content')
<div x-data="classModals()" class="w-full h-full relative">

    <!-- Alerts -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <!-- Breadcrumb -->
    <div class="w-full h-[2-%] relative rounded-lg border border-gray-300 z-10">
        <div class="flex items-center gap-3 p-5">
            <span>Admin</span> <span>></span>
            <span>Manage</span> <span>></span>
            <span>Classes</span>
        </div>
        <div class="w-[80%] p-5 flex items-center justify-between">
            <h2 class="text-xl font-semibold">Classes</h2>
            <div class="flex gap-3 items-center">
                <input 
                    type="text"
                    placeholder="Search..."
                    id="searchInput"
                    onkeyup="searchTable()"
                    class="w-[300px] h-[40px] rounded-lg border border-gray-300 px-3">
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="w-full mt-5 max-h-[calc(100%-100px)] overflow-y-auto border border-gray-200 rounded-lg">
        <table id="classTable" class="w-full table-fixed border-collapse">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs cursor-pointer">
                <tr class="h-[50px]">
                    <th class="w-12 text-center"><input type="checkbox"></th>
                    <th class="px-5 text-left" onclick="sortTable(1)">Descriptive Title &#x25B2;&#x25BC;</th>
                    <th class="px-5 text-left" onclick="sortTable(2)">Schedule &#x25B2;&#x25BC;</th>
                    <th class="px-5 text-left">Teacher</th>
                    <th class="px-5 text-left">Classroom</th>
                    <th class="px-5 text-left">Subject</th>
                    <th class="px-5 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classes as $class)
                <tr class="h-[50px] border-b border-gray-200">
                    <td class="text-center"><input type="checkbox"></td>
                    <td class="px-5">{{ $class->descriptive_title }}</td>
                    <td class="px-5">{{ $class->schedule }}</td>
                    <td class="px-5">{{ $class->teacher->name ?? '' }}</td>
                    <td class="px-5">{{ $class->classroom->year_level ?? '' }} - {{ $class->classroom->section ?? '' }}</td>
                    <td class="px-5">{{ $class->subject->descriptive_title ?? '' }}</td>
                    <td class="px-5 flex gap-2">
                        <button type="button" 
                                @click="openEditModal('{{ $class->class_id }}', '{{ $class->descriptive_title }}', '{{ $class->schedule }}', '{{ $class->user_id }}', '{{ $class->classroom_id }}', '{{ $class->subject_id }}')"
                                class="px-3 py-1 bg-blue-500 text-white rounded-lg">
                            Edit
                        </button>
                        <form action="{{ route('classes.destroy', $class->class_id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex justify-center mt-3 gap-2">
            <button class="px-3 py-1 bg-gray-300 rounded" id="prevBtn">Prev</button>
            <span id="pageInfo" class="px-3 py-1"></span>
            <button class="px-3 py-1 bg-gray-300 rounded" id="nextBtn">Next</button>
        </div>
    </div>

    <!-- Add & Edit Modals -->
    <button @click="openAdd = true" 
            class="fixed bottom-8 right-8 bg-green-600 text-white p-4 rounded-full shadow-lg hover:bg-green-500 z-40">
        Add
    </button>

    <!-- Add Modal -->
    <div x-show="openAdd" x-transition.opacity.duration.300ms
         class="fixed inset-0 flex justify-center items-center z-50 pointer-events-none">
        <div @click.away="openAdd = false" 
             class="bg-white rounded-2xl shadow-2xl w-96 p-8 transform transition-all duration-300 scale-95 pointer-events-auto">
            <button @click="openAdd = false" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-2xl font-bold">&times;</button>
            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Add Class</h3>
            <form id="addClassForm" action="{{ route('classes.store') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label>Descriptive Title</label>
                    <input type="text" name="descriptive_title" class="w-full border rounded-lg px-4 py-2" required>
                </div>
                <div>
                    <label>Schedule</label>
                    <input type="text" name="schedule" class="w-full border rounded-lg px-4 py-2" required>
                </div>
                <div>
                    <label>Teacher</label>
                    <select name="user_id" class="w-full border rounded-lg px-4 py-2" required>
                        <option value="">Select Teacher</option>
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->user_id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Classroom</label>
                    <select name="classroom_id" class="w-full border rounded-lg px-4 py-2" required>
                        <option value="">Select Classroom</option>
                        @foreach($classrooms as $classroom)
                            <option value="{{ $classroom->classroom_id }}">{{ $classroom->year_level }} - {{ $classroom->section }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Subject</label>
                    <select name="subject_id" class="w-full border rounded-lg px-4 py-2" required>
                        <option value="">Select Subject</option>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->subject_id }}">{{ $subject->descriptive_title }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="w-full bg-green-600 text-white px-4 py-3 rounded-lg hover:bg-green-500">Add Class</button>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div x-show="openEdit" x-transition.opacity.duration.300ms
         class="fixed inset-0 flex justify-center items-center z-50 pointer-events-none">
        <div @click.away="openEdit=false" class="bg-white rounded-2xl shadow-2xl w-96 p-8 transform transition-all duration-300 scale-95 pointer-events-auto">
            <button @click="openEdit=false" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-2xl font-bold">&times;</button>
            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edit Class</h3>
            <form :action="`/classes/${form.class_id}`" method="POST" class="space-y-5">
                @csrf
                @method('PUT')
                <div>
                    <label>Descriptive Title</label>
                    <input type="text" name="descriptive_title" x-model="form.descriptive_title" class="w-full border rounded-lg px-4 py-2" required>
                </div>
                <div>
                    <label>Schedule</label>
                    <input type="text" name="schedule" x-model="form.schedule" class="w-full border rounded-lg px-4 py-2" required>
                </div>
                <div>
                    <label>Teacher</label>
                    <select name="user_id" x-model="form.user_id" class="w-full border rounded-lg px-4 py-2" required>
                        <option value="">Select Teacher</option>
                        @foreach($teachers as $teacher)
                            <option :value="{{ $teacher->user_id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Classroom</label>
                    <select name="classroom_id" x-model="form.classroom_id" class="w-full border rounded-lg px-4 py-2" required>
                        <option value="">Select Classroom</option>
                        @foreach($classrooms as $classroom)
                            <option :value="{{ $classroom->classroom_id }}">{{ $classroom->year_level }} - {{ $classroom->section }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Subject</label>
                    <select name="subject_id" x-model="form.subject_id" class="w-full border rounded-lg px-4 py-2" required>
                        <option value="">Select Subject</option>
                        @foreach($subjects as $subject)
                            <option :value="{{ $subject->subject_id }}">{{ $subject->descriptive_title }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-500">Update Class</button>
            </form>
        </div>
    </div>

</div>

<script src="//unpkg.com/alpinejs" defer></script>

<script>
function classModals() {
    return {
        openAdd: false,
        openEdit: false,
        form: {},
        openEditModal(class_id, title, schedule, user_id, classroom_id, subject_id) {
            this.form = { class_id, descriptive_title: title, schedule, user_id, classroom_id, subject_id };
            this.openEdit = true;
        }
    }
}

// Pagination, sorting, search
const tableBody = document.getElementById('classTable').getElementsByTagName('tbody')[0];
let rows = Array.from(tableBody.getElementsByTagName('tr'));
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
    if(currentPage > 1) currentPage--;
    displayTable(currentPage);
});
document.getElementById('nextBtn').addEventListener('click', () => {
    if(currentPage < totalPages) currentPage++;
    displayTable(currentPage);
});

function sortTable(colIndex) {
    rows.sort((a,b)=>{
        const aText = a.children[colIndex].innerText.toLowerCase();
        const bText = b.children[colIndex].innerText.toLowerCase();
        return aText > bText ? 1 : aText < bText ? -1 : 0;
    }).forEach(row => tableBody.appendChild(row));
    displayTable(currentPage);
}

function searchTable(){
    let filter = document.getElementById("searchInput").value.toLowerCase();
    rows.forEach(row=>{
        let title = row.children[1].innerText.toLowerCase();
        let schedule = row.children[2].innerText.toLowerCase();
        let teacher = row.children[3].innerText.toLowerCase();
        let classroom = row.children[4].innerText.toLowerCase();
        let subject = row.children[5].innerText.toLowerCase();
        row.style.display = (title.includes(filter) || schedule.includes(filter) || teacher.includes(filter) || classroom.includes(filter) || subject.includes(filter)) ? '' : 'none';
    });
}
displayTable(currentPage);
</script>
@endsection