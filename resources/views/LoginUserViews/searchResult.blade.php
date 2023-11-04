@if(isset($results))
@foreach ($results as $user )
    <a href="{{ route('viewUser',$user->id) }}">
        <li class="pb-3 sm:pb-4 hover:bg-slate-200 rounded-lg p-2 cursor-pointer">
            <div class="flex items-center space-x-4">
            <div class="flex-shrink-0">
                <img class="w-8 h-8 rounded-full" src="{{ $user->profilepicture ?  Storage::url($user->profilepicture) : "https://content.app-sources.com/s/05973560621083023/thumbnails/640x480/Images/Profile-ICON-5110482.png" }}" alt="No image">
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 truncate">
                    {{ $user->firstname }} {{ $user->lastname }}
                </p>
                <p class="text-xs italic text-gray-500 truncate">
                    {{ $user->email }}
                </p>
            </div>
            </div>
        </li>
    </a>
@endforeach
@endif
