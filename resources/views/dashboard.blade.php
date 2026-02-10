<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display font-semibold text-2xl text-slate-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white/70 backdrop-blur-sm overflow-hidden shadow-xl shadow-premium-100 sm:rounded-2xl border border-white/50">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>