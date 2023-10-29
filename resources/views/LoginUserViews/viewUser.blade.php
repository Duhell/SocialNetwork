@extends('mainLayout.main')
@section('title'," | ". $data->firstname)
@section('contents')
@auth
    <div class="grid relative overflow-hidden grid-cols-1 md:grid-cols-2 p-10 container mx-auto">
        <div class="h-full">
        <x-tolink  link="{{ route('feeds') }}" title=" Go Back" class="text-xs text-slate-400"/>
            <div class="flex mt-7 p-7 gap-x-6">
                <div class="w-32 h-32">
                    <img data-modal-target="popup-modal" data-modal-toggle="popup-modal"  class="w-full cursor-pointer h-full rounded-full border border-2" src="{{ $data->profilepicture ? Storage::url($data->profilepicture) : "https://content.app-sources.com/s/05973560621083023/thumbnails/640x480/Images/Profile-ICON-5110482.png" }}" alt="">
                </div>
                <div class="mt-5">
                    <p class="text-lg font-semibold	">{{ $data->firstname }} {{ $data->lastname }} <span class="italic {{ $data->nickname ?  "inline-block" :"hidden" }} text-xs">({{ $data->nickname }})</span></p>
                    <p class=" text-xs ">Age : {{ $data->age }} years old</p>
                    <p class=" text-xs ">Status : {{ $data->status }}</p>
                </div>
            </div>
            <div class="flex p-7">
                <div class="w-full py-1 px-2">
                    <p class="text-base font-semibold w-full">Bio : </p>
                    <p class=" break-words  text-xs w-full rounded-md">{{ $data->say }}</p>
                </div>
            </div>
        </div>
        <div class="overflow-y-auto  viewUser px-2 w-full relative" style="height: 450px;">
            <p class="font-semibold bg-white mb-6 fixed w-2/5">{{ $data->firstname }}'s Timeline</p>
            @foreach ($posts as $post )
                <x-card postId="{{ $post->id }}" :user="$post->user->id" :name="$post->user->firstname.' '.$post->user->lastname" :time="$post->created_at->diffForHumans()" :content="$post->content" :picture="$post->user->profilepicture" class="my-4"/>
            @endforeach
        </div>
    </div>


  <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-2rem)] max-h-full">
      <div class="relative w-full max-w-lg">
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="w-full">
                    <img class="w-full h-full " src="{{ $data->profilepicture ? Storage::url($data->profilepicture) : "https://content.app-sources.com/s/05973560621083023/thumbnails/640x480/Images/Profile-ICON-5110482.png" }}" alt="">
              </div>
          </div>
      </div>
  </div>
  <script src="{{ asset('delete.js') }}"></script>


@endauth
@endsection
