<x-app-layout>
    <x-slot name="header">لیست کلی <span class="text-xs text-gray-600 mx-1">( {{ count($data) }} )</span> </x-slot>

    @livewire('requestlists')
</x-app-layout>
