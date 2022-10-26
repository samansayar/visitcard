<div class='font-light w-2/12 h-screen hidden lg:flex flex-col bg-white px-2'>
    <div class="w-full flex justify-center flex-col items-center">
        <img src="{{ asset('images/samansayyar.jpeg') }}"
            class="object-cover rounded-full w-28 ring-2 ring-indigo-700 ring-offset-4 h-28" />
        <p class="text-xl mt-6 font-medium text-gray-800">smana sayyar</p>
    </div>
    @if (auth()->user()->name === 'admin')
        <div class='mt-10 divide-y-2 flex flex-col divide-gray-100'>


            <a href="{{ route('dashboard') }}"
                class='py-2 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md hover:text-indigo-100 text-gray-600 w-full'>
                <div class="flex items-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>
                    </svg>
                    <div class='capitalize mr-4 text-sm'>داشبورد</div>
                </div>
            </a>

            <div x-data='{ open :false }' class="relative">
                <div @click="open = !open"
                    class='py-3 px-2 hover:shadow-md shadow-gray-300 flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md hover:text-white text-gray-600 w-full'>
                    <div class="flex items-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <div class='capitalize mr-4 text-sm'>مدیریت کاربران</div>
                    </div>
                    <div>
                        <svg :class="open ? 'rotate-180' : 'rotate-0'" class="w-5 transition duration-75 h-5"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                </div>

                <div x-show='open' x-collapse
                    class="bg-gray-100 rounded-lg w-full py-1 divide-y-2 flex flex-col divide-gray-100">
                    <a href="{{ route('admin.users.create') }}"
                        class='py-2 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md text-gray-600 hover:text-indigo-100 w-full'>
                        <div class="flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                            <div class='capitalize mr-4 text-sm'>ایجاد کاربر جدید</div>
                        </div>
                    </a>
                    <a href="{{ route('admin.users.index') }}"
                        class='py-2 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md text-gray-600 hover:text-indigo-100 w-full'>
                        <div class="flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                            <div class='capitalize mr-4 text-sm'>لیست کاربران</div>
                        </div>
                    </a>
                </div>
            </div>
            <div x-data='{ open :false }' class="relative">
                <div @click="open = !open"
                    class='py-3 px-2 hover:shadow-md shadow-gray-300 flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md hover:text-white text-gray-600 w-full'>
                    <div class="flex items-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
                        <div class='capitalize mr-4 text-sm'>مدیریت شهر و استان</div>
                    </div>
                    <div>
                        <svg :class="open ? 'rotate-180' : 'rotate-0'" class="w-5 transition duration-75 h-5"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                </div>

                <div x-show='open' x-collapse
                    class="bg-gray-100 rounded-lg w-full py-1 divide-y-2 flex flex-col divide-gray-100">
                    <a href="{{ route('admin.city.create') }}"
                        class='py-2 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md text-gray-600 hover:text-indigo-100 w-full'>
                        <div class="flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                            <div class='capitalize mr-4 text-sm'>افزودن شهر و استان</div>
                        </div>
                    </a>
                    <a href="{{ route('admin.city.index') }}"
                        class='py-2 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md text-gray-600 hover:text-indigo-100 w-full'>
                        <div class="flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                            <div class='capitalize mr-4 text-sm'>لیست شهر / استان</div>
                        </div>
                    </a>
                </div>
            </div>

            <div x-data='{ open :false }' class="relative">
                <div @click="open = !open"
                    class='py-3 px-2 hover:shadow-md shadow-gray-300 flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md hover:text-white text-gray-600 w-full'>
                    <div class="flex items-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
                        <div class='capitalize mr-4 text-sm'>مدیریت فرم ها</div>
                    </div>
                    <div>
                        <svg :class="open ? 'rotate-180' : 'rotate-0'" class="w-5 transition duration-75 h-5"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                </div>

                <div x-show='open' x-collapse
                    class="bg-gray-100 rounded-lg w-full py-1 divide-y-2 flex flex-col divide-gray-100">
                    <a href="{{ route('admin.form.create') }}"
                        class='py-2 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md text-gray-600 hover:text-indigo-100 w-full'>
                        <div class="flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                            <div class='capitalize mr-4 text-sm'>افزودن فرم</div>
                        </div>
                    </a>
                    <a href="{{ route('admin.form.index') }}"
                        class='py-2 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md text-gray-600 hover:text-indigo-100 w-full'>
                        <div class="flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                            <div class='capitalize mr-4 text-sm'>همه فرم ها</div>
                        </div>
                    </a>
                </div>
            </div>

            <div x-data='{ open :false }' class="relative">
                <div @click="open = !open"
                    class='py-3 px-2 hover:shadow-md shadow-gray-300 flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md hover:text-white text-gray-600 w-full'>
                    <div class="flex items-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <div class='capitalize mr-4 text-sm'>مدیریت سمت</div>
                    </div>
                    <div>
                        <svg :class="open ? 'rotate-180' : 'rotate-0'" class="w-5 transition duration-75 h-5"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                </div>

                <div x-show='open' x-collapse
                    class="bg-gray-100 rounded-lg w-full py-1 divide-y-2 flex flex-col divide-gray-100">
                    <a href="{{ route('admin.semat.create') }}"
                        class='py-2 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md text-gray-600 hover:text-indigo-100 w-full'>
                        <div class="flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                            <div class='capitalize mr-4 text-sm'>افزودن سمت</div>
                        </div>
                    </a>
                    <a href="{{ route('admin.semat.index') }}"
                        class='py-2 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md text-gray-600 hover:text-indigo-100 w-full'>
                        <div class="flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                            <div class='capitalize mr-4 text-sm'>همه سمت ها</div>
                        </div>
                    </a>
                </div>
            </div>

            <div x-data='{ open :false }' class="relative">
                <div @click="open = !open"
                    class='py-3 px-2 hover:shadow-md shadow-gray-300 flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md hover:text-white text-gray-600 w-full'>
                    <div class="flex items-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        <div class='capitalize mr-4 text-sm'>مدیریت سطح دسترسی</div>
                    </div>
                    <div>
                        <svg :class="open ? 'rotate-180' : 'rotate-0'" class="w-5 transition duration-75 h-5"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                </div>

                <div x-show='open' x-collapse
                    class="bg-gray-100 rounded-lg w-full py-1 divide-y-2 flex flex-col divide-gray-100">
                    <a href="{{ route('admin.accessbility.create') }}"
                        class='py-2 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md text-gray-600 hover:text-indigo-100 w-full'>
                        <div class="flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                            <div class='capitalize mr-4 text-sm'>ایجاد سطح دسترسی</div>
                        </div>
                    </a>
                    <a href="{{ route('admin.accessbility.index') }}"
                        class='py-2 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md text-gray-600 hover:text-indigo-100 w-full'>
                        <div class="flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                            <div class='capitalize mr-4 text-sm'>لیست سطح دسترسی</div>
                        </div>
                    </a>
                </div>
            </div>

            <div x-data='{ open :false }' class="relative">
                <div @click="open = !open"
                    class='py-3 px-2 hover:shadow-md shadow-gray-300 flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md hover:text-white text-gray-600 w-full'>
                    <div class="flex items-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <div class='capitalize mr-4 text-sm'>مدیریت عناوین فروشگاه</div>
                    </div>
                    <div>
                        <svg :class="open ? 'rotate-180' : 'rotate-0'" class="w-5 transition duration-75 h-5"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                </div>

                <div x-show='open' x-collapse
                    class="bg-gray-100 rounded-lg w-full py-1 divide-y-2 flex flex-col divide-gray-100">
                    <a href="{{ route('admin.shop-titles.create') }}"
                        class='py-2 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md text-gray-600 hover:text-indigo-100 w-full'>
                        <div class="flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                            <div class='capitalize mr-4 text-sm'>ایجاد عنوان جدید</div>
                        </div>
                    </a>
                    <a href="{{ route('admin.shop-titles.index') }}"
                        class='py-2 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md text-gray-600 hover:text-indigo-100 w-full'>
                        <div class="flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                            <div class='capitalize mr-4 text-sm'>لیست عناوین فروشگاه</div>
                        </div>
                    </a>
                </div>
            </div>

            <div x-data='{ open :false }' class="relative">
                <div @click="open = !open"
                    class='py-3 px-2 hover:shadow-md shadow-gray-300 flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md hover:text-white text-gray-600 w-full'>
                    <div class="flex items-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                            </path>
                        </svg>
                        <div class='capitalize mr-4 text-sm'>مدیریت عناوین کارت ها</div>
                    </div>
                    <div>
                        <svg :class="open ? 'rotate-180' : 'rotate-0'" class="w-5 transition duration-75 h-5"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                </div>

                <div x-show='open' x-collapse
                    class="bg-gray-100 rounded-lg w-full py-1 divide-y-2 flex flex-col divide-gray-100">
                    <a href="{{ route('admin.visit-titles.create') }}"
                        class='py-2 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md text-gray-600 hover:text-indigo-100 w-full'>
                        <div class="flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                            <div class='capitalize mr-4 text-sm'>ایجاد عنوان جدید</div>
                        </div>
                    </a>
                    <a href="{{ route('admin.visit-titles.index') }}"
                        class='py-2 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md text-gray-600 hover:text-indigo-100 w-full'>
                        <div class="flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                            <div class='capitalize mr-4 text-sm'>لیست عناوین کارت</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class='mt-10 divide-y-2 flex flex-col divide-gray-100'>


            <a href="{{ route('dashboard') }}"
                class='py-2 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md hover:text-indigo-100 text-gray-600 w-full'>
                <div class="flex items-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>
                    </svg>
                    <div class='capitalize mr-4 text-sm'>داشبورد</div>
                </div>
            </a>

            <a href="{{ route('request.index') }}"
                class='py-3 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md hover:text-indigo-100 text-gray-600 w-full'>
                <div class="flex items-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                        </path>
                    </svg>
                    <div class='capitalize mr-4 text-sm'>درخواست کارت ویزیت</div>
                </div>
            </a>
            <div x-data='{ open :false }' class="relative">
                <div @click="open = !open"
                    class='py-3 px-2 hover:shadow-md shadow-gray-300 flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md hover:text-white text-gray-600 w-full'>
                    <div class="flex items-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <div class='capitalize mr-4 text-sm'>مدیریت فروشگاه</div>
                    </div>
                    <div>
                        <svg :class="open ? 'rotate-180' : 'rotate-0'" class="w-5 transition duration-75 h-5"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                </div>

                <div x-show='open' x-collapse
                    class="bg-gray-100 rounded-lg w-full py-1 divide-y-2 flex flex-col divide-gray-100">
                    <a href="{{ route('shop.create') }}"
                        class='py-2 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md text-gray-600 hover:text-indigo-100 w-full'>
                        <div class="flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                            <div class='capitalize mr-4 text-sm'>ایجاد فروشگاه جدید</div>
                        </div>
                    </a>
                    <a href="{{ route('shop.index') }}"
                        class='py-2 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md text-gray-600 hover:text-indigo-100 w-full'>
                        <div class="flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                            <div class='capitalize mr-4 text-sm'>لیست فروشگاه ها</div>
                        </div>
                    </a>
                </div>
            </div>

            <div x-data='{ open :false }' class="relative">
                <div @click="open = !open"
                    class='py-3 px-2 hover:shadow-md shadow-gray-300 flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md hover:text-white text-gray-600 w-full'>
                    <div class="flex items-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <div class='capitalize mr-4 text-sm'>مدیریت کاربران</div>
                    </div>
                    <div>
                        <svg :class="open ? 'rotate-180' : 'rotate-0'" class="w-5 transition duration-75 h-5"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                </div>

                <div x-show='open' x-collapse
                    class="bg-gray-100 rounded-lg w-full py-1 divide-y-2 flex flex-col divide-gray-100">
                    <a href="{{ route('member.create') }}"
                        class='py-2 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md text-gray-600 hover:text-indigo-100 w-full'>
                        <div class="flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                            <div class='capitalize mr-4 text-sm'>ایجاد کاربر جدید</div>
                        </div>
                    </a>
                    <a href="{{ route('member.index') }}"
                        class='py-2 px-2 hover:shadow-md shadow-gray-300 transition-all flex justify-between items-center cursor-pointer duration-75 hover:bg-indigo-600 rounded-md text-gray-600 hover:text-indigo-100 w-full'>
                        <div class="flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                            <div class='capitalize mr-4 text-sm'>لیست کاربران</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
