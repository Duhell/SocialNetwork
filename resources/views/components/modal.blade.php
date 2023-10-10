<!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Change Profile Picture
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center " data-modal-hide="defaultModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->

            <form class="border shadow p-5 rounded-sm" action="{{ route('changeprofilepicture') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <img class="rounded-full w-32 h-32 mx-auto border border-2" id="profilePicture" src="{{ $picture ? Storage::url($picture): "https://th.bing.com/th/id/OIP.WFEutOWYtepOJBTjwRW--QHaGV?pid=ImgDet&rs=1" }}" alt="">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Upload photo</label>
                <input name="uploadProfilePic" class="block w-full text-sm text-gray-900 cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                <div class="mt-5">
                    <x-button-click type="submit" title="Upload" />
                </div>
            </form>
        </div>
    </div>
</div>
