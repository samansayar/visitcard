<x-app-layout>
    <x-slot name="header"> ایجاد کاربر جدید</x-slot>
    <div x-data="{ dataCity: [], handlerMessage: true }" x-init="dataCity = await (await fetch('https://iran-locations-api.vercel.app/api/v1/states')).json()">
        {{-- TODO =>  CODEING HERE.... --}}
        <div class="lg:grid grid-cols-12 gap-4 w-full relative">
            <div class="lg:col-span-7 w-full relative rounded-md">

                <form method="post" action="{{ route('admin.users.store') }}"
                    class="lg:col-span-6 w-full relative rounded-md">
                    @csrf
                    <div class="grid w-full grid-cols-2 gap-4 mt-4 transition-all duration-200">
                        <div class="relative block">
                            <x-label for="title" value="عنوان را انتخاب کنید" />
                            <select id="title" name="title" autofocus
                                class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                                <option value="">انتخاب عنوان</option>
                                <option value="فروشگاه" {{ old('title') == 'فروشگاه' ? 'selected' : '' }}>فروشگاه
                                </option>
                                <option value="الکتریکی" {{ old('title') == 'الکتریکی' ? 'selected' : '' }}>الکتریکی
                                </option>
                                <option value="روشنایی" {{ old('title') == 'روشنایی' ? 'selected' : '' }}>روشنایی
                                </option>
                                <option value="لوازم برقی" {{ old('title') == 'لوازم برقی' ? 'selected' : '' }}>
                                    لوازم برقی</option>
                                <option value="الکترو" {{ old('title') == 'الکترو' ? 'selected' : '' }}>الکترو
                                </option>
                                <option value="نمایشگاه" {{ old('title') == 'نمایشگاه' ? 'selected' : '' }}>نمایشگاه
                                </option>
                                <option value="کالای برقی" {{ old('title') == 'کالای برقی' ? 'selected' : '' }}>
                                    کالای برقی</option>
                                <option value="کالای ساختمانی" {{ old('title') == 'کالای ساختمانی' ? 'selected' : '' }}>
                                    کالای ساختمانی</option>
                                <option value="صنایع و بازرگانی"
                                    {{ old('title') == 'صنایع و بازرگانی' ? 'selected' : '' }}>صنایع و بازرگانی
                                </option>
                                <option value="شرکت" {{ old('title') == 'شرکت' ? 'selected' : '' }}>شرکت</option>
                            </select>
                        </div>
                        <div class="relative block">
                            <x-label for="title" value="نام عنوان را وارد کنید" />
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title"
                                value="{{ old('title') }}" />
                        </div>
                        <div class="relative block">
                            <x-label for="sort" value="نام فروشگاه / شرکت را وارد کنید" />
                            <x-input id="sort" class="block mt-1 w-full" type="text" name="sort"
                                value="{{ old('sort') }}" placeholder="مثال: الکترو دهقان" />
                        </div>
                        <div class="relative block">
                            <x-label for="sort" value="کد سیستم را وارد کنید" />
                            <x-input id="sort" class="block mt-1 w-full" type="text" name="sort"
                                value="{{ old('sort') }}" placeholder="مثال: ۱۲۳۴۵۶" />
                        </div>
                        <div class="relative block">
                            <x-label for="city" value="استان را انتخاب کنید" />
                            <select id="city" name="city" x-model="citytype"
                                class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                                <option>انتخاب استان</option>
                                <template x-for="i in dataCity">
                                    <option :value="i.name" x-text="i.name"></option>
                                </template>
                            </select>
                        </div>
                        <div class="relative block">
                            <x-label for="state" value="شهر" />
                            <x-input id="state" class="block mt-1 w-full" type="text" name="state"
                                value="{{ old('state') }}" placeholder="پرند" />
                        </div>
                        <div class=" relative block">
                            <x-label type="phone" value="شماره موبایل" />

                            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                value="09016189372" />
                        </div>

                        <div class="relative block">
                            <x-label type="prephone" value="پیش شماره" />

                            <x-input id="prephone" class="block mt-1 w-full" type="text" name="prephone"
                                value="021" />
                        </div>
                        <div class="lg:col-span-2 relative block">
                            <x-label for="address_shop" value="آدرس فروشگاه" />
                            <x-input id="address_shop" class="block mt-1 w-full" type="text" name="address_shop"
                                value="{{ old('address_shop') }}" placeholder="لاله زار جنوبی پلاک ۷۸" />
                        </div>
                        <div class="relative block">
                            <x-label type="fname" value="نام صاحب فروشگاه" />

                            <x-input id="fname" value="{{ old('fname') }}" class="block mt-1 w-full"
                                type="text" name="fname" placeholder="به عنوان مثال: محمد" />
                        </div>
                        <div class="relative block">
                            <x-label type="lname" value="نام خانوادگی صاحب فروشگاه" />

                            <x-input id="lname" value="{{ old('lname') }}" class="block mt-1 w-full"
                                type="text" name="lname" placeholder="به عنوان مثال :‌ملک محمدی" />
                        </div>
                        <div class=" relative block">
                            <x-label type="phone" value="شماره موبایل" />

                            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                value="09016189372" />
                        </div>
                        <div class=" relative block">
                            <x-label type="phone" value="شماره موبایل" />

                            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                value="09016189372" />
                        </div>
                        <div class="col-span-2 relative block">
                            <x-label for="startdate" value="تاریخ شروع را وارد کنید" />
                            <x-input id="startdate" data-jdp class="block mt-1 w-full" type="text" name="startdate"
                                readonly value="{{ old('startdate') }}" />
                        </div>
                        <div class="relative block lg:col-span-2">
                            <x-label for="desc" value="توضیحات" />
                            <textarea rows="4" id="desc" name="desc"
                                class="text bg-gray-50 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-5 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">{{ old('desc') }}</textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white  mt-4 bg-indigo-600 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-500 dark:hover:bg-indigo-600 transition duration-150 dark:focus:ring-indigo-700">
                        ایجاد کاربر جدید
                    </button>
                </form>



            </div>

            <div class="lg:col-span-5 w-full relative rounded-md p-2">
                <!-- Validation Errors -->
                <div class="mt-6">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                </div>
                {{-- @if (session('success')) --}}
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
                        <div class="w-24 h-24 rounded-full bg-green-500/20 mx-auto flex justify-center items-center">
                            <img src="{{ asset('images/party-popper.png') }}"
                                class="w-full h-full object-cover p-1.5" />
                            {{-- <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_jbrw3hcz.json"
                    background="transparent" speed="1" class="w-32"></lottie-player> --}}
                        </div>
                        <div class="text-center mt-6 text-sm w-full font-medium text-green-500">
                            کاربر جدید با موفقیت اضافه شد
                        </div>
                    </div>
                </div>
                {{-- @endif --}}
            </div>
        </div>
</x-app-layout>
