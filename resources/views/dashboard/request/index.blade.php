<x-app-layout>
    <x-slot name="header">درخواست کارت ویزیت</x-slot>
    <div x-data="{
        selectedsemat: [],
        selectSemat: [
            { value: 'مدیرعامل' },
            { value: 'مدیر فروشگاه' },
            { value: 'سرپرست فروش' },
            { value: 'کارشناس فروش' },
            { value: 'مدیر خدمات پس از فروش' },
            { value: 'کارشناس خدمات پس از فروش' },
            { value: 'سایر' }
        ],
        semats: [],
    }">


        {{-- TODO =>  CODEING HERE.... --}}
        <div x-data="{
            flname: '{{ 'محمد امین سیار' }}',
            showForm: false,
            phonenumber: '{{ '09016189372' }}',
            phonenumber2: '{{ '09016189372' }}',
            desc: '',
            zone: '',
            type: 'شخصی',
            prenumber: '021',
            citytype: '',
            numberP: '42334225',
            dataCity: [],
            sematvalues: null,
            dataLand: [],
            address: '',
        }" x-init="dataCity = await (await fetch('https://iran-locations-api.vercel.app/api/v1/states'))
            .json()" class="lg:grid grid-cols-12 gap-4 w-full relative">
            <div class="lg:col-span-6 w-full relative rounded-md">

                <div class="relative block">
                    <x-label for="type" value="نوع کارت را انتخاب کنید" />
                    <select id="type" x-model="type" x-on:change="console.log(type);" name="type"
                        class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                        <option>انتخاب نوع کارت</option>
                        <option value="برقکار">برقکار</option>
                        <option value="شخصی">شخصی</option>
                        <option value="فروشگاهی">فروشگاهی</option>
                    </select>
                </div>

                <div class="w-full lg:grid-cols-2 gap-4 mt-4 transition-all duration-200"
                    :class="type === 'برقکار' ? 'grid' : 'hidden'">
                    <div class="relative block">
                        <x-label for="electron_name" value="نام برقکار را انتخاب کنید" />
                        <select id="electron_name" name="electron_name"
                            class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                            <option>انتخاب نام برقکار</option>
                            <option value="سامان سیار">سامان سیار</option>
                            <option value="سامان سیار">سامان سیار</option>
                            <option value="سامان سیار">سامان سیار</option>
                        </select>
                    </div>
                    <div class="relative block">
                        <x-label for="shop_name" name="shop_name" value="نام فروشگاه را انتخاب کنید" />
                        <select id="shop_name"
                            class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                            <option>انتخاب نام برقکار</option>
                            <option value="none">الکتروسامان</option>
                            <option value="none">الکتروسامان</option>
                            <option value="none">الکتروسامان</option>
                        </select>
                    </div>
                    <div class="col-span-2 my-2 w-full h-[0.6px] bg-gray-200 rounded-full"></div>
                    <div class="lg:col-span-2 relative block">
                        <x-label type="flname" value="نام نام خانوادگی صاحب فروشگاه" />

                        <x-input x-model="flname" id="flname" value="{{ old('flname') }}" class="block mt-1 w-full"
                            type="text" name="flname" value="سامان سیار" />
                    </div>
                    <div class="relative block">
                        <x-label type="fname" value="نام" />

                        <x-input id="fname" value="{{ old('fname') }}" class="block mt-1 w-full" type="text"
                            name="fname" value="سامان" />
                    </div>
                    <div class="relative block">
                        <x-label type="lname" value="نام خانوادگی" />

                        <x-input id="lname" value="{{ old('lname') }}" class="block mt-1 w-full" type="text"
                            name="lname" value="سیار" />
                    </div>
                    <div class="lg:col-span-2 relative block">
                        <x-label type="phonenumber" value="شماره موبایل" />

                        <x-input value="{{ old('phonenumber') }}" x-model="phonenumber" id="phonenumber"
                            class="block mt-1 w-full" type="text" name="phonenumber" value="09016189372" />
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
                        <x-label for="land" value="شهر" />
                        <x-input id="land" class="block mt-1 w-full" type="text" name="land"
                            value="{{ old('land') }}" placeholder="پرند" />
                    </div>
                    <div class="relative block">
                        <x-label for="zone" value="محدوده فعالیت خود را وارد کنید" />
                        <select x-model="zone" name="zone" id="zone"
                            class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                            <option>انتخاب محدوده</option>
                            <option value="منطقه ۱۹">منطقه ۱۹</option>
                            <option value="منطقه ۱۹">منطقه ۱۹</option>
                        </select>
                    </div>
                    <div class="relative block lg:col-span-2">
                        <x-label for="desc" value="توضیحات" />
                        <textarea x-model="desc" rows="4" id="desc" name="desc"
                            class="text bg-gray-50 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-5 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600"></textarea>
                    </div>
                    <div class="flex relative lg:col-span-2 mb-6">
                        <div class="flex items-center cursor-pointer">
                            <input id="terms" name="terms" type="checkbox"
                                class="w-5 h-5 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-600 dark:ring-offset-gray-800">
                        </div>
                        <label for="terms"
                            class="mx-2 text-sm font-medium text-gray-700 dark:text-gray-400">اطلاعات
                            وارد شده برای برقکاری را قبول میکنم</label>
                    </div>
                </div>

                <form method="post" action="{{ route('request.store') }}"
                    :class="type === 'شخصی' ? 'grid' : 'hidden'" class="lg:col-span-6 w-full relative rounded-md">
                    @csrf
                    <div class="grid w-full grid-cols-2 gap-4 mt-4 transition-all duration-200">
                        <div class="relative block">
                            <x-label for="electron_name" value="نام شخص را انتخاب کنید" />
                            <select id="electron_name" name="electron_name"
                                class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                                <option>انتخاب نام برقکار</option>
                                <option value="سامان سیار">سامان سیار</option>
                                <option value="سامان سیار">سامان سیار</option>
                                <option value="سامان سیار">سامان سیار</option>
                            </select>
                        </div>
                        <div class="relative block">
                            <x-label for="shop_name" name="shop_name" value="نام فروشگاه را انتخاب کنید" />
                            <select id="shop_name"
                                class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                                <option>انتخاب نام برقکار</option>
                                <option value="none">الکتروسامان</option>
                                <option value="none">الکتروسامان</option>
                                <option value="none">الکتروسامان</option>
                            </select>
                        </div>
                        <div class="col-span-2 my-2 w-full h-[0.6px] bg-gray-200 rounded-full"></div>
                        <div class="lg:col-span-2 relative block">
                            <x-label type="flname" value="نام نام خانوادگی صاحب فروشگاه" />

                            <x-input x-model="flname" id="flname" value="{{ old('flname') }}"
                                class="block mt-1 w-full" type="text" name="flname" value="سامان سیار" />
                        </div>
                        <div class="relative block">
                            <x-label type="fname" value="نام" />

                            <x-input id="fname" value="{{ old('fname') }}" class="block mt-1 w-full"
                                type="text" name="fname" value="سامان" />
                        </div>
                        <div class="relative block">
                            <x-label type="lname" value="نام خانوادگی" />

                            <x-input id="lname" value="{{ old('lname') }}" class="block mt-1 w-full"
                                type="text" name="lname" value="سیار" />
                        </div>
                        <div class="lg:col-span-2 relative block">
                            <x-label type="phonenumber" value="شماره موبایل" />

                            <x-input x-model="phonenumber" id="phonenumber" class="block mt-1 w-full" type="text"
                                name="phonenumber" value="09016189372" />
                        </div>
                        <div class="lg:col-span-2 relative block">
                            <x-label type="phonenumber2" value="شماره موبایل" />

                            <x-input x-model="phonenumber2" id="phonenumber2" class="block mt-1 w-full" type="text"
                                name="phonenumber2" value="09016189372" />
                        </div>

                        <div class="relative block">
                            <x-label type="numberP" value="شماره تلفن" />

                            <x-input x-model="numberP" id="numberP" class="block mt-1 w-full" type="text"
                                name="numberP" value="09016189372" />
                        </div>
                        <div class="relative block">
                            <x-label type="phonenumber" value="پیش شماره" />

                            <x-input x-model="prenumber" id="prenumber" class="block mt-1 w-full" type="text"
                                name="prenumber" value="021" />
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
                            <x-label for="land" value="شهر" />
                            <x-input id="land" class="block mt-1 w-full" type="text" name="land"
                                value="{{ old('land') }}" placeholder="پرند" />
                        </div>
                        <div class="relative block">
                            <x-label for="zone" value="محدوده فعالیت خود را وارد کنید" />
                            <select x-model="zone" name="zone" id="zone"
                                class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                                <option>انتخاب محدوده</option>
                                <option value="منطقه ۱۹">منطقه ۱۹</option>
                                <option value="منطقه ۱۹">منطقه ۱۹</option>
                            </select>
                        </div>
                        <div class="relative block">
                            <x-label for="address" value="آدرس فروشگاه" />
                            <x-input id="address" x-model="address" class="block mt-1 w-full" type="text"
                                name="address" value="{{ old('address') }}" placeholder="لاله زار جنوبی پلاک ۷۸" />
                        </div>
                        <div class="relative w-full block col-span-2">
                            <x-label for="selectsemat" value="سمت مورد نظر را وارد کنید" />
                            <div class="flex w-full" dir="ltr">
                                <!-- Define component with preselected options -->
                                <div class="w-full my-2">
                                    <select  class="bg-gray-50 h-60 px-5 border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600" @change="console.log(semats)"
                                        x-model="semats" name="semats[]" multiple>
                                        <template x-for="(item,index) in selectSemat">
                                            <option :value='item.value' x-text='item.value'></option>
                                        </template>
                                    </select>


                                </div>
                            </div>
                        </div>

                        <div class="flex relative col-span-2 mb-6">
                            <div class="flex items-center cursor-pointer">
                                <input id="terms" name="terms" type="checkbox"
                                    class="w-5 h-5 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-600 dark:ring-offset-gray-800">
                            </div>
                            <label for="terms"
                                class="mx-2 text-sm font-medium text-gray-700 dark:text-gray-400">اطلاعات
                                وارد شده برای شخص را قبول میکنم</label>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white  mt-4 bg-indigo-600 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-500 dark:hover:bg-indigo-600 transition duration-150 dark:focus:ring-indigo-700">
                        ثبت درخواست کارت ویزیت
                    </button>
                </form>

                <form method="post" action="{{ route('request.store') }}"
                    class="lg:col-span-6 w-full relative rounded-md" :class="type === 'فروشگاهی' ? 'grid' : 'hidden'">
                    @csrf
                    <div class="w-full grid lg:grid-cols-2 gap-4 mt-4 transition-all duration-200">
                        <div class="relative block">
                            <x-label for="electron_name" value="نام شخص را انتخاب کنید" />
                            <select id="electron_name" name="electron_name"
                                class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                                <option>انتخاب نام برقکار</option>
                                <option value="سامان سیار">سامان سیار</option>
                                <option value="سامان سیار">سامان سیار</option>
                                <option value="سامان سیار">سامان سیار</option>
                            </select>
                        </div>
                        <div class="relative block">
                            <x-label for="shop_name" name="shop_name" value="نام فروشگاه را انتخاب کنید" />
                            <select id="shop_name"
                                class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                                <option>انتخاب نام برقکار</option>
                                <option value="none">الکتروسامان</option>
                                <option value="none">الکتروسامان</option>
                                <option value="none">الکتروسامان</option>
                            </select>
                        </div>
                        <div class="col-span-2 my-2 w-full h-[0.6px] bg-gray-200 rounded-full"></div>
                        <div class="lg:col-span-2 relative block">
                            <x-label type="flname" value="نام نام خانوادگی صاحب فروشگاه" />

                            <x-input x-model="flname" id="flname" value="{{ old('flname') }}"
                                class="block mt-1 w-full" type="text" name="flname" value="سامان سیار" />
                        </div>
                        <div class="relative block">
                            <x-label type="fname" value="نام" />

                            <x-input id="fname" value="{{ old('fname') }}" class="block mt-1 w-full"
                                type="text" name="fname" value="سامان" />
                        </div>
                        <div class="relative block">
                            <x-label type="lname" value="نام خانوادگی" />

                            <x-input id="lname" value="{{ old('lname') }}" class="block mt-1 w-full"
                                type="text" name="lname" value="سیار" />
                        </div>
                        <div class="lg:col-span-2 relative block">
                            <x-label type="phonenumber" value="شماره موبایل" />

                            <x-input x-model="phonenumber" id="phonenumber" class="block mt-1 w-full" type="text"
                                name="phonenumber" value="09016189372" />
                        </div>
                        <div class="relative block">
                            <x-label type="numberP" value="شماره تلفن" />

                            <x-input x-model="numberP" id="numberP" class="block mt-1 w-full" type="text"
                                name="numberP" value="09016189372" />
                        </div>
                        <div class="relative block">
                            <x-label type="phonenumber" value="پیش شماره" />

                            <x-input x-model="prenumber" id="prenumber" class="block mt-1 w-full" type="text"
                                name="prenumber" value="021" />
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
                            <x-label for="land" value="شهر" />
                            <x-input id="land" class="block mt-1 w-full" type="text" name="land"
                                value="{{ old('land') }}" placeholder="پرند" />
                        </div>
                        <div class="relative block">
                            <x-label for="zone" value="محدوده فعالیت خود را وارد کنید" />
                            <select x-model="zone" name="zone" id="zone"
                                class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                                <option>انتخاب محدوده</option>
                                <option value="منطقه ۱۹">منطقه ۱۹</option>
                                <option value="منطقه ۱۹">منطقه ۱۹</option>
                            </select>
                        </div>
                        <div class="relative block">
                            <x-label for="land" value="آدرس فروشگاه" />
                            <x-input id="land" class="block mt-1 w-full" type="text" name="land"
                                value="{{ old('land') }}" placeholder="لاله زار جنوبی پلاک ۷۸" />
                        </div>
                        <div class="relative block col-span-2">
                            <x-label for="selectsemat" value="سمت مورد نظر را وارد کنید" />
                            <div class="flex w-full" dir="ltr">
                                <!-- Define component with preselected options -->
                                <div class="w-full">
                                    <select x-cloak id="select" hidden>
                                        <option value="مدیرعامل">مدیرعامل</option>
                                        <option value="مدیر فروشگاه">مدیر فروشگاه</option>
                                        <option value="معاونت فروش">معاونت فروش</option>
                                        <option value="سرپرست فروش">سرپرست فروش</option>
                                        <option value="کارشناس فروش">کارشناس فروش</option>
                                        <option value="مدیر خدمات پس از فروش">مدیر خدمات پس از فروش</option>
                                        <option value="کارشناس خدمات پس از فروش">کارشناس خدمات پس از فروش</option>
                                        <option value="سایر">سایر</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="relative block lg:col-span-2">
                            <x-label for="desc" value="توضیحات" />
                            <textarea x-model="desc" rows="4" id="desc" name="desc"
                                class="text bg-gray-50 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-5 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600"></textarea>
                        </div>
                        <div class="flex relative lg:col-span-2 mb-6">
                            <div class="flex items-center cursor-pointer">
                                <input id="terms" name="terms" type="checkbox"
                                    class="w-5 h-5 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-600 dark:ring-offset-gray-800">
                            </div>
                            <label for="terms"
                                class="mx-2 text-sm font-medium text-gray-700 dark:text-gray-400">اطلاعات
                                وارد شده برای شخص را قبول میکنم</label>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white  mt-4 bg-indigo-600 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-500 dark:hover:bg-indigo-600 transition duration-150 dark:focus:ring-indigo-700">
                        ثبت درخواست کارت ویزیت
                    </button>
                </form>

            </div>

            <div class="lg:col-span-6 w-full relative rounded-md p-2">
                <x-alert>اطلاعات وارد شده را میتواندید روی کارت مشاهده نمایید.</x-alert>

                <div class="relative w-full bg-gray-50 border border-gray-200 rounded-lg"
                    :class="type === 'برق کار' ? 'grid' : 'hidden'">
                    <div class="w-full divide-x divide-gray-200 flex items-center">
                        <div></div>
                        <div class="w-4/6 p-4">
                            <div class="flex items-center">
                                <div class="w-3 bg-indigo-600 rounded-full h-3"></div>
                                <div class="mx-2 text-gray-700 text-xs">نام نام خانوادگی :</div>
                                <div class="font-medium text-gray-700 text-xs" x-text="flname"></div>
                            </div>
                            <div class="mt-4 relative">
                                <div class="text-gray-700 w-60text-xs leading-6">
                                    <span class="font-medium text-gray-800 text-sm"> توضیحات:</span>
                                    <div x-text="desc"></div>
                                </div>
                            </div>
                            <div class="flex items-center mt-4">
                                <div class="w-3 bg-indigo-600 rounded-full h-3"></div>
                                <div class="mx-2 text-gray-700 text-xs">شماره موبایل :</div>
                                <div class="font-medium text-gray-700 text-xs" x-text="phonenumber"></div>
                            </div>
                            <div class="flex items-center mt-4">
                                <div class="w-3 bg-indigo-600 rounded-full h-3"></div>
                                <div class="mx-2 text-gray-700 text-xs">محدوده فعالیت :</div>
                                <div class="font-medium text-gray-700 text-xs" x-text="zone"></div>
                            </div>
                        </div>
                        <div class="w-2/6 p-2 h-full">
                            <div
                                class="w-full h-14 flex justify-center items-center bg-gray-200 rounded-md animate-pulse">
                                <div class="font-medium text-gray-600 tetx-md">Logo</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative w-full bg-gray-50 border border-gray-200 rounded-lg"
                    :class="type === 'شخصی' ? 'grid' : 'hidden'">
                    <div class="w-full divide-x divide-gray-200 flex items-center">
                        <div></div>
                        <div class="w-4/6 p-4">
                            <div class="flex items-center">
                                <div class="w-3 bg-indigo-600 rounded-full h-3"></div>
                                <div class="mx-2 text-gray-700 text-xs">نام نام خانوادگی :</div>
                                <div class="font-medium text-gray-700 text-xs" x-text="flname"></div>
                            </div>
                            <div class="flex items-center mt-4">
                                <div class="w-3 bg-indigo-600 rounded-full h-3"></div>
                                <div class="flex flex-col">
                                    <div class="mx-2 text-gray-700 text-xs"> سمت :</div>

                                    <div class="text-gray-700 text-xs pr-2">
                                        <template x-for="item in semats">
                                            <small class="text-gray-600 text-[11px]" x-text="item + ' - '">-</small>
                                        </template>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center mt-4">
                                <div class="w-3 bg-indigo-600 rounded-full h-3"></div>
                                <div class="mx-2 text-gray-700 text-xs">تلفن ثابت:</div>
                                <div class="font-medium text-gray-700 text-xs" x-text="numberP"></div>
                            </div>
                            <div class="flex items-center mt-4">
                                <div class="w-3 bg-indigo-600 rounded-full h-3"></div>
                                <div class="mx-2 text-gray-700 text-xs">شماره موبایل :</div>
                                <div class="font-medium text-gray-700 text-xs" x-text="phonenumber"></div>
                            </div>

                            <div class="flex items-center mt-4">
                                <div class="w-3 bg-indigo-600 rounded-full h-3"></div>
                                <div class="mx-2 text-gray-700 text-xs">محدوده فعالیت :</div>
                                <div class="font-medium text-gray-700 text-xs" x-text="zone"></div>
                            </div>
                            <div class="flex items-center mt-4">
                                <div class="w-3 bg-indigo-600 rounded-full h-3"></div>
                                <div class="mx-2 text-gray-700 text-xs">آدرس :</div>
                                <div class="font-medium text-gray-700 text-xs" x-text="address"></div>
                            </div>
                        </div>
                        <div class="w-2/6 p-2 h-full">
                            <div
                                class="w-full h-14 flex justify-center items-center bg-gray-200 rounded-md animate-pulse">
                                <div class="font-medium text-gray-600 tetx-md">Logo</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative w-full bg-gray-50 border border-gray-200 rounded-lg"
                :class="type === 'فروشگاهی' ? 'grid' : 'hidden'">
                <div class="w-full divide-x divide-gray-200 flex items-center">
                    <div></div>
                    <div class="w-4/6 p-4">
                        <div class="flex items-center">
                            <div class="w-3 bg-indigo-600 rounded-full h-3"></div>
                            <div class="mx-2 text-gray-700 text-xs">نام نام خانوادگی :</div>
                            <div class="font-medium text-gray-700 text-xs" x-text="flname"></div>
                        </div>
                        <div class="mt-4 relative">
                            <div class="text-gray-700 w-60text-xs leading-6">
                                <span class="font-medium text-gray-800 text-sm"> توضیحات:</span>
                                <div x-text="desc"></div>
                            </div>
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="w-3 bg-indigo-600 rounded-full h-3"></div>
                            <div class="mx-2 text-gray-700 text-xs">شماره موبایل :</div>
                            <div class="font-medium text-gray-700 text-xs" x-text="phonenumber"></div>
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="w-3 bg-indigo-600 rounded-full h-3"></div>
                            <div class="mx-2 text-gray-700 text-xs">محدوده فعالیت :</div>
                            <div class="font-medium text-gray-700 text-xs" x-text="zone"></div>
                        </div>
                    </div>
                    <div class="w-2/6 p-2 h-full">
                        <div class="w-full h-14 flex justify-center items-center bg-gray-200 rounded-md animate-pulse">
                            <div class="font-medium text-gray-600 tetx-md">Logo</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Validation Errors -->
            <div class="mt-6">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </div>
            @if (session('success'))
                <div class="mt-6">
                    <div class="bg-green-50 p-4 rounded-lg border border-gray-300">
                        <div class="w-28 h-28 rounded-full bg-green-500/20 mx-auto flex justify-center items-center">
                            <img src="{{ asset('images/party-popper.png') }}"
                                class="w-full h-full object-cover p-1" />
                            {{-- <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_jbrw3hcz.json"
                    background="transparent" speed="1" class="w-32"></lottie-player> --}}
                        </div>
                        <div class="text-center mt-6 w-full font-medium text-green-500">درخواست کارت ویزیت با
                            موفقیت
                            ثبت شد
                        </div>
                        <div
                            class="p-4 mt-6 flex text-sm w-full text-center text-green-500 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800 clear-both">
                            <span>
                                درصورت تمایل به درخواست ویزیت لطفا از لیست درخواست ها بر روی
                            </span>
                            <a href="#">
                                <svg class="w-5 h-5 mx-1 text-green-700" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </a>
                            <span>بزنید</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    {{-- @endpush --}}
</x-app-layout>
‍
