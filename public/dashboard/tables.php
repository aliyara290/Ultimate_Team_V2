<?php
include "../../src/php/database.php";
// include "../../public/dashboard/delete.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Admin Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <link rel="stylesheet" href="../../src/css/style.css">
    <script src="https://kit.fontawesome.com/f01941449c.js" crossorigin="anonymous"></script>
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
            <a href="./form.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Forms
            </a>
            <a href="./tables.php" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
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
                <a href="blank.html"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Blank Page
                </a>
                <a href="tables.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
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
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Players Data</h1>
                <div class="w-full mt-6">
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th
                                        class="text-left py-3 px-4 uppercase font-semibold text-sm text-center bg-red-800">
                                        ID</th>
                                    <th
                                        class="text-left py-3 px-4 uppercase font-semibold text-sm text-center bg-blue-800">
                                        Full Name</th>
                                    <th
                                        class="text-left py-3 px-4 uppercase font-semibold text-sm text-center bg-blue-800">
                                        Leagues</td>
                                    <th
                                        class="text-left py-3 px-4 uppercase font-semibold text-sm text-center bg-blue-800">
                                        Nationality</th>
                                    <th
                                        class="text-left py-3 px-4 uppercase font-semibold text-sm text-center bg-blue-800">
                                        Club</td>
                                    <th
                                        class="text-left py-3 px-4 uppercase font-semibold text-sm text-center bg-blue-800">
                                        Position</td>
                                    <th
                                        class="text-left py-3 px-4 uppercase font-semibold text-sm text-center bg-blue-800">
                                        Rating</td>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center">Pac</td>
                                    <th
                                        class="text-left py-3 px-4 uppercase font-semibold text-sm text-center bg-gray-600">
                                        Div</td>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center">Sho</td>
                                    <th
                                        class="text-left py-3 px-4 uppercase font-semibold text-sm text-center bg-gray-600">
                                        Han</td>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center">Pas</td>
                                    <th
                                        class="text-left py-3 px-4 uppercase font-semibold text-sm text-center bg-gray-600">
                                        Kic</td>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center">Dri</td>
                                    <th
                                        class="text-left py-3 px-4 uppercase font-semibold text-sm text-center bg-gray-600">
                                        Ref</td>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center">Def</td>
                                    <th
                                        class="text-left py-3 px-4 uppercase font-semibold text-sm text-center bg-gray-600">
                                        Spe</td>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center">Phy</td>
                                    <th
                                        class="text-left py-3 px-4 uppercase font-semibold text-sm text-center bg-gray-600">
                                        Pos</td>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm text-center">Manage
                                        </td>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 even:bg-gray-700" id="table-even">
                                <?php
                                $sql = "SELECT 
                                p.player_id,
                                p.first_name,
                                p.last_name,
                                p.position,
                                n.nationalite_name,
                                l.league_name,
                                c.club_name,
                                CASE 
                                    WHEN gk.player_id IS NOT NULL THEN 'Goalkeeper'
                                    ELSE 'Outfield Player'
                                END AS player_type,
                                COALESCE(gk.rating, ops.rating) AS player_rating,
                                gk.diving,
                                gk.handling,
                                gk.kicking,
                                gk.positioning,
                                gk.reflexes,
                                gk.speed,
                                ops.pace,
                                ops.shooting,
                                ops.passing,
                                ops.dribbling,
                                ops.defending,
                                ops.physical
                            FROM 
                                player p
                            INNER JOIN 
                                nationalities n ON p.nationalite_id = n.nationalite_id
                            INNER JOIN 
                                leagues l ON p.league_id = l.league_id
                            INNER JOIN 
                                clubs c ON p.club_id = c.club_id
                            LEFT JOIN 
                                goalkeeper_stats gk ON p.player_id = gk.player_id
                            LEFT JOIN 
                                outfield_player_stats ops ON p.player_id = ops.player_id
                                ORDER BY player_id;
                                ";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()):?> 
                                        <tr>
                                            <td class='text-left py-3 px-4 text-center font-bold text-red-800'><?= $row['player_id']?></td>
                                            <td class='text-left py-3 px-4 text-center'><?= $row['first_name'] . ' ' . $row['last_name'] ?></td>
                                            <td class='text-left py-3 px-4 text-center'><?= $row['league_name']?></td>
                                            <td class='text-left py-3 px-4 text-center'><?= $row['nationalite_name']?></td>
                                            <td class='text-left py-3 px-4 text-center'><?= $row['club_name']?></td>
                                            <td class='text-left py-3 px-4 text-center'><?= $row['position']?></td>
                                            <td class='text-left py-3 px-4 text-center'><?= $row['player_rating']?></td>
                                            <td class='text-left py-3 px-4 text-center font-bold text-blue-800'><?= $row['pace']?></td>
                                            <td class='text-left py-3 px-4 text-center font-bold text-green-800'><?= $row['diving']?></td>
                                            <td class='text-left py-3 px-4 text-center font-bold text-blue-800'><?= $row['shooting']?></td>
                                            <td class='text-left py-3 px-4 text-center font-bold text-green-800'><?= $row['handling']?></td>
                                            <td class='text-left py-3 px-4 text-center font-bold text-blue-800'><?= $row['passing']?></td>
                                            <td class='text-left py-3 px-4 text-center font-bold text-green-800'><?= $row['kicking']?></td>
                                            <td class='text-left py-3 px-4 text-center font-bold text-blue-800'><?= $row['dribbling']?></td>
                                            <td class='text-left py-3 px-4 text-center font-bold text-green-800'><?= $row['positioning']?></td>
                                            <td class='text-left py-3 px-4 text-center font-bold text-blue-800'><?= $row['defending']?></td>
                                            <td class='text-left py-3 px-4 text-center font-bold text-green-800'><?= $row['reflexes']?></td>
                                            <td class='text-left py-3 px-4 text-center font-bold text-blue-800'><?= $row['physical']?></td>
                                            <td class='text-left py-3 px-4 text-center font-bold text-green-800'><?= $row['speed']?></td>
                                            <td class='text-left py-3 px-4 flex justify-center gap-3'>
                                            <a href="/Ultimate_Team_V2/public/dashboard/edit.php?id=<?= $row['player_id'] ?>" class="btn-edit"><i class='fa-solid fa-pen-to-square cursor-pointer text-green-600'></i></a>
                                            <span><a href="/Ultimate_Team_V2/public/dashboard/delete.php?id=<?= $row['player_id']?>" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')"><i class='fa-solid fa-trash-can cursor-pointer text-red-600'></i></a></span>
                                            </td>
                                        </tr>
                                        <?php 
                                        endwhile;
                                        $conn->close();
                                        ?>


                            </tbody>
                        </table>
                    </div>
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