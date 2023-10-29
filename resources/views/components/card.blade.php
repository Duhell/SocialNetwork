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
                    <button data-tooltip-target="tooltip-bottom" data-tooltip-placement="bottom" type="button" class="text-xs deleteBtn text-slate-300 w-4 h-4 hover:text-slate-600"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-full h-full">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                      </svg>
                    </button>
                </div>
                <div id="tooltip-bottom" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs rounded-lg shadow-sm opacity-0 tooltip ">Delete<div class="tooltip-arrow" data-popper-arrow></div></div>

                @endif
            </div>
        </div>
        <p class="mb-3 font-normal break-words text-xs text-gray-500">{{ $content }}</p>
    </div>
    <div class="border-t-2 flex justify-end gap-x-6 px-6">
        <button class="text-xs likeBTN hover:font-semibold" data-post_id="{{ $postId }}" ><span>{{ $likes > 1 ? $likes . " Likes": $likes . " Like" }}</span></button>
        <button class="text-xs dislikeBTN hover:font-semibold" data-post_id="{{ $postId }}"><span>{{ $dislikes > 1 ? $dislikes . " Dislike": $dislikes . " Dislike" }}</span></button>
    </div>
</div>



