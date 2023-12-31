@extends('mainLayout.main')
@section('title'," | ". $bio->firstname)
@section('contents')
@auth
<x-navbar :details="$bio" />
    <div class="md:mt-20 mt-24 relative grid-cols-1 md:grid-cols-4 grid gap-x-5 container mx-auto">
        <div>
            <form id="submitPost" class="border-0 h-full max-h-64 md:border md:shadow py-5 px-4 rounded-md">
                @csrf
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Post your message here...</label>
                <textarea name="content_msg" id="message" rows="4" class="block focus:outline-0 w-full resize-none p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 " placeholder="What's on your mind, {{ $bio->firstname }}?"></textarea>
                <div class="mt-5">
                    <x-button-click type="submit" title="Post" class="px-6 float-right md:float-left"/>
                </div>
            </form>
            <div id="active_user" class="mt-6 hidden md:block relative">
                <div class="border-b-2">
                    <span>Online <span id="totalActiveUsers" class="text-xs italic"></span></span>
                </div>
                <ul data-aos="fade-right" id="activeUsers" class="mt-4 relative">
                    <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                        <svg aria-hidden="true" class="w-3 h-3 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                    @include('LoginUserViews.activeUsers')
                </ul>
            </div>
        </div>
        <div data-aos="fade-up" class="flex overflow-y-scroll p-4 md:p-0 feeds  items-center col-span-2 flex-col gap-y-4 overflow-y-auto">
            @include('LoginUserViews.feeds')
        </div>
        <div id="searchResult_container" class="absolute bg-white mt-2 top-0 left-0 right-0 p-2 md:p-0 md:mt-0  md:relative hidden">
            <ul id="resultList">
                @include('LoginUserViews.searchResult')
            </ul>
        </div>
    </div>
    <x-modal :picture="$bio->profilepicture"/>
    <x-comment-modal />
    <script src="{{ asset('profileJS.js') }}"></script>
    <script src="{{ asset('commentJS.js') }}"></script>
    <script src="{{ asset('update.js') }}"></script>
    <script src="{{ asset('delete.js') }}"></script>
@endauth
@endsection
