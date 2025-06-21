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
            <div class="bg-[#101014] flex justify-between h-24 items-center sticky top-0">
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

            <div class="flex space-x-4 border-b border-gray-600 mb-3 md:w-[1152px]">
                <button class="tab-button px-4 py-2 text-sm font-semibold border-b-2 border-transparent hover:border-blue-500 focus:outline-none" data-tab="developer">Developer</button>
                <button class="tab-button px-4 py-2 text-sm font-semibold border-b-2 border-transparent hover:border-blue-500 focus:outline-none" data-tab="publisher">Publisher</button>
                <button class="tab-button px-4 py-2 text-sm font-semibold border-b-2 border-transparent hover:border-blue-500 focus:outline-none" data-tab="platform">Platform</button>
            </div>
            
            <div id="developer" class="tab-content hidden">
                  <div class="flex justify-between items-center">
                    <h2 class="text-5xl font-bold mb-6 pt-7">Developer</h2>
                    <button class="bg-[#FFFFFF26] hover:bg-gray-700 text-white font-medium px-3 py-1 rounded-md h-fit">
                    Create Developer
                    </button>
                </div>
                <div class="grid grid-cols-1  gap-3">
                    <div class="bg-[#1A1D24] rounded-xl p-4 shadow hover:shadow-lg transition duration-300" >
                        <h3 class="text-xl font-semibold text-white mb-2">Name</h3>
                        <div class="flex justify-between items-center text-sm text-gray-300">
                            <span>Country</span>
                            <div>
                                <a href="#" class="text-blue-400 hover:underline">Edit</a>
                                <a href="#" class="text-blue-400 hover:underline">Delete</a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-[#1A1D24] rounded-xl p-4 shadow hover:shadow-lg transition duration-300" >
                        <h3 class="text-xl font-semibold text-white mb-2">Name</h3>
                        <div class="flex justify-between items-center text-sm text-gray-300">
                            <span>Country</span>
                            <div>
                                <a href="#" class="text-blue-400 hover:underline">Edit</a>
                                <a href="#" class="text-blue-400 hover:underline">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div id="publisher" class="tab-content hidden">
                <div class="flex justify-between items-center">
                    <h2 class="text-5xl font-bold mb-6 pt-7">Platform</h2>
                    <button class="bg-[#FFFFFF26] hover:bg-gray-700 text-white font-medium px-3 py-1 rounded-md h-fit">
                    Create Platform
                    </button>
                </div>
                <div class="grid grid-cols-1  gap-3">
                    <div class="bg-[#1A1D24] rounded-xl p-4 shadow hover:shadow-lg transition duration-300" >
                        <h3 class="text-xl font-semibold text-white mb-2">Name</h3>
                        <div class="flex justify-between items-center text-sm text-gray-300">
                            <span>Country</span>
                            <div>
                                <a href="#" class="text-blue-400 hover:underline">Edit</a>
                                <a href="#" class="text-blue-400 hover:underline">Delete</a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-[#1A1D24] rounded-xl p-4 shadow hover:shadow-lg transition duration-300" >
                        <h3 class="text-xl font-semibold text-white mb-2">Name</h3>
                        <div class="flex justify-between items-center text-sm text-gray-300">
                            <span>Country</span>
                            <div>
                                <a href="#" class="text-blue-400 hover:underline">Edit</a>
                                <a href="#" class="text-blue-400 hover:underline">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="platform" class="tab-content hidden">
                <div class="flex justify-between items-center">
                    <h2 class="text-5xl font-bold mb-6 pt-7">Platform</h2>
                    <button class="bg-[#FFFFFF26] hover:bg-gray-700 text-white font-medium px-3 py-1 rounded-md h-fit">
                    Create Platform
                    </button>
                </div>
                <div class="grid grid-cols-1  gap-3">
                    <div class="bg-[#1A1D24] rounded-xl p-4 shadow hover:shadow-lg transition duration-300" >
                        <h3 class="text-xl font-semibold text-white mb-2">Name</h3>
                        <div class="flex justify-between items-center text-sm text-gray-300">
                            <span>Country</span>
                            <div>
                                <a href="#" class="text-blue-400 hover:underline">Edit</a>
                                <a href="#" class="text-blue-400 hover:underline">Delete</a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-[#1A1D24] rounded-xl p-4 shadow hover:shadow-lg transition duration-300" >
                        <h3 class="text-xl font-semibold text-white mb-2">Name</h3>
                        <div class="flex justify-between items-center text-sm text-gray-300">
                            <span>Country</span>
                            <div>
                                <a href="#" class="text-blue-400 hover:underline">Edit</a>
                                <a href="#" class="text-blue-400 hover:underline">Delete</a>
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
    const buttons = document.querySelectorAll(".tab-button");
    const contents = document.querySelectorAll(".tab-content");

    buttons.forEach(button => {
        button.addEventListener("click", () => {
            // UI toggle
            buttons.forEach(btn => btn.classList.remove("border-blue-500", "text-blue-400"));
            contents.forEach(tab => tab.classList.add("hidden"));

            button.classList.add("border-blue-500", "text-blue-400");
            const tabId = button.dataset.tab;
            document.getElementById(tabId).classList.remove("hidden");

            // Fetch data
            if (!document.getElementById(tabId).dataset.loaded) {
                fetchData(tabId);
                document.getElementById(tabId).dataset.loaded = true;
            }
        });
    });

    function fetchData(type) {
        let url = `/api/${type}s`; // /api/developers, /api/publishers, /api/platforms
        fetch(url)
            .then(res => res.json())
            .then(data => {
                const container = document.querySelector(`#${type} .grid`);
                container.innerHTML = ''; // Clear existing

                data.forEach(item => {
                    container.innerHTML += `
                        <div class="bg-[#1A1D24] rounded-xl p-4 shadow hover:shadow-lg transition duration-300">
                            <h3 class="text-xl font-semibold text-white mb-2">${item.name}</h3>
                            <div class="flex justify-between items-center text-sm text-gray-300">
                                <span>${item.country || item.name}</span>
                                <div>
                                    <a href="#" class="text-blue-400 hover:underline">Edit</a>
                                    <a href="#" class="text-blue-400 hover:underline">Delete</a>
                                </div>
                            </div>
                        </div>`;
                });
            });
    }

    // Auto load first tab
    buttons[0].click();
</script>
<script>
        const yourPostUrl = "{{ session('token') ? url('/your-post') : route('register.page') }}";

        function handleYourPost() {
            window.location.href = yourPostUrl;
        }
    </script>


</body>
</html>
