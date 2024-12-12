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

