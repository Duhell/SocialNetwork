@if (isset($onlineUsers))
@foreach ( $onlineUsers as $online )
<li class="hover:bg-slate-200 rounded-lg p-2 cursor-pointer">
    <a href="{{ route('viewUser',$online->id) }}">
        <div class="relative flex gap-x-4 items-center">
            <div class="relative">
                <img class="w-5 h-5 rounded-full" src="{{ $online->profilepicture ?  Storage::url($online->profilepicture) : "https://content.app-sources.com/s/05973560621083023/thumbnails/640x480/Images/Profile-ICON-5110482.png" }}" alt="">
                <span class="top-0 left-5 absolute  w-3 h-3 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
            </div>
            <span class="text-sm">{{ $online->firstname }} {{ $online->lastname }}</span>
        </div>
    </a>
</li>
@endforeach
@endif
