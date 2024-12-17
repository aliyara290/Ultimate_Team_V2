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
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
    </style>
</head>
<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
            <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="index.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="blank.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Blank Page
            </a>
            <a href="tables.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Tables
            </a>
            <a href="forms.html" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Forms
            </a>
            <a href="tabs.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tablet-alt mr-3"></i>
                Tabbed Content
            </a>
            <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-calendar mr-3"></i>
                Calendar
            </a>
        </nav>
        <a href="#" class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
            <i class="fas fa-arrow-circle-up mr-3"></i>
            Upgrade to Pro!
        </a>
    </aside>

    <div class="max-w-4xl mx-auto mt-10 p-6">
      <!-- Formation Section -->
      <div class="mb-8">
        <label class="block text-sm font-bold mb-2" for="formation">Formation</label>
        <input
          type="text"
          id="formation"
          placeholder="442"
          class="w-full p-2 bg-[#e5e7eb] text-black rounded-md border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>

      <!-- Add Player Section -->
      <h2 class="text-xl font-semibold mb-4">Add Player</h2>
      <form action="forms.php" method="post" class="grid grid-cols-3 gap-4">
        <!-- Row 1 -->
        <div>
          <label class="block text-sm font-bold mb-1" for="name">Name</label>
          <input
            type="text"
            id="name"
            placeholder="Name"
            class="w-full p-2 bg-[#e5e7eb] text-black rounded-md border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>
        <div>
          <label class="block text-sm font-bold mb-1" for="nationalite">Nationalite</label>
          <input
            type="text"
            id="nationalite"
            placeholder="Nationalite"
            class="w-full p-2 bg-[#e5e7eb] text-black rounded-md border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>
        <div>
          <label class="block text-sm font-bold mb-1" for="rating">Rating</label>
          <input
            type="number"
            id="rating"
            placeholder="Rating"
            class="w-full p-2 bg-[#e5e7eb] text-black rounded-md border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <!-- Row 2 -->
        <div>
          <label class="block text-sm font-bold mb-1" for="club">Club</label>
          <input
            type="text"
            id="club"
            placeholder="Club"
            class="w-full p-2 bg-[#e5e7eb] text-black rounded-md border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>
        <div>
          <label class="block text-sm font-bold mb-1" for="league">League</label>
          <input
            type="text"
            id="league"
            placeholder="League"
            class="w-full p-2 bg-[#e5e7eb] text-black rounded-md border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>
        <div>
          <label class="block text-sm font-bold mb-1" for="position">Position</label>
          <input
            type="text"
            id="position"
            placeholder="Position"
            class="w-full p-2 bg-[#e5e7eb] text-black rounded-md border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <!-- Row 3 -->
        <div>
          <label class="block text-sm font-bold mb-1" for="pace">Pace</label>
          <input
            type="number"
            id="pace"
            placeholder="Pace"
            class="w-full p-2 bg-[#e5e7eb] text-black rounded-md border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>
        <div>
          <label class="block text-sm font-bold mb-1" for="shooting">Shooting</label>
          <input
            type="number"
            id="shooting"
            placeholder="Shooting"
            class="w-full p-2 bg-[#e5e7eb] text-black rounded-md border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>
        <div>
          <label class="block text-sm font-bold mb-1" for="passing">Passing</label>
          <input
            type="number"
            id="passing"
            placeholder="Passing"
            class="w-full p-2 bg-[#e5e7eb] text-black rounded-md border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>

        <!-- Row 4 -->
        <div>
          <label class="block text-sm font-bold mb-1" for="dribbling">Dribbling</label>
          <input
            type="number"
            id="dribbling"
            placeholder="Dribbling"
            class="w-full p-2 bg-[#e5e7eb] text-black rounded-md border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>
        <div>
          <label class="block text-sm font-bold mb-1" for="defending">Defending</label>
          <input
            type="number"
            id="defending"
            placeholder="Defending"
            class="w-full p-2 bg-[#e5e7eb] text-black rounded-md border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>
        <div>
          <label class="block text-sm font-bold mb-1" for="physical">Physical</label>
          <input
            type="number"
            id="physical"
            placeholder="Physical"
            class="w-full p-2 bg-[#e5e7eb] text-black rounded-md border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
          />
        </div>
        <div class="mt-8">
          <button
          type="submit"
  
            class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 rounded-md text-white font-bold text-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
          >
            Add player
          </button>
        </div>
      </form>

      <!-- Add Player Button -->
    </div>


    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
</html>
