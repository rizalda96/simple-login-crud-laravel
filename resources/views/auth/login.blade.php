{{-- <x-guest-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.guest')

@section('content')
<form method="POST" action="{{ route('login') }}">
  @csrf

  <div>
    <x-input-label for="user_email" :value="__('Email')" />
    <x-text-input id="user_email" class="block mt-1 w-full" type="email" name="user_email" :value="old('user_email')" required autofocus />
</div>

        <!-- Password -->
        <div class="mt-4">
          <x-input-label for="user_password" :value="__('Password')" />

          <x-text-input id="user_password" class="block mt-1 w-full"
                          type="password"
                          name="user_password"
                          required autocomplete="current-password" />

      </div>

      <div class="flex items-center justify-end mt-4">

          <x-primary-button class="ms-3">
              {{ __('Log in') }}
          </x-primary-button>
      </div>
</form>
@endsection

