@extends('layouts.tailwind')

@section('content')
<section class="min-h-[70vh] bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            {{ __('Confirm Password') }}
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow-xl sm:rounded-2xl sm:px-10 border border-gray-100">
            <p class="text-sm text-gray-700 mb-6 text-center">
                {{ __('Please confirm your password before continuing.') }}
            </p>

            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        {{ __('Password') }}
                    </label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="appearance-none block w-full px-3 py-2 border @error('password') border-red-300 @else border-gray-300 @enderror rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600" id="password-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div>
                        <button type="submit"
                            class="flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                            {{ __('Confirm Password') }}
                        </button>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:text-blue-500 transition duration-150 ease-in-out">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
