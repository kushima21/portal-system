<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Default Layout</title>

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gray-100">

    <div class="h-screen flex">

        <!-- SIDEBAR -->
        <div class="w-[15%] h-full bg-gray-800 shadow-lg flex flex-col">

            <!-- LOGO -->
            <div class="flex items-center justify-center p-4 cursor-pointer">
                <h2 class="text-2xl font-bold text-blue-600">Placida Connect</h2>
                <span class="ml-5 text-xs text-gray-200">v1.2026.05</span>
            </div>

            <!-- USER INFO -->
            <div class="rounded-lg flex w-max h-max pt-1 pb-1 items-center justify-center gap-6 mt-5 px-4 mx-auto hover:bg-gray-700 cursor-pointer">
                <i class="fa-solid fa-user text-2xl text-gray-200"></i>
                <div>
                    <h2 class="text-sm text-gray-200">John Mark</h2>
                    <h2 class="text-sm text-gray-400">ID:02231</h2>
                </div>
                <i class="fa-solid fa-sort text-sm text-gray-400"></i>
            </div>

            <!-- SCHOOL OVERVIEW -->
            <div class="rounded-lg w-[90%] h-[4%] bg-gray-700 flex items-center justify-center mt-5 mx-auto cursor-pointer">
                <a href="#">
                    <h2 class="text-sm text-gray-200">School Overview</h2>
                </a>
            </div>

            <!-- SCROLL AREA -->
<div class="flex-1 overflow-y-auto mt-5 px-4">

    <h2 class="text-sm text-gray-400 mb-3">MANAGE</h2>

    <div class="flex flex-col gap-3">
        <div class="w-full rounded-lg hover:bg-gray-700 flex items-center gap-3 py-2 px-3 cursor-pointer">
            <i class="fa-solid fa-chalkboard text-gray-200 w-5"></i>
            <h2 class="text-sm text-gray-200">Classes</h2>
        </div>
        <div class="w-full rounded-lg hover:bg-gray-700 flex items-center gap-3 py-2 px-3 cursor-pointer">
            <i class="fa-solid fa-school text-gray-200 w-5"></i>
            <h2 class="text-sm text-gray-200">Classroom</h2>
        </div>
        <div class="w-full rounded-lg hover:bg-gray-700 flex items-center gap-3 py-2 px-3 cursor-pointer">
            <i class="fa-solid fa-calendar-days text-gray-200 w-5"></i>
            <h2 class="text-sm text-gray-200">Class Schedule</h2>
        </div>
        <div class="w-full rounded-lg hover:bg-gray-700 flex items-center gap-3 py-2 px-3 cursor-pointer">
            <i class="fa-solid fa-user-plus text-gray-200 w-5"></i>
            <h2 class="text-sm text-gray-200">Enrollment</h2>
        </div>
        <div class="w-full rounded-lg hover:bg-gray-700 flex items-center gap-3 py-2 px-3 cursor-pointer">
            <i class="fa-solid fa-book-open text-gray-200 w-5"></i>
            <h2 class="text-sm text-gray-200">Program</h2>
        </div>
        <div class="w-full rounded-lg hover:bg-gray-700 flex items-center gap-3 py-2 px-3 cursor-pointer">
            <i class="fa-solid fa-book text-gray-200 w-5"></i>
            <h2 class="text-sm text-gray-200">Curricula</h2>
        </div>
        <div class="w-full rounded-lg hover:bg-gray-700 flex items-center gap-3 py-2 px-3 cursor-pointer">
            <i class="fa-solid fa-bookmark text-gray-200 w-5"></i>
            <h2 class="text-sm text-gray-200">Subjects</h2>
        </div>
        <div class="w-full rounded-lg hover:bg-gray-700 flex items-center gap-3 py-2 px-3 cursor-pointer">
            <i class="fa-solid fa-archive text-gray-200 w-5"></i>
            <h2 class="text-sm text-gray-200">Enrollment Archived</h2>
        </div>
    </div>

    <!-- ACCOUNT SECTION -->
    <h2 class="text-sm text-gray-400 mt-6 mb-3">ACCOUNT</h2>

    <div class="flex flex-col gap-3">
        <div class="w-full rounded-lg hover:bg-gray-700 flex items-center gap-3 py-2 px-3 cursor-pointer">
            <i class="fa-solid fa-users text-gray-200 w-5"></i>
            <h2 class="text-sm text-gray-200">Users</h2>
        </div>
        <div class="w-full rounded-lg hover:bg-gray-700 flex items-center gap-3 py-2 px-3 cursor-pointer">
            <i class="fa-solid fa-user-tie text-gray-200 w-5"></i>
            <h2 class="text-sm text-gray-200">Personnels</h2>
        </div>
        <div class="w-full rounded-lg hover:bg-gray-700 flex items-center gap-3 py-2 px-3 cursor-pointer">
            <i class="fa-solid fa-user-graduate text-gray-200 w-5"></i>
            <h2 class="text-sm text-gray-200">Students</h2>
        </div>
    </div>

</div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="w-[85%] h-full bg-white shadow-xl">

            <div class="w-full h-full">

                <!-- HEADER -->
                <div class="w-full h-[5%] border-b border-gray-200 bg-white fixed z-50"></div>

                <!-- CONTENT -->
                <div class="w-full h-full pt-[2%]">
                    @yield('content')
                </div>

            </div>

        </div>

    </div>

</body>
</html>