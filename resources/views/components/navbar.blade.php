<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles for sidenav animation */
        .sidenav {
            transition: width 0.5s;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>

<div id="mySidenav" class="sidenav fixed top-0 left-0 h-full w-0 overflow-x-hidden pt-20 z-10 bg-menu text-black">
    <button class="absolute top-8 right-8" onclick="closeNav()"><i
            class="fa-solid fa-xmark text-4xl hover:text-white duration-300"></i></button>
    <a href="{{ route('patients.index') }}"
        class="block px-8 py-2 text-3xl hover:text-white duration-300 {{ request()->routeIs('patients.index') ? 'underline text-white' : 'no-underline' }}">Patiënten</a>
    <a href="{{ route('recipes.index') }}"
        class="block px-8 py-2 text-3xl hover:text-white duration-300 {{ request()->routeIs('recipes.index') ? 'underline text-white' : 'no-underline' }}">Recepten</a>
</div>

<!-- Overlay -->
<div id="overlay" class="overlay" onclick="closeNav()"></div>

<div class="w-full flex flex-row justify-between p-12">
    <span class="text-5xl cursor-pointer hover:text-gray-500 duration-300" onclick="openNav()"><i
            class="fa-solid fa-bars"></i></span>
    <img src="/images/logo.svg" alt="Logo" class="h-16 w-auto">
</div>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "300px";
        document.getElementById("overlay").classList.add("active");
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("overlay").classList.remove("active");
    }
</script>
