<div  {{ $attributes->merge(['class'=>'w-full bg-white border border-gray-200 rounded-lg shadow']) }}>
    <div class="p-5">
        <div class="flex items-center mb-5 gap-x-3">
            <a href="{{ route('viewUser',$user) }}"><img class="w-8 h-8 rounded-full" src="{{ $picture ? Storage::url($picture) : "https://content.app-sources.com/s/05973560621083023/thumbnails/640x480/Images/Profile-ICON-5110482.png" }}" alt="user photo"></a>
            <div class="flex justify-between w-full ">
                <div class="flex flex-col">
                    <a class=" text-lg font-semibold tracking-tight text-gray-600" href="{{ route('viewUser',$user) }}">{{ $name }}</a>
                    <span class=" text-xs font-normal tracking-tight text-gray-400">{{ $time }}</span>
                </div>

                @if ($user == auth()->id())
                <div class="deleteForm">
                    <input class="post_id" type="hidden" value="{{ $postId }}">
                    <button type="button" class="text-xs deleteBtn text-slate-300 hover:text-slate-600">Delete</button>
                </div>
                @endif
            </div>
        </div>
        <p class="mb-3 font-normal break-words text-xs text-gray-500">{{ $content }}</p>
    </div>
</div>



