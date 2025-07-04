<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>All Games</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#101014] text-[#EFECF0] min-h-screen flex flex-col">

    <main class="flex-grow">
    <div class="flex flex-col items-center justify-center">
        <div  class="">
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

            
            <h2 class="text-2xl font-semibold mb-6 pt-7">All Games</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-x-3 gap-y-6">
                
            </div>
        </div>            
    </div>
</main>

    <!-- Footer -->
    <footer class="bg-[#1A1D24] text-gray-400 px-6 py-10 mt-16">
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
    fetch('http://127.0.0.1:8000/api/games')
        .then(response => response.json())
        .then(games => {
        const container = document.querySelector('.grid');
        container.innerHTML = ''; // clear placeholder content

        games.forEach(game => {
            const div = document.createElement('div');
            div.className = 'w-[220.550px]';
            div.innerHTML = `
            <a href="/games/${game.id}">
                <img class="rounded-lg h-[294.062px]" src="${game.poster}" alt="${game.title}">
                <h1 class="text-xs text-[#FFFFFFA6] mt-2">Base Game</h1>
                <h1 class="font-medium text-wrap">${game.title}</h1>
            </a>
        `;

            container.appendChild(div);
        });
        })
        .catch(err => console.error('Error loading games:', err));
        
    </script>

    <script>
        const yourPostUrl = "{{ session('token') ? url('/your-post') : route('register.page') }}";

        function handleYourPost() {
            window.location.href = yourPostUrl;
        }
    </script>




  

</body>
</html>
