<x-app-layout>
    <x-slot name="header"> ایجاد کاربر جدید</x-slot>
    <div x-data="{ handlerMessage: true, citytype: '', typestate: false }">
        {{-- TODO =>  CODEING HERE.... --}}
        <div class="lg:grid grid-cols-12 gap-4 w-full relative">
            <div class="lg:col-span-7 w-full relative rounded-md">

                <form method="post" action="{{ route('admin.users.store') }}"
                    class="lg:col-span-6 w-full relative rounded-md">
                    @csrf
                    <div class="grid w-full grid-cols-2 gap-4 mt-4 transition-all duration-200">
                        <div class="relative block">
                            <x-label for="title" value="عنوان فروشگاه را انتخاب کنید" />
                            <select id="title" name="title" autofocus
                                class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                                <option value="" selected>انتخاب عنوان</option>
                                @foreach ($shopTitle as $title)
                                    <option value="{{ $title->title_shop }}"
                                        {{ old('title') == $title->title_shop ? 'selected' : '' }}>
                                        {{ $title->title_shop }}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-selectbox-access />
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
                        @livewire('manage-city-state')

                        <div class="lg:col-span-2 relative block">
                            <x-label for="address_shop" value="آدرس فروشگاه" />
                            <x-input id="address_shop" class="block mt-1 w-full" type="text" name="address_shop"
                                value="{{ old('address_shop') }}" placeholder="لاله زار جنوبی پلاک ۷۸" />
                        </div>
                        <div class="relative block">
                            <x-label type="fname" value="نام صاحب فروشگاه" />

                            <x-input id="fname" value="{{ old('fname') }}" class="block mt-1 w-full" type="text"
                                name="fname" placeholder="به عنوان مثال: محمد" />
                        </div>
                        <div class="relative block">
                            <x-label type="lname" value="نام خانوادگی صاحب فروشگاه" />

                            <x-input id="lname" value="{{ old('lname') }}" class="block mt-1 w-full" type="text"
                                name="lname" placeholder="به عنوان مثال :‌ملک محمدی" />
                        </div>
                        <div class="col-span-2 relative grid lg:grid-cols-2 gap-3">
                            <div class="relative block" id="numbers">
                                <x-label type="phone" value="شماره موبایل" />

                                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                    value="09016189372" />
                            </div>
                            <div class=" relative block">
                                <div class="relative flex justify-around mt-5 items-center">
                                    <button onclick="AddFeildPhone()" type="button"
                                        class="text-white bg-indigo-600 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-xs  sm:w-auto px-3 w-full py-2 text-center dark:bg-indigo-500 dark:hover:bg-indigo-600 transition duration-150 dark:focus:ring-indigo-700">افزودن
                                        فیلد</button>
                                    <p class="text-xs pr-2 text-gray-00">در صورت داشتن شماره موبایل دوم بر روی افزودن
                                        فیلد
                                        کلیک کنید.
                                        <span class="text-red-500">استفاده از این فیلد تنهای یک با مجاز میباشد</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-2 relative block">
                            <x-label for="startdate" value="تاریخ تولد صاحب فروشگاه" />
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
        <script>
            jalaliDatepicker.startWatch();

            var number = document.getElementById('numbers');
            var numbersPhone = document.getElementById('numbersPhone');

            function AddFeild() {
                var inputLength = numbersPhone.getElementsByTagName('input');
                console.log(inputLength.length);
                if (inputLength.length === 0) {
                    // Create input phone
                    var newField = document.createElement('input');
                    newField.setAttribute('type', 'text');
                    newField.setAttribute('name', 'numbersPhone');
                    newField.setAttribute('class',
                        `mt-3 bg-gray-50 border col-span-8 border-gray-200 text-gray-700 text-sm rounded-lg disabled:bg-gray-200 focus:ring-0 focus:border-indigo-300 focus:outline-none block w-full px-4 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-0 dark:focus:border-indigo-500`
                    );
                    newField.setAttribute('id', 'survey_numbersPhone');
                    newField.setAttribute('placeholder', 'شماره موبایل دوم را وارد کنید');

                    // Create input prenumber
                    var prenumber = document.createElement('input');
                    prenumber.setAttribute('type', 'text');
                    prenumber.setAttribute('name', 'prenumber2');
                    prenumber.setAttribute('value', '021');
                    prenumber.setAttribute('class',
                        `mt-3 bg-gray-50 col-span-4 border border-gray-200 text-gray-700 text-sm rounded-lg disabled:bg-gray-200 focus:ring-0 focus:border-indigo-300 focus:outline-none block w-full px-4 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-0 dark:focus:border-indigo-500`
                    );
                    prenumber.setAttribute('id', 'survey_prenumber');
                    prenumber.setAttribute('placeholder', 'پیش شماره را وارد کنید');

                    numbersPhone.appendChild(newField);
                    numbersPhone.appendChild(prenumber);
                } else {
                    alert('شما فقط میتوانید یک فیلد شماره موبایل ایجاد کنید');
                }
            }

            function AddFeildPhone() {
                var inputLength = number.getElementsByTagName('input');
                if (inputLength.length === 1) {
                    var newField = document.createElement('input');
                    newField.setAttribute('type', 'test');
                    newField.setAttribute('name', 'number1');
                    newField.setAttribute('class',
                        `mt-3 bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg disabled:bg-gray-200 focus:ring-0 focus:border-indigo-300 focus:outline-none block w-full px-4 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-0 dark:focus:border-indigo-500`
                    );
                    newField.setAttribute('id', 'survey_options');
                    newField.setAttribute('siz', 50);
                    newField.setAttribute('placeholder', 'شماره تلفن دوم را وارد کنید');
                    number.appendChild(newField);
                } else {
                    alert('شما فقط میتوانید یک فیلد شماره تلفن ایجاد کنید');
                }
            }
        </script>
</x-app-layout>
