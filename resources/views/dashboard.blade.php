<x-app-layout>
    <x-slot name="header">
        {$setting->title}
    </x-slot>

    <div>
        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <div class="flex items-center rounded-xl bg-white p-4 shadow">
                <div class="flex h-12 w-12 items-center justify-center rounded-full border border-blue-100 bg-blue-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                </div>

                <div class="mr-4">
                    <h2 class="font-medium text-gray-700">574 درخواست ها</h2>
                </div>
            </div>

            <div class="flex items-center rounded-xl bg-white p-4 shadow">
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-full border border-orange-100 bg-orange-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>

                <div class="mr-4">
                    <h2 class="font-medium text-gray-700">574 فروشگاه</h2>
                </div>
            </div>
        </div>
        <div class="w-full mt-10">
            <h1 class="text-xl font-medium">اطلاعیه</h1>
            <p class="text-gray-600 leading-9 text-sm mt-4">
                {!! $setting->desc !!}
            </p>
        </div>
    </div>

</x-app-layout>
