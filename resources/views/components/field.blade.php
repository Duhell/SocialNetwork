<div class="flex flex-col ">
    <label class="text-sm">{{ $title }}</label>
    <input value="{{ old(strtolower($title)) }}" name="{{ strtolower($title) }}" type="{{ $type }}" autocomplete="off" class="border px-3 py-1 rounded-sm focus:outline-none">
</div>
