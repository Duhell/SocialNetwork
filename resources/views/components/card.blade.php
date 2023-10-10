<div class="w-full bg-white border border-gray-200 rounded-lg shadow">
    <div class="p-5">
        <div class="flex items-center mb-5 gap-x-3">
            <img class="w-8 h-8 rounded-full" src="{{ $picture ? Storage::url($picture) : "https://th.bing.com/th/id/OIP.WFEutOWYtepOJBTjwRW--QHaGV?pid=ImgDet&rs=1" }}" alt="user photo">
            <div class="flex flex-col">
                <span class=" text-lg font-semibold tracking-tight text-gray-600">{{ $name }}</span>
                <span class=" text-xs font-normal tracking-tight text-gray-400">{{ $time }}</span>
            </div>
        </div>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $content }}</p>
    </div>

</div>

