<x-app-layout>
    <x-slot name="header">ایجاد شهر جدید</x-slot>
    <div x-data="{ dataCity: [], handlerMessage: true }" x-init="dataCity = await (await fetch('https://iran-locations-api.vercel.app/api/v1/states')).json()">
        {{-- TODO =>  CODEING HERE.... --}}
        <div class="lg:grid grid-cols-12 gap-4 w-full relative">
            <div class="lg:col-span-7 w-full relative rounded-md">
                <div x-data="{ tab: 'state' }" id="tab_wrapper">
                    <!-- The tabs navigation -->
                    <nav class="flex space-x-1 rounded-xl bg-yellow-300 p-1">
                        <button :class="{ 'bg-white/60 backdrop-blur-sm': tab === 'state' }"
                            @click.prevent="tab = 'state'"
                            class="transition-all duration-300 w-full rounded-lg py-2.5 text-sm font-medium leading-5 text-yellow-900 ring-white ring-opacity-60 ring-offset-2 ring-offset-blue-400 focus:outline-none focus:ring-2"
                            href="#">ایجاد استان</button>
                        <button :class="{ 'bg-white/60 backdrop-blur-sm': tab === 'city' }" @click.prevent="tab = 'city'"
                            class="transition-all duration-300 w-full rounded-lg py-2.5 text-sm font-medium leading-5 text-yellow-900 ring-white ring-opacity-60 ring-offset-2 ring-offset-blue-400 focus:outline-none focus:ring-2"
                            href="#">ایجاد شهر</button>
                    </nav>

                    <!-- The tabs content -->
                    <div x-show="tab === 'city'">
                        <form method="post" action="{{ route('admin.city.store') }}"
                            class="lg:col-span-6 w-full relative rounded-md">
                            @csrf
                            <div class="grid w-full grid-cols-2 gap-4 mt-4 transition-all duration-200">
                                <div class="col-span-2 relative block">
                                    <x-label for="state" value="نام استان را انتخاب کنید" />
                                    <select id="state" name="state" x-model="citytype"
                                        class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                                        <option>انتخاب استان</option>
                                        <template x-for="i in dataCity">
                                            <option :value="i.name" x-text="i.name"></option>
                                        </template>
                                    </select>
                                </div>
                                <div class="col-span-2 relative block">
                                    <x-label for="city" value="شهر" />
                                    <x-input id="city" class="block mt-1 w-full" type="text" name="city"
                                        value="{{ old('city') }}" placeholder="پرند" />
                                </div>
                                <div class="col-span-2 relative block">
                                    <x-label for="sort" value="ترتیب نمایش را وارد کنید" />
                                    <x-input id="sort" class="block mt-1 w-full" type="text" name="sort"
                                        value="{{ old('sort') }}" placeholder="مثال : 1" />
                                </div>

                            </div>
                            <button type="submit"
                                class="text-white  mt-4 bg-indigo-600 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-500 dark:hover:bg-indigo-600 transition duration-150 dark:focus:ring-indigo-700">
                                ایجاد شهر جدید
                            </button>
                        </form>
                    </div>
                    <div x-show="tab === 'state'">
                        <form method="post" action="{{ route('admin.state.store') }}"
                            class="lg:col-span-6 w-full relative rounded-md">
                            @csrf
                            <div class="grid w-full grid-cols-2 gap-4 mt-4 transition-all duration-200">
                                <div class="col-span-2 relative block">
                                    <x-label for="city" value="استان" />
                                    <x-input id="city" class="block mt-1 w-full" type="text" name="city"
                                        value="{{ old('city') }}" placeholder="تهران" />
                                </div>
                                <div class="col-span-2 relative block">
                                    <x-label for="prenumber" value="پیش شماره را وارد کنید" />
                                    <x-input id="prenumber" class="block mt-1 w-full" type="text" name="prenumber"
                                        value="{{ old('prenumber') }}" placeholder="021" />
                                </div>
                                <div class="col-span-2 relative block">
                                    <x-label for="sort" value="ترتیب نمایش را وارد کنید" />
                                    <x-input id="sort" class="block mt-1 w-full" type="text" name="sort"
                                        value="{{ old('sort') }}" placeholder="مثال : 1" />
                                </div>

                            </div>
                            <button type="submit"
                                class="text-white  mt-4 bg-indigo-600 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-500 dark:hover:bg-indigo-600 transition duration-150 dark:focus:ring-indigo-700">
                                ایجاد شهر جدید
                            </button>
                        </form>
                    </div>

                </div>




            </div>

            <div class="lg:col-span-5 w-full relative rounded-md p-2">
                <!-- Validation Errors -->
                <div class="mt-6">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                </div>
                @if (session('success'))
                    <div class="mt-6 relative" x-show="handlerMessage" x-collapse.duration.800ms>
                        <button @click="handlerMessage = ! handlerMessage"
                            class="w-10 h-10 flex justify-center items-center top-4 right-4 rounded-full absolute">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                        <div class="bg-green-50 p-4 rounded-lg border border-gray-300">
                            <div
                                class="w-24 h-24 rounded-full bg-green-500/20 mx-auto flex justify-center items-center">
                                <img src="{{ asset('images/party-popper.png') }}"
                                    class="w-full h-full object-cover p-1.5" />
                                {{-- <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_jbrw3hcz.json"
                    background="transparent" speed="1" class="w-32"></lottie-player> --}}
                            </div>
                            <div class="text-center mt-6 text-sm w-full font-medium text-green-500">
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
</x-app-layout>
