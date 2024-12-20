<?php
include "../../src/php/database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $rating = (int) $_POST['rating'];
  $nationality = (int) $_POST['nationality'];
  $league = (int) $_POST['league'];
  $club = (int) $_POST['club'];
  $position = $_POST['position'];

  $sql_player = 'INSERT INTO player (first_name, last_name, position, nationalite_id, league_id, club_id) VALUES (?, ?, ?, ?, ?, ?)';
  $stmt_player = mysqli_prepare($conn, $sql_player);
  mysqli_stmt_bind_param($stmt_player, 'sssiii', $first_name, $last_name, $position, $nationality, $league, $club);

  if (mysqli_stmt_execute($stmt_player)) {
    $player_id = mysqli_insert_id($conn);
    var_dump($player_id);
  } else {
    echo 'Failed to insert player data.';
    mysqli_stmt_close($stmt_player);
    mysqli_close($conn);
    exit;
  }
  mysqli_stmt_close($stmt_player);

  if ($position === 'GK') {
    $diving = $_POST['diving'];
    $handling = $_POST['handling'];
    $kicking = $_POST['kicking'];
    $positioning = $_POST['positioning'];
    $reflexes = $_POST['reflexes'];
    $speed = $_POST['speed'];

    $sql_stats = 'INSERT INTO goalkeeper_stats (player_id, rating, diving, handling, kicking, positioning, reflexes, speed) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
    $stmt_stats = mysqli_prepare($conn, $sql_stats);
    mysqli_stmt_bind_param($stmt_stats, 'iiiiiiii', $player_id, $rating, $diving, $handling, $kicking, $positioning, $reflexes, $speed);
  } else {
    $pace = $_POST['pace'];
    $shooting = $_POST['shooting'];
    $passing = $_POST['passing'];
    $dribbling = $_POST['dribbling'];
    $defending = $_POST['defending'];
    $physical = $_POST['physical'];

    $sql_stats = 'INSERT INTO outfield_player_stats (player_id, rating, pace, shooting, passing, dribbling, defending, physical) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
    $stmt_stats = mysqli_prepare($conn, $sql_stats);
    mysqli_stmt_bind_param($stmt_stats, 'iiiiiiii', $player_id, $rating, $pace, $shooting, $passing, $dribbling, $defending, $physical);
  }

  if (mysqli_stmt_execute($stmt_stats)) {
    header("location: /Ultimate_Team_V2/public/dashboard/tables.php");
    exit();
  } else {
    echo 'Failed to insert stats data.';
  }
  mysqli_stmt_close($stmt_stats);

  mysqli_close($conn);
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
            <a href="./form.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Forms
            </a>
            <a href="./tables.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Players
            </a>
            <a href="./create.php" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Add Player
            </a>
        </nav>
    </aside>
  <div class="w-full h-screen overflow-auto">
    <!-- Desktop Header -->
    <header class="sticky top-0 w-full items-center bg-white py-2 px-6 hidden sm:flex">
      <div class="w-1/2"></div>
      <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
        <button @click="isOpen = !isOpen"
          class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
          <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
        </button>
        <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
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
        <a href="index.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-tachometer-alt mr-3"></i>
          Dashboard
        </a>
        <a href="blank.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
          <i class="fas fa-sticky-note mr-3"></i>
          Blank Page
        </a>
        <a href="tables.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-table mr-3"></i>
          Tables
        </a>
        <a href="forms.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-align-left mr-3"></i>
          Forms
        </a>
        <a href="tabs.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
          <i class="fas fa-tablet-alt mr-3"></i>
          Tabbed Content
        </a>
        <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
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
    <div class="w-full max-w-2xl mx-auto mt-10 p-6 ">

      <div class="mb-5">
        <h1 class="text-3xl text-black font-bold">Add Player Form</h1>
      </div>

      <form action="create.php" method="POST" class="space-y-4">

        <div class="grid grid-cols-3 gap-4">
          <div class="space-y-1">
            <label for="first_name">First Name</label>
            <input class="w-full rounded-lg border-gray-200 bg-gray-200 p-3 text-sm" placeholder="First Name"
              type="text" name="first_name" />
          </div>
          <div class="space-y-1">
            <label for="last_name">Last Name</label>
            <input class="w-full rounded-lg border-gray-200 bg-gray-200 p-3 text-sm" placeholder="Last Name" type="text"
              name="last_name" />
          </div>
          <div class="space-y-1">
            <label for="rating">Rating</label>
            <input class="w-full rounded-lg border-gray-200 bg-gray-200 p-3 text-sm" placeholder="Rating" type="number"
              name="rating" />
          </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
          <div class="space-y-1">
            <label for="nationality">Nationality</label>
            <select name="nationality" id="nationality"
              class="w-full rounded-lg border-gray-200 bg-gray-200 p-3 text-sm">
              <option disabled selected>Select</option>
              <?php
              $sql = 'SELECT * FROM nationalities';
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()): ?>
                <option value=<?= $row['nationalite_id'] ?>><?= $row['nationalite_name'] ?></option>
                <?php
              endwhile;
              ?>
            </select>
          </div>
          <div class="space-y-1">
            <label for="league">League</label>

            <select name="league" id="league" class="w-full rounded-lg border-gray-200 bg-gray-200 p-3 text-sm">
              <option disabled selected>Select</option>
              <?php
              $sql = 'SELECT * FROM leagues';
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()): ?>
                <option value=<?= $row['league_id'] ?>><?= $row['league_name'] ?></option>
                <?php
              endwhile;
              ?>
            </select>
          </div>
          <div class="space-y-1">
            <label for="club">Club</label>
            <select name="club" id="club" class="w-full rounded-lg border-gray-200 bg-gray-200 p-3 text-sm">
              <option disabled selected>Select</option>
              <?php
              $sql = 'SELECT * FROM clubs';
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()): ?>
                <option value=<?= $row['club_id'] ?>><?= $row['club_name'] ?></option>
                <?php
              endwhile;
              ?>
            </select>
          </div>
          <div class="space-y-1">
            <label for="position">Position</label>
            <select name="position" id="position" class="w-full rounded-lg border-gray-200 bg-gray-200 p-3 text-sm">
              <option disabled selected>Select</option>
              <option value="GK">GK</option>
              <option value="RB">RB</option>
              <option value="CRB">CRB</option>
              <option value="CLB">CLB</option>
              <option value="LB">LB</option>
              <option value="RM">RM</option>
              <option value="CM">CM</option>
              <option value="LM">LM</option>
              <option value="RW">RW</option>
              <option value="AT">AT</option>
              <option value="LW">LW</option>
            </select>
          </div>
        </div>
        <fieldset class="space-y-4" id="outfield_player" style="display: none;">
          <div class="my-3">
            <h1 class="text-2xl text-black font-bold">Outfield State</h1>
          </div>
          <div class="grid grid-cols-3 gap-4">
            <div class="space-y-1">
              <label for="pace">Pace</label>
              <input class="w-full rounded-lg border-gray-200 bg-gray-200 p-3 text-sm" placeholder="Pace" type="number"
                name="pace" />
            </div>
            <div class="space-y-1">
              <label for="shooting">Shooting</label>
              <input class="w-full rounded-lg border-gray-200 bg-gray-200 p-3 text-sm" placeholder="Shooting"
                type="number" name="shooting" />
            </div>
            <div class="space-y-1">
              <label for="passing">Passing</label>
              <input class="w-full rounded-lg border-gray-200 bg-gray-200 p-3 text-sm" placeholder="Passing"
                type="number" name="passing" />
            </div>
          </div>
          <div class="grid grid-cols-3 gap-4">
            <div class="space-y-1">
              <label for="dribbling">Dribbling</label>
              <input class="w-full rounded-lg border-gray-200 bg-gray-200 p-3 text-sm" placeholder="Dribbling"
                type="number" name="dribbling" />
            </div>
            <div class="space-y-1">
              <label for="defending">Defending</label>
              <input class="w-full rounded-lg border-gray-200 bg-gray-200 p-3 text-sm" placeholder="Defending"
                type="number" name="defending" />
            </div>
            <div class="space-y-1">
              <label for="physical">Physical</label>
              <input class="w-full rounded-lg border-gray-200 bg-gray-200 p-3 text-sm" placeholder="Physical"
                type="number" name="physical" />
            </div>
          </div>
        </fieldset>

        <fieldset class="space-y-4" id="goolkeeper_form" style="display: none;">
          <div class="mt-3">
            <h1 class="text-2xl text-black font-bold">Goalkeeper State</h1>
          </div>
          <div class="grid grid-cols-3 gap-4">
            <div class="space-y-1">
              <label for="diving">Diving</label>
              <input class="w-full rounded-lg border-gray-200 bg-gray-200 p-3 text-sm" placeholder="Diving"
                type="number" name="diving" />
            </div>
            <div class="space-y-1">
              <label for="handling">Handling</label>
              <input class="w-full rounded-lg border-gray-200 bg-gray-200 p-3 text-sm" placeholder="Handling"
                type="number" name="handling" />
            </div>
            <div class="space-y-1">
              <label for="kicking">Kicking</label>
              <input class="w-full rounded-lg border-gray-200 bg-gray-200 p-3 text-sm" placeholder="Kicking"
                type="number" name="kicking" />
            </div>
          </div>
          <div class="grid grid-cols-3 gap-4">
            <div class="space-y-1">
              <label for="positioning">Positioning</label>
              <input class="w-full rounded-lg border-gray-200 bg-gray-200 p-3 text-sm" placeholder="Positioning"
                type="number" name="positioning" />
            </div>
            <div class="space-y-1">
              <label for="reflexes">Reflexes</label>
              <input class="w-full rounded-lg border-gray-200 bg-gray-200 p-3 text-sm" placeholder="Reflexes"
                type="number" name="reflexes" />
            </div>
            <div class="space-y-1">
              <label for="speed">Speed</label>
              <input class="w-full rounded-lg border-gray-200 bg-gray-200 p-3 text-sm" placeholder="Speed" type="number"
                name="speed" />
            </div>
          </div>
        </fieldset>

        <div class="mt-4 pb-10">
          <button type="submit"
            class="inline-block w-full rounded-lg bg-blue-500 px-5 py-3 font-medium text-white sm:w-auto">
            Add Player
          </button>
        </div>
      </form>

    </div>
  </div>


  <!-- AlpineJS -->
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <!-- Font Awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
    integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
  <!-- <script src="../../src/js/main.js"></script> -->
  <script>
    const position = document.getElementById("position");
    const outfieldForm = document.getElementById("outfield_player");
    const goolkeeperForm = document.getElementById("goolkeeper_form");

    position.addEventListener("change", function () {
      const pos = this.value;
      console.log(pos);

      if (pos == "GK") {
        outfieldForm.style.display = "none";
        goolkeeperForm.style.display = "block";
      } else {
        outfieldForm.style.display = "block";
        goolkeeperForm.style.display = "none";
      }
    });
  </script>
</body>

</html>