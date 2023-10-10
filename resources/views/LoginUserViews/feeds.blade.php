@foreach ($feeds as $feed )
    <x-card :name="$feed->user->name" :time="$feed->created_at->diffForHumans()" :content="$feed->content" :picture="$feed->user->profilepicture"/>
@endforeach
