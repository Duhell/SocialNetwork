<div {{ $attributes->merge(['class'=>'']) }}>
    <form method="POST" action="{{ $link }}" class="border shadow p-5 rounded-sm">
        @csrf
        {{ $slot }}
    </form>
</div>
