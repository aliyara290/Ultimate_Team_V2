<?php
include "../../src/php/database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_nationality'])) {
    
    $nationality = $_POST['add_nationality'];

    $sql = "INSERT INTO nationalities (nationalite_name) VALUES (?)";
    // prepar the statement 
    $stmt = mysqli_prepare($conn, $sql);
    // bind the parameters
    mysqli_stmt_bind_param($stmt, 's', $nationality);

    if(mysqli_stmt_execute($stmt)) {
        echo '<script>alert("seccuss")</script>';
    } else {
        echo '<script>alert("failed ")</script>';
    }
    mysqli_stmt_close($stmt);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_club'])) {
    $club = $_POST['add_club'];
    $sql = "INSERT INTO clubs (club_name) VALUES (?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $club);

    if(mysqli_stmt_execute($stmt)) {
        echo '<script>alert("seccuss")</script>';
    } else {
        echo '<script>alert("failed ")</script>';
    }

    mysqli_stmt_close($stmt);
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_league'])) {
    $club = $_POST['add_league'];
    $sql = "INSERT INTO leagues (league_name) VALUES (?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $club);
    if(mysqli_stmt_execute($stmt)) {
        echo '<script>alert("seccuss")</script>';
    } else {
        echo '<script>alert("failed ")</script>';
    }
    mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Admin Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            background: #1947ee;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
        }
    </style>
</head>

<body class="bg-gray-100 font-family-karla flex">

<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="./index.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="./form.php" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Forms
            </a>
            <a href="./tables.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Players
            </a>
            <a href="./create.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Add Player
            </a>
          
        </nav>
    </aside>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen"
                    class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
                </button>
                <button x-show="isOpen" @click="isOpen = false"
                    class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <a href="index.html"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="blank.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Blank Page
                </a>
                <a href="tables.html"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    Tables
                </a>
                <a href="forms.html"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-align-left mr-3"></i>
                    Forms
                </a>
                <a href="tabs.html"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-tablet-alt mr-3"></i>
                    Tabbed Content
                </a>
                <a href="calendar.html"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-calendar mr-3"></i>
                    Calendar
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-cogs mr-3"></i>
                    Support
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-user mr-3"></i>
                    My Account
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Sign Out
                </a>
                <button
                    class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-arrow-circle-up mr-3"></i> Upgrade to Pro!
                </button>
            </nav>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex md:flex-row flex-col md:flex-wrap p-6 ">
                <div class="form_row md:w-1/3 ">

                    <h1 class="text-3xl text-black pb-6">Add Nationalite</h1>

                    <form action="form.php" method="POST">
                        <div class="flex flex-col gap-4">
                            <div class="space-y-1 flex flex-col">
                                <label for="add_nationality">Nationality</label>
                                <input class="W-full max-w-xs rounded-lg border-gray-200 bg-gray-200 p-3 text-sm"
                                    placeholder="nationality" type="text" name="add_nationality" />
                            </div>
                            <div class="">
                                <button type="submit"
                                    class="rounded-lg border-gray-200 bg-blue-500 text-white p-3 text-sm">Add
                                    Nationality</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form_row md:w-1/3 ">
                    <h1 class="text-3xl text-black pb-6">Add League</h1>

                    <form action="form.php" method="POST">
                        <div class="flex flex-col gap-4">
                            <div class="space-y-1 flex flex-col">
                                <label for="add_league">League</label>
                                <input class="W-full max-w-xs rounded-lg border-gray-200 bg-gray-200 p-3 text-sm"
                                    placeholder="League" type="text" name="add_league" />
                            </div>
                            <div class="">
                                <button type="submit"
                                    class="rounded-lg border-gray-200 bg-blue-500 text-white p-3 text-sm">Add
                                    League</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form_row md:w-1/3 ">
                    <h1 class="text-3xl text-black pb-6">Add Club</h1>

                    <form action="form.php" method="POST">
                        <div class="flex flex-col gap-4">
                            <div class="space-y-1 flex flex-col">
                                <label for="add_club">Club</label>
                                <input class="W-full max-w-xs rounded-lg border-gray-200 bg-gray-200 p-3 text-sm"
                                    placeholder="Club" type="text" name="add_club" />
                            </div>
                            <div class="">
                                <button type="submit"
                                    class="rounded-lg border-gray-200 bg-blue-500 text-white p-3 text-sm">Add
                                    Club</button>
                            </div>
                        </div>
                    </form>
                </div>
            </main>

            <footer class="w-full bg-white text-right p-4">
                Built by <a target="_blank" href="https://davidgrzyb.com" class="underline">David Grzyb</a>.
            </footer>
        </div>

    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>

</html>