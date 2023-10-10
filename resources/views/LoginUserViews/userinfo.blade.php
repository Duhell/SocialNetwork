@extends('mainLayout.main')
@section('title'," | ".$data->name)
@section('contents')
@auth
<form class="max-w-lg p-5">
    <x-tolink link="{{ route('feeds') }}" title="Go Back" class="text-xs text-slate-400"/>
    <p>Your Information</p>
    <div class="relative z-0 w-full my-6 group">
        <input type="text" name="floating_email" id="floating_email" class="block text-black py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Age</label>
    </div>

    <x-button-click type="submit" title="Save" />
  </form>

@endauth
@endsection
