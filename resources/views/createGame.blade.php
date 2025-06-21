<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Developers</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#101014] text-[#EFECF0] min-h-screen flex flex-col">
  

     
    

    <main class="flex-grow">
        <div class="flex flex-col items-center justify-center px-6 ">
            <div class="">
                <div class="bg-[#101014] flex justify-between h-24 items-center sticky top-0 z-50">
                    <div class="flex items-center">
                            <input 
                            type="text" 
                            placeholder="Search games..." 
                            class="px-4 py-2 w-60 rounded-full bg-[#2C2F36] text-base text-white placeholder-gray-400 focus:outline-none focus:ring focus:ring-blue-500 "
                            />

                            <div class="ml-5">
                                <a class="p-2" href="{{ url('/') }}">Games</a>
                                <a class="p-2" href="{{ url('/about') }}">About</a>
                                <a href="#" onclick="handleYourPost()" class="p-2">Your Post</a>

                            </div>

                            
                    </div>
                    
                    <!-- Login Button -->
                    <div class="gap-2">
                                @if(session('token'))
                                    <form method="POST" action="{{ route('logout') }}" class="inline">
                                        @csrf
                                        <button type="submit" class="bg-[#FFFFFF26] hover:bg-gray-700 text-white font-medium px-3 py-1 rounded-md h-fit">
                                            Logout
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('register.page') }}" class="bg-[#FFFFFF26] hover:bg-gray-700 text-white font-medium px-3 py-1 rounded-md h-fit">Register</a>
                                    <a href="{{ route('login.page') }}" class="bg-[#FFFFFF26] hover:bg-gray-700 text-white font-medium px-3 py-1 rounded-md h-fit">Login</a>
                                @endif
                            </div>
                </div>

                <div class="flex flex-col lg:flex-row gap-5 ">
                    <div class="max-w-4xl lg:w-2/3 mx-auto bg-[#1A1D24] p-8 rounded-lg shadow">
                    <h1 class="text-3xl font-semibold mb-6">Add New Game</h1>
                    <form id="gameForm" method="POST" action="{{ url('api/games') }}" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block mb-2 text-sm font-medium">Game Title</label>
                            <input id="inputTitle" name="title" type="text" class="w-full px-4 py-2 bg-[#2C2F36] rounded-md text-white focus:outline-none" placeholder="Enter game title">
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium">Description</label>
                            <textarea id="inputDesc" name="description"  class="w-full px-4 py-2 bg-[#2C2F36] rounded-md text-white focus:outline-none" rows="4" placeholder="Game description"></textarea>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block mb-2 text-sm font-medium">Detail Image URL</label>
                                <input id="inputImage" name="image" type="text" class="w-full px-4 py-2 bg-[#2C2F36] rounded-md text-white focus:outline-none" placeholder="Image link">
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium">Price ($)</label>
                                <input id="inputPrice" name="price" type="number" class="w-full px-4 py-2 bg-[#2C2F36] rounded-md text-white focus:outline-none" placeholder="0.00">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block mb-2 text-sm font-medium">Genres (comma separated)</label>
                                <input id="inputGenres" name="genre" type="text" class="w-full px-4 py-2 bg-[#2C2F36] rounded-md text-white focus:outline-none" placeholder="Action, Adventure">
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium">Features (comma separated)</label>
                                <input id="inputFeatures" name="class" type="text" class="w-full px-4 py-2 bg-[#2C2F36] rounded-md text-white focus:outline-none" placeholder="Single Player, Multiplayer">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                            <div>
                                <label for="Developer" class="block mb-2 text-sm font-medium">Developer</label>
                                    <select name="developer_id" id="Developer" name="Developer" class="w-full px-3 py-2 rounded-md bg-[#2C2F36] text-white  focus:outline-none focus:ring-2 focus:ring-gray-500">
                                    <option value="">Select Developer</option>
                                </select>             
                            </div>
                            <div>
                                <label for="Publisher" class="block mb-2 text-sm font-medium">Publisher</label>
                                    <select name="publisher_id" id="Publisher" name="Publisher" class="w-full px-3 py-2 rounded-md bg-[#2C2F36] text-white  focus:outline-none focus:ring-2 focus:ring-gray-500">
                                    <option value="">Select Publisher</option>
                                </select>             
                            </div>
                            <div>
                                <label for="Platform" class="block mb-2 text-sm font-medium">Platform</label>
                                    <select name="platform_ids[]" id="Platform" name="Platform" class="w-full px-3 py-2 rounded-md bg-[#2C2F36] text-white  focus:outline-none focus:ring-2 focus:ring-gray-500">
                                    <option value="">Select Platform</option>
                                </select>             
                            </div>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium">Poster Image URL</label>
                            <input id="inputPoster" name="poster" type="text" class="w-full px-4 py-2 bg-[#2C2F36] rounded-md text-white focus:outline-none" placeholder="Image link">
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium">Website Link</label>
                            <input id="inputWebsite" name="website" type="text" class="w-full px-4 py-2 bg-[#2C2F36] rounded-md text-white focus:outline-none" placeholder="Website link">
                        </div>
                        <div id="sections-container" class="space-y-4">
                            <div class="section-pair">
                                <label class="block text-sm font-medium mb-1">Section Title</label>
                                <input type="text" name="section_titles[]" class="w-full px-4 py-2 bg-[#2C2F36] rounded-md text-white focus:outline-none section-title" placeholder="Enter section title" />

                                <label class="block text-sm font-medium mt-4 mb-1">Section Description</label>
                                <textarea name="section_descriptions[]" rows="3" class="w-full px-4 py-2 bg-[#2C2F36] rounded-md text-white focus:outline-none section-description" placeholder="Enter section description"></textarea>
                            </div>
                        </div>


                         <button type="submit" class="w-full bg-[#22B8F6] hover:bg-[#1aa9e3] text-black font-semibold py-2 rounded-md transition">
                            Submit Game
                        </button>
                    </form>
                    </div>

                    <div class="lg:w-[372.500px] hidden lg:block sticky top-24 self-start z-0">
                        <h2 class="text-5xl font-bold mb-6 pt-7" id="previewTitle">Game Tile</h2>

                        <div class="space-y-6">
                            <img id="previewImage" class="rounded-lg w-full max-w-xl" src="" alt="Preview Image" />

                            <div class="space-y-6">
                            <h1 id="previewDesc">Game description will appear here...</h1>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="pr-5 space-y-2">
                                <h1 class="text-[#FFFFFFA6]">Genres</h1>
                                <div id="previewGenres" class="flex flex-wrap gap-2"></div>
                                </div>

                                <div class="border-l-2 border-[#6a6e7b] px-5 space-y-2">
                                <h1 class="text-[#FFFFFFA6]">Features</h1>
                                <div id="previewFeatures" class="flex flex-wrap gap-2"></div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <div id="previewSections" class="space-y-8"></div>


                        <div class="bg-[#1A1C20] p-6 rounded-lg shadow space-y-4 h-fit">
                    <span class="text-xs bg-[#2F3138] px-2 py-1 rounded-md inline-block text-gray-300">Base Game</span>

                    <div class="text-2xl font-semibold">$4.29</div>

                    <div class="space-y-3">
                        <button class="w-full bg-[#22B8F6] hover:bg-[#1aa9e3] text-black font-semibold py-2 rounded-md transition">
                            Official Website
                        </button>
                        <button class="w-full bg-[#2F3138] hover:bg-[#3c3f45] text-white py-2 rounded-md transition">
                            API Overview
                        </button>
                        <button class="w-full bg-[#2F3138] hover:bg-[#3c3f45] text-white py-2 rounded-md transition invisible">
                            Save to Library
                        </button>
                    </div>

                    <div class="text-sm border-t border-[#2F3138] ">
                       
                        <div class="flex justify-between border-b border-[#2F3138] py-3">
                            <span class="text-gray-400">Developer</span>
                            <span class="text-white text-right" id="previewDeveloper">Developer Name</span>
                        </div>
                        <div class="flex justify-between border-b border-[#2F3138] py-3">
                            <span class="text-gray-400">Publisher</span>
                            <span class="text-white text-right" id="previewPublisher">Publisher Name</span>
                        </div>
                        <div class="flex justify-between border-b border-[#2F3138] py-3">
                            <span class="text-gray-400">Release Date</span>
                            <span class="text-white" id="todayDate">06/20/25</span>
                        </div>
                        <div class="flex justify-between border-b border-[#2F3138] py-3 items-center">
                            <span class="text-gray-400">Platform</span>
                            <span class="text-white" id="previewPlatform">Platform Name</span>
                        </div>
                    </div>
                </div>


                    </div>
                </div>
            </div>
        </div> 
    </main>
 
  


    <!-- Footer -->
    <footer class="bg-[#1A1D24] text-gray-400 px-6 py-10 mt-16 ">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Company Info -->
            <div>
                <h2 class="text-white text-xl font-semibold mb-3">GameZone</h2>
                <p class="text-sm">
                    Discover the best games, reviews, and updates from around the world. Your ultimate game companion.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-white text-lg font-semibold mb-3">Quick Links</h3>
                <ul class=" text-sm">
                    <li><a href="#" class="hover:text-white transition">Home</a></li>
                    <li><a href="#" class="hover:text-white transition">About Us</a></li>
                    <li><a href="#" class="hover:text-white transition">Contact</a></li>
                    <li><a href="#" class="hover:text-white transition">Terms & Conditions</a></li>
                </ul>
            </div>

            <!-- Social Media -->
            <div>
                <h3 class="text-white text-lg font-semibold mb-3">Follow Us</h3>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-white transition">Facebook</a>
                    <a href="#" class="hover:text-white transition">Twitter</a>
                    <a href="#" class="hover:text-white transition">Instagram</a>
                </div>
            </div>
        </div>

        <div class="mt-10 border-t border-gray-700 pt-6 text-center text-sm">
            &copy; 2025 GameZone. All rights reserved.
        </div>
    </footer>
    

<script>
  const container = document.getElementById("sections-container");

  container.addEventListener("input", function () {
    const sectionPairs = Array.from(container.querySelectorAll(".section-pair"));

    let lastFilledIndex = -1;

    sectionPairs.forEach((section, index) => {
      const title = section.querySelector(".section-title")?.value.trim();
      const desc = section.querySelector(".section-description")?.value.trim();

      if (title || desc) {
        lastFilledIndex = index;
      }
    });

    // Remove all sections after the last filled one
    sectionPairs.forEach((section, index) => {
      if (index > lastFilledIndex) {
        section.remove();
      }
    });

    // Only add new blank section if the last one is filled
    const lastSection = container.querySelector(".section-pair:last-child");
    if (lastSection) {
      const title = lastSection.querySelector(".section-title")?.value.trim();
      const desc = lastSection.querySelector(".section-description")?.value.trim();

      if (title && desc) {
        const newSection = document.createElement("div");
        newSection.className = "section-pair";

        newSection.innerHTML = `
          <label class="block text-sm font-medium mb-1">Section Title</label>
          <input type="text" name="section_titles[]" class="w-full px-4 py-2 bg-[#2C2F36] rounded-md text-white focus:outline-none section-title" placeholder="Enter section title" />

          <label class="block text-sm font-medium mt-4 mb-1">Section Description</label>
          <textarea name="section_descriptions[]" rows="3" class="w-full px-4 py-2 bg-[#2C2F36] rounded-md text-white focus:outline-none section-description" placeholder="Enter section description"></textarea>
        `;

        container.appendChild(newSection);
      }
    }

    updatePreview(); // Keep preview in sync
  });

  function updatePreview() {
    document.getElementById("previewTitle").textContent =
      document.getElementById("inputTitle").value || "Game Title";

    document.getElementById("previewDesc").textContent =
      document.getElementById("inputDesc").value || "Game description will appear here...";

    document.getElementById("previewImage").src =
      document.getElementById("inputImage").value || "https://img.freepik.com/free-vector/joystick-game-sport-technology_138676-2045.jpg?semt=ais_hybrid&w=740";

    document.getElementById("previewDeveloper").textContent =
  document.getElementById("Developer").selectedOptions[0]?.text || "Developer Name";

    document.getElementById("previewPublisher").textContent =
  document.getElementById("Publisher").selectedOptions[0]?.text || "Publisher Name";

    document.getElementById("previewPlatform").textContent =
  document.getElementById("Platform").selectedOptions[0]?.text || "Platform Name";

    document.querySelector(".text-2xl.font-semibold").textContent =
      `$${parseFloat(document.getElementById("inputPrice").value || 0).toFixed(2)}`;

    // Genres
    const genres = document.getElementById("inputGenres").value
      .split(",")
      .map(g => g.trim())
      .filter(Boolean);
    const genresContainer = document.getElementById("previewGenres");
    genresContainer.innerHTML = "";
    genres.forEach(genre => {
      const span = document.createElement("span");
      span.className = "bg-[#2F3138] text-white px-2 py-1 rounded text-sm";
      span.textContent = genre;
      genresContainer.appendChild(span);
    });

    // Features
    const features = document.getElementById("inputFeatures").value
      .split(",")
      .map(f => f.trim())
      .filter(Boolean);
    const featuresContainer = document.getElementById("previewFeatures");
    featuresContainer.innerHTML = "";
    features.forEach(feature => {
      const span = document.createElement("span");
      span.className = "bg-[#2F3138] text-white px-2 py-1 rounded text-sm";
      span.textContent = feature;
      featuresContainer.appendChild(span);
    });

    // Section Preview (all sections)
    const sectionPairs = document.querySelectorAll(".section-pair");
    const previewSectionsContainer = document.getElementById("previewSections");

    previewSectionsContainer.innerHTML = ""; // Clear existing

    sectionPairs.forEach(pair => {
      const title = pair.querySelector(".section-title")?.value.trim();
      const desc = pair.querySelector(".section-description")?.value.trim();

      if (title || desc) {
        const sectionDiv = document.createElement("div");
        sectionDiv.className = "space-y-3";

        if (title) {
          const titleEl = document.createElement("h1");
          titleEl.className = "font-bold text-2xl";
          titleEl.textContent = title;
          sectionDiv.appendChild(titleEl);
        }

        if (desc) {
          const descEl = document.createElement("h1");
          descEl.textContent = desc;
          sectionDiv.appendChild(descEl);
        }

        previewSectionsContainer.appendChild(sectionDiv);
      }
    });
  }

  // Attach input listeners to static inputs
  document.querySelectorAll("input, textarea").forEach(input => {
    input.addEventListener("input", updatePreview);
  });

  // Initial preview update
  updatePreview();
</script>
<script>
        const yourPostUrl = "{{ session('token') ? url('/your-post') : route('register.page') }}";

        function handleYourPost() {
            window.location.href = yourPostUrl;
        }
    </script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
  // Existing fetch code
  fetchAndPopulate('developers', 'Developer');
  fetchAndPopulate('publishers', 'Publisher');
  fetchAndPopulate('platforms', 'Platform');

  function fetchAndPopulate(endpoint, elementId) {
    fetch(`http://localhost:8000/api/${endpoint}`)
      .then(response => response.json())
      .then(data => {
        const select = document.getElementById(elementId);
        data.forEach(item => {
          const option = document.createElement('option');
          option.value = item.id;
          option.textContent = item.name;
          select.appendChild(option);
        });

        // Update preview after populating
        updatePreview(); // optional but helpful
      })
      .catch(error => {
        console.error(`Error fetching ${endpoint}:`, error);
      });
  }

  // 🔧 Fix: Listen for changes on selects
  ["Developer", "Publisher", "Platform"].forEach(id => {
    document.getElementById(id).addEventListener("change", updatePreview);
  });
    });


 document.getElementById('gameForm').addEventListener('submit', async (e) => {
  e.preventDefault();

  const formData = new FormData(e.target);
  const payload = Object.fromEntries(formData.entries());
  // Handle arrays correctly like platform_ids[], section_titles[], etc.

  const response = await fetch('/api/games', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': 'Bearer {{ session('token') }}',
    },
    body: JSON.stringify(payload)
  });

  if (response.ok) {
    alert('Game created successfully!');
  } else {
    alert('Failed to create game.');
  }
});

</script>






</body>
</html>
