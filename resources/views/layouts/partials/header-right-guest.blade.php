<div class="flex space-x-5">
    <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
        {{ __('login') }}
    </x-nav-link>
    <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
        {{ __('register') }}
    </x-nav-link>
</div>
