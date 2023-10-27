@extends('mainLayout.main')
@section('title'," | ".$data->firstname)
@section('contents')
@auth
<form id="updateDetails" class="md:w-1/2 w-full p-10 mx-auto">
    <x-tolink link="{{ route('feeds') }}" title=" Go Back" class="text-xs text-slate-400"/>
    <p class="text-2xl font-semibold my-6 text-center md:text-left">Personal Information</p>
    <x-notif/>

    @csrf
    <div class="flex flex-wrap md:flex-nowrap gap-x-6 w-full">
        <div class="flex flex-col w-full">
            <div class="mb-6">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">First Name</label>
                <input name="firstname" value="{{ $data->firstname }}" type="text" id="base-input" class="bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg  block w-full p-2.5 ">
            </div>
            <div class="mb-6">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                <input name="lastname" value="{{ $data->lastname }}" type="text" id="base-input" class="bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg  block w-full p-2.5 ">
            </div>
            <div class="mb-6">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Age</label>
                <input name="age" value="{{ $data->age ? $data->age : "" }}" type="text" id="base-input" class="bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg  block w-full p-2.5 ">
            </div>
        </div>
        <div class="flex flex-col w-full">
            <div class="mb-6">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Nickname</label>
                <input name="nickname" value="{{ $data->nickname ? $data->nickname : "" }}" type="text" id="base-input" class="bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg  block w-full p-2.5 ">
            </div>
            <div class="mb-6">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                <input placeholder="ex. Single, Married" name="status" value="{{ $data->status ? $data->status : "" }}" type="text" id="base-input" class="bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg  block w-full p-2.5 ">
            </div>
        </div>
    </div>
    <div class="flex flex-col">
        <label>Say something about yourself:</label>
        <textarea class="border border-black rounded-md w-full p-6" name="say" id="" rows="4">{{ $data->say ? $data->say : "" }}</textarea>
    </div>

    <div class="w-full w-full mt-6 gap-x-6 flex justify-center">
        <x-button-click type="submit" title="Save" />
        <x-tolink link="{{ route('feeds') }}" title=" Cancel" class="px-3 py-1 border rounded bg-gray-200 duration-200 hover:text-white hover:bg-gray-400"/>

    </div>

  </form>
  <script>
    $(document).ready(function(){
    $('#updateDetails').on('submit',function(e){
        e.preventDefault();
        var details = $(this).serialize();
        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `{{ route('edit') }}`,
            type: 'POST',
            data: details,
            success: function(response) {
                $('#info').text(response.success);
                $('#toast-success').css("display",'flex');

                setTimeout(() => {
                    $('#toast-success').css("display",'none');
                }, 5000);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#info').text("Data could not be sent!");
                $('#toast-success').css("display",'flex');
                setTimeout(() => {
                    $('#toast-success').css("display",'none');
                }, 5000);
                console.log("Error: " + textStatus, errorThrown);
            }
        });
    })
    })
  </script>
@endauth
@endsection
