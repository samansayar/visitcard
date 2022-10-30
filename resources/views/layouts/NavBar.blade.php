<nav
    class=" bg-white w-full border-gray-400 border-t z-30 relative flex justify-between items-center mx-auto pl-8 pr-14 py-3">
    <!-- logo -->
    <div class="flex justify-center items-center">
        <p class="text-xl font-medium text-indigo-700">Card Panel Visit</p>
    </div>

    <!-- end logo -->

    <!-- search bar -->
    <div class="hidden sm:block flex-shrink flex-grow-0 justify-start px-2">
        <div class="inline-block">
            <div class="inline-flex items-center max-w-full">
                <button class="flex items-center flex-grow-0 flex-shrink pl-2 relative border rounded-xl px-1"
                    type="button">
                    <div class="w-full px-2">
                        <input type="search" name="search" id="search" placeholder="جستجو کنید...."
                            class="w-full rounded-md border-none focus:ring-0 focus:shadow-none bg-white py-2 focus:outline-none px-5 text-base text-gray-700 placeholder:text-gray-400 outline-none" />
                    </div>
                    <div class="flex items-center justify-center relative mx-2  h-6 w-6 rounded-full">
                        <svg class="text-gray-400" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true" role="presentation" focusable="false"
                            style="
                                display: block;
                                fill: none;
                                height: 20px;
                                width: 20px;
                                stroke: currentcolor;
                                stroke-width: 2;
                                overflow: visible;
                            ">
                            <g fill="none">
                                <path
                                    d="m13 24c6.0751322 0 11-4.9248678 11-11 0-6.07513225-4.9248678-11-11-11-6.07513225 0-11 4.92486775-11 11 0 6.0751322 4.92486775 11 11 11zm8-3 9 9">
                                </path>
                            </g>
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </div>
    <!-- end search bar -->

    <!-- login -->
    <div class="flex flex-col items-center space-x-3" x-data='{open : false}'>
        <button @click='open = !open'>
            <div class="flex w-10 h-10 rounded-full border border-indigo-600 items-center relative">
                <img src="{{ asset('images/samansayyar.jpeg') }}" class="object-cover rounded-full w-10 h-10" />
            </div>
        </button>
        <div x-show="open" x-transition class="absolute h-auto left-0 bottom-0 top-[74px]">
            <div class="bg-white w-44 flex flex-col  rounded-lg shadow-md p-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="hover:bg-indigo-600 transition duration-200 rounded-md hover:text-indigo-100 text-gray-700 px-2 py-2 flex items-center">
                        <span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                        </span>
                        <span class="mr-6 text-sm">خروج</span>
                    </a>
                </form>
            </div>
        </div>
    </div>
    <!-- end login -->
</nav>
