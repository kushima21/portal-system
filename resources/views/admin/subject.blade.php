    @extends('layout.default')

    @section('content')
    <div class="w-full h-full">

            <div class="w-full h-[2-%] relative rounded-lg border border-gray-300 z-10">
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
            </div>

            <!-- TABLE WRAPPER -->
            <div class="w-full mt-5 max-h-[calc(100%-100px)] overflow-y-auto border border-gray-200 rounded-lg">
                <table id="subjectTable" class="w-full table-fixed border-collapse">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs cursor-pointer">
                        <tr class="h-[50px]">
                            <th class="w-12 text-center"><input type="checkbox"></th>
                            <th class="px-5 text-left" onclick="sortTable(1)">Subject Code &#x25B2;&#x25BC;</th>
                            <th class="px-5 text-left" onclick="sortTable(2)">Subject Name &#x25B2;&#x25BC;</th>
                            <th class="px-5 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example data -->
                        <tr class="h-[50px] border-b border-gray-200">
                            <td class="text-center"><input type="checkbox"></td>
                            <td class="px-5">CS101</td>
                            <td class="px-5">Introduction to Computer Science</td>
                            <td class="px-5 flex gap-2">
                                <button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                                <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                            </td>
                        </tr>

                        <tr class="h-[50px] border-b border-gray-200">
                            <td class="text-center"><input type="checkbox"></td>
                            <td class="px-5">CS101</td>
                            <td class="px-5">Introduction to Computer Science</td>
                            <td class="px-5 flex gap-2">
                                <button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                                <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                            </td>
                        </tr>

                        <tr class="h-[50px] border-b border-gray-200">
                            <td class="text-center"><input type="checkbox"></td>
                            <td class="px-5">CS101</td>
                            <td class="px-5">Introduction to Computer Science</td>
                            <td class="px-5 flex gap-2">
                                <button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                                <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                            </td>
                        </tr>


                        <tr class="h-[50px] border-b border-gray-200">
                            <td class="text-center"><input type="checkbox"></td>
                            <td class="px-5">CS101</td>
                            <td class="px-5">Introduction to Computer Science</td>
                            <td class="px-5 flex gap-2">
                                <button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                                <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                            </td>
                        </tr>


                        <tr class="h-[50px] border-b border-gray-200">
                            <td class="text-center"><input type="checkbox"></td>
                            <td class="px-5">CS101</td>
                            <td class="px-5">Introduction to Computer Science</td>
                            <td class="px-5 flex gap-2">
                                <button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                                <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                            </td>
                        </tr>



                        <tr class="h-[50px] border-b border-gray-200">
                            <td class="text-center"><input type="checkbox"></td>
                            <td class="px-5">CS101</td>
                            <td class="px-5">Introduction to Computer Science</td>
                            <td class="px-5 flex gap-2">
                                <button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                                <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                            </td>
                        </tr>



                        <tr class="h-[50px] border-b border-gray-200">
                            <td class="text-center"><input type="checkbox"></td>
                            <td class="px-5">CS101</td>
                            <td class="px-5">Introduction to Computer Science</td>
                            <td class="px-5 flex gap-2">
                                <button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                                <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                            </td>
                        </tr>



                        <tr class="h-[50px] border-b border-gray-200">
                            <td class="text-center"><input type="checkbox"></td>
                            <td class="px-5">CS101</td>
                            <td class="px-5">Introduction to Computer Science</td>
                            <td class="px-5 flex gap-2">
                                <button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                                <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                            </td>
                        </tr>




                        <tr class="h-[50px] border-b border-gray-200">
                            <td class="text-center"><input type="checkbox"></td>
                            <td class="px-5">CS101</td>
                            <td class="px-5">Introduction to Computer Science</td>
                            <td class="px-5 flex gap-2">
                                <button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                                <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                            </td>
                        </tr>




                        <tr class="h-[50px] border-b border-gray-200">
                            <td class="text-center"><input type="checkbox"></td>
                            <td class="px-5">CS101</td>
                            <td class="px-5">Introduction to Computer Science</td>
                            <td class="px-5 flex gap-2">
                                <button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                                <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                            </td>
                        </tr>




                        <tr class="h-[50px] border-b border-gray-200">
                            <td class="text-center"><input type="checkbox"></td>
                            <td class="px-5">CS101</td>
                            <td class="px-5">Introduction to Computer Science</td>
                            <td class="px-5 flex gap-2">
                                <button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                                <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Delete</button>
                            </td>
                        </tr>
                        <!-- Add at least 20 rows here to test pagination -->
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

    <script>
const table = document.getElementById('subjectTable').getElementsByTagName('tbody')[0];
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

// Initial display
displayTable(currentPage);

// Sorting function
function sortTable(colIndex) {
    const sortedRows = rows.sort((a,b) => {
        const aText = a.children[colIndex].innerText.toLowerCase();
        const bText = b.children[colIndex].innerText.toLowerCase();
        return aText > bText ? 1 : aText < bText ? -1 : 0;
    });
    sortedRows.forEach(row => table.appendChild(row));
    displayTable(currentPage);
}
</script>
    @endsection