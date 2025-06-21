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

            
            
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-semibold mb-6 pt-7">Your Games</h2>
                <a href="{{ url('/create') }}" class="bg-[#FFFFFF26] hover:bg-gray-700 text-white font-medium px-3 py-1 rounded-md h-fit">
                    Create Games
                </a>
            </div>

            <div class="grid grid-cols-1 gap-6 md:w-[1152px]">
                    <!-- Developer/Publisher/Platform Card -->
                    <div class="bg-[#1A1D24] rounded-xl p-4 shadow hover:shadow-lg transition duration-300 grid grid-cols-5 gap-3">
                        <div class="col-span-1">
                            <img class="h-full object-cover rounded-lg" src="https://shared.fastly.steamstatic.com/store_item_assets/steam/apps/3470190/39ac52ac4e76eba2145b6b7a127733516047ef23/header.jpg?t=1747745216" alt="">
                        </div>
                        <div class="col-span-4 ">
                            <h3 class="text-xl font-semibold text-white mb-2">Epic Games</h3>
                            <p class="text-gray-400 text-sm mb-3">Known for Fortnite and Unreal Engine. A leading AAA developer and publisher.</p>
                            <div class="flex justify-between items-center text-sm text-gray-300">
                                <span>USA</span>
                                <a href="#" class="text-blue-400 hover:underline">edit game</a>
                            </div>
                        </div>
                    </div>


                    <div class="bg-[#1A1D24] rounded-xl p-4 shadow hover:shadow-lg transition duration-300 grid grid-cols-5 gap-3">
                        <div class="col-span-1">
                            <img class="h-full object-cover rounded-lg" src="https://shared.fastly.steamstatic.com/store_item_assets/steam/apps/3470190/39ac52ac4e76eba2145b6b7a127733516047ef23/header.jpg?t=1747745216" alt="">
                        </div>
                        <div class="col-span-4 ">
                            <h3 class="text-xl font-semibold text-white mb-2">Epic Games</h3>
                            <p class="text-gray-400 text-sm mb-3">Known for Fortnite and Unreal Engine. A leading AAA developer and publisher.</p>
                            <div class="flex justify-between items-center text-sm text-gray-300">
                                <span>USA</span>
                                <a href="#" class="text-blue-400 hover:underline">edit game</a>
                            </div>
                        </div>
                    </div>
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
        const yourPostUrl = "{{ session('token') ? url('/your-post') : route('register.page') }}";

        function handleYourPost() {
            window.location.href = yourPostUrl;
        }
    </script>



  

</body>
</html>
