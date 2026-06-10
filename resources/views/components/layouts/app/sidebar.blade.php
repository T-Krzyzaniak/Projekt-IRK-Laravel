<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />
            <b>IRK Kalisz</b>
            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Menu Nawigacyjne')" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Ekran Startowy') }}</flux:navlist.item>
                    <flux:navlist.item icon="home" :href="route('candidate.index')" :current="request()->routeIs('candidate.index')" wire:navigate>{{ __('Kandydatury') }}</flux:navlist.item>
                    <flux:navlist.item icon="home" :href="route('zapisy.index')" :current="request()->routeIs('zapisy.index')" wire:navigate>{{ __('Zapisy') }}</flux:navlist.item>
                    <flux:navlist.item icon="home" :href="route('course.index')" :current="request()->routeIs('course.index')" wire:navigate>{{ __('Lista Kierunków') }}</flux:navlist.item>
                    <flux:navlist.item icon="home" :href="route('pracowniks.index')" :current="request()->routeIs('pracowniks.index')" wire:navigate>{{ __('Pracownicy') }}</flux:navlist.item>
                    <flux:navlist.item icon="home" :href="route('uzytkownicy.index')" :current="request()->routeIs('uzytkownicy')" wire:navigate>{{ __('Uzytkownicy') }}</flux:navlist.item>
                    <flux:navlist.item icon="home" :href="route('log-viewer.index')" :current="request()->routeIs('log-viewer')" wire:navigate>{{ __('Logi') }}</flux:navlist.item>

                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="book-open-text" href="https://liczgrupa.pl/kalkulatory/edukacja/kalkulator-ects-studenckiej" target="_blank">
                {{ __('Kalkulator ECTS') }}
                </flux:navlist.item>
                 <flux:navlist.item icon="book-open-text" href="https://www.thule.com/pl-pl/articles/tips/starting-university-here-are-22-tips-for-students" target="_blank">
                {{ __('Porady dla studenta') }}
                </flux:navlist.item>
                 <flux:navlist.item icon="book-open-text" href="https://biblioteka.uniwersytetkaliski.edu.pl/" target="_blank">
                {{ __('Biblioteka dla studenta') }}
                </flux:navlist.item>
            </flux:navlist>

            <!-- Desktop User Menu -->
            <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon:trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
