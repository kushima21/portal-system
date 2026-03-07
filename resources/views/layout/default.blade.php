<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css','resources/css/index.css','resources/js/app.js'])

    <title>Document</title>
</head>

<body>

<div class="w-full h-screen bg-white">
    <div class="w-full h-full flex">

        <div class="w-[20%] h-full shadow-sm">
            <div class="w-full h-full flex justify-center flex-col items-center">
                <div class="w-full flex items-center justify-center">
                    <h2 class="text-xl font-bold">Placida Connect</h2>
                    <span class="text-sm ml-2">v1.2026.07</span>
                </div>
                <div class="w-[90%] h-[10%] mt-5 bg-amber-200 rounded-lg cursor-pointer">
                    <div class="flex items-center justify-center gap-2">
                        <div class="">
                            <h>John Mark</h>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-[80%] h-full"></div>

    </div>
</div>

</body>
</html>