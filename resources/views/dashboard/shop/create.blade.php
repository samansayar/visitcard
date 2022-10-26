<x-app-layout>
    <x-slot name="header">ثبت فروشگاه جدید</x-slot>
    <div x-data="{ dataCity: [], handlerMessage: true }" x-init="dataCity = await (await fetch('https://iran-locations-api.vercel.app/api/v1/states')).json()">
        {{-- TODO =>  CODEING HERE.... --}}
        <div class="lg:grid grid-cols-12 gap-4 w-full relative">
            <div class="lg:col-span-7 w-full relative rounded-md">

                <form method="post" action="{{ route('shop.store') }}" class="lg:col-span-6 w-full relative rounded-md">
                    @csrf
                    <div class="grid w-full grid-cols-2 gap-4 mt-4 transition-all duration-200">
                        <div class="relative block">
                            <x-label for="type_shop" value="عنوان را انتخاب کنید" />
                            <select id="type_shop" name="type_shop" autofocus
                                class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                                <option value="">انتخاب عنوان</option>
                                <option value="فروشگاه" {{ old('type_shop') == 'فروشگاه' ? 'selected' : '' }}>فروشگاه
                                </option>
                                <option value="الکتریکی" {{ old('type_shop') == 'الکتریکی' ? 'selected' : '' }}>الکتریکی
                                </option>
                                <option value="روشنایی" {{ old('type_shop') == 'روشنایی' ? 'selected' : '' }}>روشنایی
                                </option>
                                <option value="لوازم برقی" {{ old('type_shop') == 'لوازم برقی' ? 'selected' : '' }}>
                                    لوازم برقی</option>
                                <option value="الکترو" {{ old('type_shop') == 'الکترو' ? 'selected' : '' }}>الکترو
                                </option>
                                <option value="نمایشگاه" {{ old('type_shop') == 'نمایشگاه' ? 'selected' : '' }}>نمایشگاه
                                </option>
                                <option value="کالای برقی" {{ old('type_shop') == 'کالای برقی' ? 'selected' : '' }}>
                                    کالای برقی</option>
                                <option value="کالای ساختمانی"
                                    {{ old('type_shop') == 'کالای ساختمانی' ? 'selected' : '' }}>کالای ساختمانی</option>
                                <option value="صنایع و بازرگانی"
                                    {{ old('type_shop') == 'صنایع و بازرگانی' ? 'selected' : '' }}>صنایع و بازرگانی
                                </option>
                                <option value="شرکت" {{ old('type_shop') == 'شرکت' ? 'selected' : '' }}>شرکت</option>
                            </select>
                        </div>
                        <div class="relative block">
                            <x-label for="name_shop" value=" صاحب کسب و کار را انتخاب کنید" />
                            @if (count($members) > 0)
                                <select id="name_shop" name="name_shop"
                                    class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                                    <option value="">انتخاب کنید</option>
                                    @foreach ($members as $memeber)
                                        <option value="{{ $memeber->fname.' '.$memeber->lname }}" {{ old('name_shop') == $memeber->fname.' '.$memeber->lname ? 'selected' : '' }}>{{ $memeber->fname.' '.$memeber->lname }}</option>
                                    @endforeach
                                </select>
                            @else
                                <p class="py-6">چیزی وجود ندارد</p>
                            @endif
                        </div>
                        <div class="col-span-2 my-2 w-full h-[0.6px] bg-gray-200 rounded-full"></div>
                        <div class="lg:col-span-2 relative block">
                            <x-label type="founder_shop" value="نام فروشگاه / شرکت را وارد کنید" />

                            <x-input id="founder_shop" value="{{ old('founder_shop') }}" class="block mt-1 w-full"
                                placeholder="به عنوان مثال الکترودهقان" type="text" name="founder_shop" />
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
                        <div class="relative block">
                            <x-label for="address_shop" value="آدرس فروشگاه" />
                            <x-input id="address_shop" class="block mt-1 w-full" type="text" name="address_shop"
                                value="{{ old('address_shop') }}" placeholder="لاله زار جنوبی پلاک ۷۸" />
                        </div>
                        <div class="relative block lg:col-span-2">
                            <x-label for="desc" value="توضیحات" />
                            <textarea rows="4" id="desc" name="desc"
                                class="text bg-gray-50 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-5 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">{{ old('desc') }}</textarea>
                        </div>
                        <div class="flex relative lg:col-span-2 mb-6">
                            <div class="flex items-center cursor-pointer">
                                <input id="terms" name="terms" type="checkbox"
                                    class="w-5 h-5 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-600 dark:ring-offset-gray-800">
                            </div>
                            <label for="terms"
                                class="mx-2 text-sm font-medium text-gray-700 dark:text-gray-400">اطلاعات
                                وارد شده برای فروشگاه را قبول میکنم</label>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white  mt-4 bg-indigo-600 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-500 dark:hover:bg-indigo-600 transition duration-150 dark:focus:ring-indigo-700">
                        ایجاد فروشگاه جدید
                    </button>
                </form>



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
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
                            <div class="mx-auto w-full flex justify-center items-center">
                                <a href="{{ route('shop.index') }}"
                                    class="text-white bg-green-400 mx-auto hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-xs w-full sm:w-auto px-4 py-2 text-center dark:bg-green-500 dark:hover:bg-green-600 transition duration-150 dark:focus:ring-green-700">
                                    برو به لیست فروشگاه
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
</x-app-layout>
