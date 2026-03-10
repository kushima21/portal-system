<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body><div class="w-full min-h-screen bg-white flex items-center justify-center p-4">

    <div class="w-full md:w-[70%] lg:w-[45%] h-max pb-5 pt-10 shadow-xl rounded-lg">

        <!-- LOGO -->
        <div class="w-full flex items-center justify-center">
            <img class="w-28 h-28 md:w-40 md:h-40 mt-10 md:mt-5" src="/system-images/ckcm.png" alt="Logo">
        </div>

        <!-- TITLE -->
        <div class="w-full mt-8 flex items-center justify-center flex-col gap-2 px-4 text-center">
            <h2 class="text-lg md:text-2xl font-bold">
                Placida Meqiuabas National High School
            </h2>
            <p class="text-sm md:text-base">
                Online Registration Form for the Academic Year (SY: 2025-2026)
            </p>
        </div>

        <!-- NOTICE -->
        <div class="w-full mt-8 flex items-center justify-center px-4">
            <div class="w-full md:w-[80%] bg-gray-200 rounded-xl p-4">

                <div class="flex items-center gap-3 mb-2">
                    <i class="fa-solid fa-triangle-exclamation text-yellow-500"></i>
                    <span class="font-bold text-xs md:text-sm">NOTICE!</span>
                </div>

                <p class="text-center text-sm">
                    If you are an existing student, please login to your account here.
                    This form is intended for new and transferring students only.
                </p>

            </div>
        </div>

        <!-- FORM -->
        <div class="w-full flex justify-center mt-6 px-4">
            <div class="w-full md:w-[80%]">

                <form method="POST" action="">

                    <!-- NAME -->
                    <div class="w-full flex flex-col md:flex-row gap-4 md:gap-10">
                        
                        <div class="flex flex-col w-full">
                            <label class="text-sm">First Name</label>
                            <input
                                class="border border-gray-300 rounded-md p-2 w-full 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition"
                                type="text"
                                name="fname"
                                placeholder="Enter First Name..."
                                required
                            >
                        </div>

                        <div class="flex flex-col w-full">
                            <label class="text-sm">Last Name</label>
                            <input  class="border border-gray-300 rounded-md p-2 w-full 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition"
                                type="text" name="lname"
                                placeholder="Enter Last Name...">
                        </div>

                    </div>

                    <!-- EMAIL -->
                    <div class="w-full mt-4">
                        <label class="text-sm">Email</label>
                        <input  class="border border-gray-300 rounded-md p-2 w-full 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition"
                            type="email" name="email"
                            placeholder="Enter Email..." required>
                    </div>

                    <!-- PASSWORD -->
                    <div class="w-full mt-4">
                        <label class="text-sm">Password</label>
                        <input  class="border border-gray-300 rounded-md p-2 w-full 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition"
                            type="password" name="password"
                            placeholder="Enter Password..." required>
                    </div>

                    <!-- CONFIRM -->
                    <div class="w-full mt-4">
                        <label class="text-sm">Confirm Password</label>
                        <input  class="border border-gray-300 rounded-md p-2 w-full 
                                    focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition"
                            type="password" name="password_confirmation"
                            placeholder="Confirm Password..." required>
                    </div>

                    <!-- POLICY -->
                    <div class="w-full flex items-center mt-4">
                        <p class="text-xs md:text-sm text-gray-600">
                            By selecting this, you agree to the
                            <span class="font-semibold">Privacy Policy</span>
                            and
                            <span class="font-semibold">Cookie Policy</span>.
                        </p>
                    </div>

                    <!-- REGISTER -->
                    <div class="w-full mt-5">
                        <button type="submit"
                            class="bg-gradient-to-r from-green-400 to-green-800 text-white py-2 px-4 w-full rounded-md hover:from-green-600 hover:to-green-800 transition duration-300">
                            Register
                        </button>
                    </div>

                    <!-- LOGIN TEXT -->
                    <p class="flex items-center justify-center pt-4 text-sm">
                        Already have an Account?
                    </p>

                    <!-- LOGIN BUTTON -->
                    <div class="w-full mt-3">
                        <a href="/"
                            class="bg-gray-200 text-gray-700 py-2 px-4 rounded-md w-full flex items-center justify-center gap-2 hover:bg-gray-300 transition">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            Login
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>

</div>

</body>
</html>