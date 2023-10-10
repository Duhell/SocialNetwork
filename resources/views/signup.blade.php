@extends('mainLayout.main')
@section('contents')
@guest
<x-form-fields link="{{ route('signup') }}" class="w-full h-screen flex justify-center items-center">
    <p class="text-xl pb-3">Welcome to Social Network</p>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error )
                    <li class="text-xs text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <x-field type="text" title="Name"/>
    <x-field type="text" title="Email"/>
    <x-field type="password" title="Password"/>
    <x-field type="password" title="Confirm Password"/>
    <x-button-click type="submit" title="Signup" class="my-3 w-full"/>
    <x-tolink link="/" title="Login here" class="text-xs hover:underline"/>
</x-form-fields>
@endguest
@endsection
