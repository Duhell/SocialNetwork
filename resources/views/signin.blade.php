@extends('mainLayout.main')
@section('contents')
@guest
<x-form-fields link="{{ route('home') }}" class="w-full h-screen flex justify-center items-center">
    <p class="text-xl pb-3">Social Network</p>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error )
                    <li class="text-xs text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('message'))
        <div class="py-2 px-3 text-xs bg-green-400 rounded-lg">{{ session()->get('message') }}</div>
    @endif
    <x-field type="text" title="Email"/>
    <x-field type="password" title="Password"/>
    <x-button-click type="submit" title="Login" class="my-3 w-full"/>
    <x-tolink link="/signup" title="Create Account" class="text-xs hover:underline"/>
</x-form-fields>
@endguest
@endsection
