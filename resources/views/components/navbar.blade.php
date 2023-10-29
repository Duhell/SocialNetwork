<nav class="bg-white z-50 border-gray-200 fixed top-0 w-full">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('feeds') }}" class="flex items-center">
            {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" /> --}}
            <span class="self-center text-2xl font-semibold whitespace-nowrap">SocialNetwork</span>
        </a>
        <div class="flex items-center md:order-2">
            <div class="flex gap-x-4 items-center">
                <div class="relative border rounded-md p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-6 h-6 absolute">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                    <input id="searchbar" type="text" class="focus:outline-0 pl-7 text-sm">
                </div>
                <button type="button" class="flex text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="{{ $details->profilepicture ?  Storage::url($details->profilepicture) : "https://content.app-sources.com/s/05973560621083023/thumbnails/640x480/Images/Profile-ICON-5110482.png" }}" alt="user photo">
                </button>
            </div>
            <!-- Dropdown menu -->
            <div class="z-50 bg-white shadow hidden my-4 text-base list-none border bg-white divide-y divide-gray-100 rounded-lg shadow" id="user-dropdown">
            <div class="px-4 py-3">
                <a href="{{ route('viewUser',$details->id) }}" class="block text-sm text-gray-900 font-semibold">{{ $details->firstname }} {{ $details->lastname }}</a>
                <span class="block text-sm  text-gray-500 truncate ">{{ $details->email }}</span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
                <li>
                    <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="block text-left w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"  type="button">
                        Profile Picture
                    </button>
                    <x-tolink link="{{ route('editView') }}" title="Your Details" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" />
                    <x-tolink link="{{ route('logout') }}" title="Logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" />
                </li>
            </ul>
            </div>
        </div>
    </div>
  </nav>
