<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Details</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#101014] text-[#EFECF0] min-h-screen flex flex-col">
  

     
    

    <main class="flex-grow">
    <div class="flex flex-col items-center justify-center px-6">
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

            
            <h2 class="text-5xl font-bold mb-6 pt-7">{{ $game->title }}</h2>
            <div class="max-w-6xl mx-auto py-10 grid lg:grid-cols-3 gap-5">
                <div class="lg:col-span-2 space-y-6">
                    <img class="rounded-lg w-[760px]" src="{{ $game->image }}" alt="{{ $game->title }}">
                    <div class="space-y-14">
                        <h1>{{ $game->description }}</h1>
                       

                        <div class="grid grid-cols-2">
                            <div class="pr-5 space-y-2">
                                <h1 class="text-[#FFFFFFA6]">Genres</h1>
                                <div class="flex gap-2">
                                    @foreach(explode(',', $game->genre) as $genre)
                                        <button class="bg-[#2F3138] text-white px-2 py-1 rounded-md text-xs">{{ $genre }}</button>
                                    @endforeach
                                </div>
                            </div>

                            <div class="border-l-2 border-[#6a6e7b] px-5 space-y-2">
                                <h1 class="text-[#FFFFFFA6]">Features</h1>
                                <div class="flex gap-2">
                                    @foreach(explode(',', $game->class) as $feature)
                                        <span class="bg-[#2F3138] text-white px-2 py-1 rounded-md text-xs">{{ $feature }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                       <div class="space-y-8">
                            @foreach ($game->sections as $section)
                                <div class="space-y-3">
                                    <h1 class="font-bold text-2xl ">{{ $section->title }}</h1>
                                    <p>{{ $section->description }}</p>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                <!-- Right Section: Game Detail Sidebar -->
                <div class="bg-[#1A1C20] p-6 rounded-lg shadow space-y-4 h-fit">
                    <span class="text-xs bg-[#2F3138] px-2 py-1 rounded-md inline-block text-gray-300">Base Game</span>

                    <div class="text-2xl font-semibold">${{ number_format($game->price, 2) }}</div>


                    <div class="space-y-3">
                        @if($game->website)
                            <a href="{{ $game->website }}" target="_blank">
                                <button class="w-full bg-[#22B8F6] hover:bg-[#1aa9e3] text-black font-semibold py-2 rounded-md transition">
                                    Official Website
                                </button>
                            </a>
                        @endif
                        <button class="w-full bg-[#2F3138] hover:bg-[#3c3f45] text-white py-2 rounded-md transition">
                            API Overview
                        </button>
                        <button class="w-full bg-[#2F3138] hover:bg-[#3c3f45] text-white py-2 rounded-md transition invisible">
                            Save to Library
                        </button>
                    </div>

                    <div class="text-sm border-t border-[#2F3138] ">
                        <!-- <div class="flex justify-between border-b border-[#2F3138] py-3">
                            <span class="text-gray-400">Epic Rewards</span>
                            <span class="text-blue-400 flex items-center gap-1">Earn 20% Back <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24"><path d="M13.293 17.293a1 1 0 011.414 1.414l-5-5a1 1 0 010-1.414l5-5a1 1 0 011.414 1.414L11.414 12l4.293 4.293z"/></svg></span>
                        </div>
                        <div class="flex justify-between border-b border-[#2F3138] py-3">
                            <span class="text-gray-400">Refund Type</span>
                            <span class="text-white">Self-Refundable</span>
                        </div> -->
                        <div class="flex justify-between border-b border-[#2F3138] py-3">
                            <span class="text-gray-400">Developer</span>
                            <span class="text-white text-right">{{ $game->developer->name }}</span>
                        </div>
                        <div class="flex justify-between border-b border-[#2F3138] py-3">
                            <span class="text-gray-400">Publisher</span>
                            <span class="text-white text-right">{{ $game->publisher->name }}</span>
                        </div>
                        <div class="flex justify-between border-b border-[#2F3138] py-3">
                            <span class="text-gray-400">Release Date</span>
                            <span class="text-white">06/20/25</span>
                        </div>
                        <div class="flex justify-between border-b border-[#2F3138] py-3 items-center">
                            <span class="text-gray-400">Platform</span>
                            <div class="flex gap-2">
                                @foreach($game->platforms as $platform)
                                    <span class="bg-[#2F3138] text-white px-2 py-1 rounded-md text-xs">{{ $platform->name }}</span>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

            </div>

         
            
        </div>            
    </div>
    <!-- Main Content -->
  
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




    <!-- <div id="developerList" class="space-y-4 ">

    </div> -->

  <!-- <script>
    fetch('http://127.0.0.1:8000/api/developers')
      .then(res => res.json())
      .then(data => {
        const list = document.getElementById('developerList');
        data.forEach(dev => {
          const item = document.createElement('div');
          item.className = 'bg-white p-4 shadow rounded';
          item.innerHTML = `<strong>${dev.name}</strong>`;
          list.appendChild(item);
        });
      })
      .catch(err => console.error(err));
  </script> -->
  <script>
        const yourPostUrl = "{{ session('token') ? url('/your-post') : route('register.page') }}";

        function handleYourPost() {
            window.location.href = yourPostUrl;
        }
    </script>

</body>
</html>
