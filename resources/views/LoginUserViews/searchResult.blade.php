@if(isset($results))
@foreach ($results as $user )
    <a href="{{ route('viewUser',$user->id) }}">
        <li class="pb-3 sm:pb-4">
            <div class="flex items-center space-x-4">
            <div class="flex-shrink-0">
                <img class="w-8 h-8 rounded-full" src="{{ Storage::url($user->profilepicture) }}" alt="Neil image">
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 truncate">
                    {{ $user->firstname }} {{ $user->lastname }}
                </p>
                <p class="text-sm text-gray-500 truncate">
                    {{ $user->email }}
                </p>
            </div>
            </div>
        </li>
    </a>
@endforeach
@endif
