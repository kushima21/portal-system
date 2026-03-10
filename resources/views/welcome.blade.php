<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css'])
</head>
<body>
<div class="w-full min-h-screen bg-white">
    <div class="w-full h-full flex">

        <div class="w-full md:w-[30%] h-full flex items-center justify-center md:pl-20 px-6">
            <div class="w-full h-full flex flex-col items-center justify-center gap-5 max-w-md">

                <div class="w-full flex mt-12 mb-7">
                    <img src="/system-images/ckcm.png" alt="Logo" class="w-15 h-15 md:w-25 md:h-25">
                </div>

                <div class="w-full ">
                    <h2 class="text-xl">Sign in to your PMNS</h2>
                    <h2 class="text-lg">Connect</h2>
                </div>

                <div class="w-full flex gap-2">
                    <p>Or</p>
                    <a href="/register">
                        <span class="text-green-500 font-semibold hover:text-green-600 transition">
                            Start enroll today!
                        </span>
                    </a>
                </div>

                <div class="w-full">
                    <form method="POST" action="" class="flex flex-col gap-3">
                        <label for="idNumber">ID number or email</label>
                        <input type="text" placeholder="@pmnhs.edu.ph" id="idNumber" name="idNumber"
                            class="border border-gray-300 rounded-md p-2 w-full 
                            focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition">

                        <label for="password">Password</label>
                        <input type="password" placeholder="password" id="password" name="password"
                            class="border border-gray-300 rounded-md p-2 w-full 
                            focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition">
                    </form>
                </div>

                <div class="w-full flex items-center justify-between text-sm">
                    <div>
                        <input type="checkbox" id="rememberMe" name="rememberMe" class="mr-2">
                        <label for="rememberMe">Remember me</label>
                    </div>
                    <a href="#" class="text-blue-500 hover:underline">Forgot password?</a>
                </div>

                <div class="w-full">
                    <button type="submit"
                        class="bg-gradient-to-r from-green-400 to-green-800 text-white py-2 px-4 w-full rounded-md hover:from-green-600 hover:to-green-800 transition duration-300">
                        Sign In
                    </button>
                </div>

                <span>Or continue with</span>

                <div class="w-full">
                    <button
                        class="bg-gray-200 text-gray-700 py-2 px-4 rounded-md w-full flex items-center justify-center gap-2">
                        <img src="/system-images/google.png" alt="Google Logo" class="w-5 h-5">
                        Sign in with Google
                    </button>
                </div>

                <div class="w-full flex items-start">
                    <p class="text-[12px] text-center md:text-left">
                        By clicking “Sign in”, you agree to our Terms of Service and Privacy Statement.
                        We’ll occasionally send you account related emails.
                    </p>
                </div>

            </div>
        </div>

    </div>
</div>

</body>
</html>