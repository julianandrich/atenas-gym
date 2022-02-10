<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
      <a href="/">
        <x-application-logo class="w-65 h-40 fill-current text-gray-500" />
      </a>
    </x-slot>

    <div class="mb-4 text-sm text-gray-600">
      {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('password.email') }}">
      @csrf

      <!-- Email Address -->
      <div>
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
          autofocus />
      </div>

      <div class="flex items-center justify-between mt-4">
        <a href="{{ route('login') }}">
          <x-button type="button" class="bg-gray-600 hover:bg-gray-700">
            {{ __('Back') }}
          </x-button>
        </a>

        <x-button class="bg-red-800 hover:bg-red-700">
          {{ __('Email Password Reset Link') }}
        </x-button>

      </div>
    </form>
  </x-auth-card>
</x-guest-layout>