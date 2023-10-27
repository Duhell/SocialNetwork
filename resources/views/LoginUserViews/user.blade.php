@extends('mainLayout.main')
@section('title'," | ". $bio->firstname)
@section('contents')
@auth
<x-navbar :details="$bio" />
    <div class="mt-16 grid-cols-1 md:grid-cols-4 grid gap-x-5 container mx-auto">
        <form id="submitPost" class="border-0 h-full max-h-64 md:border md:shadow p-5 rounded-md">
            @csrf
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Post your message here...</label>
            <textarea name="content_msg" id="message" rows="4" class="block resize-none p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 " placeholder="What's on your mind, {{ $bio->firstname }}?"></textarea>
            <div class="mt-5">
                <x-button-click type="submit" title="Post" class="px-6 "/>
            </div>
        </form>
        <div data-aos="fade-up" class="flex p-4 md:p-0 feeds items-center min-h-min	 col-span-2 flex-col gap-y-4 overflow-y-auto">
            @include('LoginUserViews.feeds')
        </div>
    </div>
    <x-modal :picture="$bio->profilepicture"/>

    <script>
        document.getElementById('user_avatar').addEventListener('change', function(e) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profilePicture').src = e.target.result;
        }
        reader.readAsDataURL(this.files[0]);
    });
    </script>
    <script src="{{ asset('update.js') }}"></script>
    <script src="{{ asset('delete.js') }}"></script>
@endauth
@endsection
