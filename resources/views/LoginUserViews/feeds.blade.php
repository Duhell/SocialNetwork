@foreach ($feeds as $feed )
    <x-card postId="{{ $feed->id }}" :user="$feed->user->id" :name="$feed->user->firstname.' '.$feed->user->lastname" :time="$feed->created_at->diffForHumans()" :content="$feed->content" :picture="$feed->user->profilepicture"/>
@endforeach
