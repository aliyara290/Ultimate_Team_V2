<?php
include "../../src/php/database.php";

// count total player 
$sql = "SELECT COUNT(*) AS totalPlayer FROM player";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$totalPlayers = $data['totalPlayer'];

// count player by position
$sql2 = "SELECT position, COUNT(*) AS count FROM player GROUP BY position";
$po_result = $conn->query($sql2);
$labels = [];
$count = [];
while ($row = $po_result->fetch_assoc()) {
    $labels[] = $row['position'];
    $count[] = $row['count'];
}
// count players by nationality

$sql3 = "SELECT n.nationalite_name, p.nationalite_id, COUNT(*) AS count 
        FROM player p
        JOIN nationalities n ON p.nationalite_id = n.nationalite_id
        GROUP BY p.nationalite_id, n.nationalite_name;
";
$n_result = $conn->query($sql3);
$n_names = [];
$n_count = [];

while ($row2 = $n_result->fetch_assoc()) {
    $n_names[] = $row2['nationalite_name'];
    $n_count[] = $row2['count'];
}
// $conn->close();
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
            <a href="./index.php" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="./form.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
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

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
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
                <a href="index.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="blank.html"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
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

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black">Dashboard</h1>
                <div class="text-xl my-10 px-24 py-16 bg-white w-max rounded-2xl shadow-md">
                    <h3 class="flex gap-3 items-center">
                        <i class="fas fa-users text-blue-500 mr-2 text-4xl"></i>
                        <span>Players: </span>
                        <span class="font-bold text-2xl text-blue-500">
                            <?= $totalPlayers ?>
                        </span>
                    </h3>
                </div>
                <div class="flex flex-wrap mt-6">

                    <div class="w-full lg:w-1/2 pl-0 mt-12 lg:mt-0 pr-3">
                        <p class="text-xl pb-3 flex items-center">
                            <i class="fas fa-circle text-blue-500  mr-3"></i> Nationality Distribution
                        </p>
                        <div class="p-6 bg-white">
                            <canvas id="nationalityDistribution" width="600" height="400"></canvas>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2 pr-0">
                        <p class="text-xl pb-3 flex items-center">
                            <i class="fas fa-circle text-blue-500 mr-3"></i> Players by position
                        </p>

                        <div class="p-6 bg-white">
                            <canvas id="playersByPosition" width="600" height="400"></canvas>
                        </div>
                    </div>
                    <!-- <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-0">
                        <p class="text-xl pb-3 flex items-center">
                            <i class="fas fa-circle text-blue-500  mr-3"></i> Resolved Reports
                        </p>
                        <div class="p-6 bg-white">
                        <canvas id="teamPerformance" width="600" height="400"></canvas>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-0">
                        <p class="text-xl pb-3 flex items-center">
                            <i class="fas fa-check mr-3"></i> Resolved Reports
                        </p>
                        <div class="p-6 bg-white">
                        <canvas id="totalPlayersChart" width="600" height="400"></canvas>
                        </div>
                    </div> -->


                </div>

                <div class="w-full mt-12">
                    <p class="text-xl pb-3 flex items-center font-bold">
                        <i class="fas fa-user mr-3 text-blue-500"></i> Top 5 players
                    </p>
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-blue-500 text-white">
                                <tr>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">First Name</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Last name</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Position</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Rating</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nationality</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Club</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">League</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                <?php
                                $sql4 = "SELECT 
                                        p.first_name,
                                        p.last_name,
                                        p.position,
                                        o.rating,
                                        n.nationalite_name,
                                        c.club_name,
                                        l.league_name
                                        from player p
                                        INNER JOIN nationalities n ON p.nationalite_id = n.nationalite_id
                                        INNER JOIN outfield_player_stats o ON p.player_id = o.player_id
                                        INNER JOIN clubs c ON p.club_id = c.club_id 
                                        INNER JOIN leagues l ON p.league_id = l.league_id
                                        WHERE position!='GK' ORDER BY rating DESC LIMIT 5;
                                    ";
                                $result4 = $conn->query($sql4);
                                
                                while ($row4 = $result4->fetch_assoc()): ?>
                                    <tr>
                                        <td class="text-left py-3 px-4"><?= $row4['first_name']?></td>
                                        <td class="text-left py-3 px-4"><?= $row4['last_name']?></td>
                                        <td class="text-left py-3 px-4"><?= $row4['position']?></td>
                                        <td class="text-left py-3 px-4 text-blue-700"><?= $row4['rating']?></td>
                                        <td class="text-left py-3 px-4"><?= $row4['nationalite_name']?></td>
                                        <td class="text-left py-3 px-4"><?= $row4['club_name']?></td>
                                        <td class="text-left py-3 px-4"><?= $row4['league_name']?></td>
                                    </tr>
                                <?php
                                endwhile;
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
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    <!-- Include Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Canvas elements for charts -->


    <script>
        // Data
        const playersByPositionData = {
            labels: <?= json_encode($labels); ?>,
            datasets: [{
                label: 'Players by Position',
                data: <?= json_encode($count); ?>, // Example data
                backgroundColor: ["#D45B6F", "#2A80B8", "#D1A23A", "#388C8C", "#7A4CC7", "#D5792A", "#D1A34A", "#3A0066", "#00CC66", "#6A2DAE", "#E6B800"],
                borderColor: ["#D45B6F", "#2A80B8", "#D1A23A", "#388C8C", "#7A4CC7", "#D5792A", "#D1A34A", "#3A0066", "#00CC66", "#6A2DAE", "#E6B800"],
                borderWidth: 1,
                borderRadius: 20,
            }]
        };

        const nationalityDistributionData = {
            labels: <?= json_encode($n_names); ?>,
            datasets: [{
                label: 'Distribution by Nationality',
                data: <?= json_encode($n_count); ?>, // Example data
                backgroundColor: ['#7a6442', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],
                borderColor: ['#7a6442', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],
                borderWidth: 1
            }]
        };

        // const teamPerformanceData = {
        //     labels: ['January', 'February', 'March', 'April', 'May'], // Example months
        //     datasets: [{
        //         label: 'Team Performance (Goals)',
        //         data: [12, 19, 3, 5, 2], // Example data
        //         fill: false,
        //         borderColor: '#36A2EB',
        //         tension: 0.1
        //     }]
        // };

        // const totalPlayersData = {
        //     labels: ['Total Players'], // Single label
        //     datasets: [{
        //         label: 'Players in Database',
        //         data: [<?= $totalPlayers ?>], // PHP variable injected
        //         backgroundColor: ['#36A2EB'], // Customize color
        //         borderColor: ['#1E90FF'], // Border color
        //         borderWidth: 1

        //     }]
        // };

        // Chart Configurations
        const playersByPositionConfig = {
            type: 'bar',
            data: playersByPositionData,
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true },
                    title: { display: true, text: 'Players by Position' }
                }
            }
        };

        const nationalityDistributionConfig = {
            type: 'bar',
            data: nationalityDistributionData,
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true },
                    title: { display: true, text: 'Distribution by Nationality' }
                }
            }
        };

        // const teamPerformanceConfig = {
        //     type: 'line',
        //     data: teamPerformanceData,
        //     options: {
        //         responsive: true,
        //         plugins: {
        //             legend: { display: true },
        //             title: { display: true, text: 'Team Performance Over Time' }
        //         },
        //         scales: {
        //             x: { title: { display: true, text: 'Months' } },
        //             y: { title: { display: true, text: 'Goals Scored' } }
        //         }
        //     }
        // };

        // const totalPlayersConfig = {
        //     type: 'bar',
        //     data: totalPlayersData,
        //     options: {
        //         responsive: true,
        //         plugins: {
        //             legend: { display: true },
        //             title: { display: true, text: 'Total Players in the Database' }
        //         }
        //     }
        // };

        // Render Charts
        new Chart(document.getElementById('playersByPosition'), playersByPositionConfig);
        new Chart(document.getElementById('nationalityDistribution'), nationalityDistributionConfig);
        // new Chart(document.getElementById('teamPerformance'), teamPerformanceConfig);
        // new Chart(document.getElementById('totalPlayersChart'), totalPlayersConfig);
    </script>


</body>

</html>