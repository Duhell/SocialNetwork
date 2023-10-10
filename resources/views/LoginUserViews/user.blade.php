@extends('mainLayout.main')
@section('title'," | ". $bio->name)
@section('contents')
@auth
    <x-navbar :details="$bio" />
    <div class="mt-16 grid-cols-4 grid gap-x-5 container mx-auto">
        <x-form-fields link="{{ route('addpost') }}">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900">What's on your mind?</label>
            <textarea name="content_msg" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 " placeholder="Post a message..."></textarea>
            <div class="mt-5">
                <x-button-click type="submit" title="Post" class="px-6"/>
            </div>
        </x-form-fields>
        <div class="flex feeds items-center h-screen col-span-2 flex-col gap-y-4 overflow-y-auto">
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
@endauth
@endsection
