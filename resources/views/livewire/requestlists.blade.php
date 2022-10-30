<div>
    <div class=" mx-auto py-4" x-data="datatables()" x-cloak>
        <div x-show="selectedRows.length" class="bg-teal-200 fixed top-0 left-0 right-0 z-40 w-full shadow">
            <div class="container mx-auto px-4 py-4">
                <div class="flex md:items-center">
                    <div class="mr-4 flex-shrink-0">
                        <svg class="h-8 w-8 text-teal-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div x-html="selectedRows.length + ' rows are selected'" class="text-teal-800 text-lg"></div>
                </div>
            </div>
        </div>
        <div class="mb-6">


            @if (session('toggle'))
                <div class="mb-8 w-3/6 mx-auto relative" x-show="handlerMessage" x-collapse.duration.800ms>
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
                            {{ session('toggle') }}
                        </div>
                    </div>
                </div>
            @endif
            @if (session('togglefalse'))
                <div class="mb-8 w-3/6 mx-auto relative" x-show="handlerMessage" x-collapse.duration.800ms>
                    <button @click="handlerMessage = ! handlerMessage"
                        class="w-10 h-10 flex justify-center items-center top-4 right-4 rounded-full absolute">
                        <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    <div class="bg-pink-100 p-4 rounded-lg border border-gray-300">
                        <div class="w-24 h-24 rounded-full bg-red-500/20 mx-auto flex justify-center items-center">
                            <img src="{{ asset('images/sad.png') }}" class="w-full h-full object-cover p-1.5" />
                            {{-- <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_jbrw3hcz.json"
            background="transparent" speed="1" class="w-32"></lottie-player> --}}
                        </div>
                        <div class="text-center mt-6 text-sm w-full font-medium text-red-500">
                            {{ session('togglefalse') }}
                        </div>
                    </div>
                </div>
            @endif
            @if (session('success'))
                <div class="mb-8 w-3/6 mx-auto relative" x-show="handlerMessage" x-collapse.duration.800ms>
                    <button @click="handlerMessage = ! handlerMessage"
                        class="w-10 h-10 flex justify-center items-center top-4 right-4 rounded-full absolute">
                        <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                    <div class="bg-pink-100 p-3 rounded-lg border border-red-200">
                        <div class="w-20 h-20 rounded-full bg-red-500/20 mx-auto flex justify-center items-center">
                            <img src="{{ asset('images/sad.png') }}" class="w-full h-full object-cover p-1.5" />
                            {{-- <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_jbrw3hcz.json"
         background="transparent" speed="1" class="w-32"></lottie-player> --}}
                        </div>
                        <div class="text-center mt-4 text-sm w-full font-medium text-red-500">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="flex mb-4 space-x-2 items-center">
            <div></div>
            <div class="relative w-52">
                <div class="inline-flex items-center max-w-full">
                    <button
                        class="flex items-center flex-grow-0 flex-shrink pl-2 relative border border-gray-300 rounded-xl px-1"
                        type="button">
                        <div class="w-full px-2">
                            <input type="search" name="search" id="search" placeholder="جستجو کنید...."
                                class="w-full rounded-md border-none focus:ring-0 focus:shadow-none bg-white py-2 focus:outline-none px-5 text-sm text-gray-700 placeholder:text-gray-400 outline-none" />
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
            <div class="relative block">
                <select id="city" name="city" x-model="citytype"
                    class="bg-gray-50 px-6 !appearance-none border border-gray-300 text-xs rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full py-3 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                    <option>نماینده را انتخاب کنید</option>
                </select>
            </div>
            <div class="relative block">
                <select id="city" name="city" x-model="citytype"
                    class="bg-gray-50 px-6 !appearance-none border border-gray-300 text-xs rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full py-3 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                    <option>وضعیت را انتخاب کنید</option>
                    <option>در انتظار تایید نماینده</option>
                    <option>در انتظار تایید اطلاعات</option>
                    <option>درحال طراحی</option>
                    <option>درحال چاپ</option>
                    <option>ارسال شد</option>
                </select>
            </div>
            <div class="relative block">
                <select id="city" name="city" x-model="citytype"
                    class="bg-gray-50 px-6 !appearance-none border border-gray-300 text-xs rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full py-3 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                    <option>عنوان کارت را انتخاب کنید</option>
                    <option>برقکار</option>
                    <option>شخصی</option>
                    <option>فروشگاهی</option>
                </select>
            </div>
            <div class="relative black">
                <button class="px-4 py-3 bg-yellow-300 rounded-lg text-xs h-[44px]">چاپ اطلاعات</button>
            </div>
            <div class="relative black">
                <button class="px-4 py-3 bg-yellow-300 rounded-lg text-xs h-[44px]">ایجاد درخواست</button>
            </div>
            <div class="relative block w-24">
                <select id="city" name="city" x-model="citytype"
                    class="bg-gray-50 px-6 !appearance-none border border-gray-300 text-xs rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full py-3 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                    <option>نمایش</option>
                    <option>۱۰</option>
                    <option>۲۰</option>
                    <option>۳۰</option>
                </select>
            </div>
        </div>

        <div class="w-full overflow-x-auto bg-white rounded-lg overflow-y-auto relative" style="height: 360px;">
            {{-- @if (count($data) > 0) --}}
            <table class="border-collapse table-auto w-full whitespace-nowrap bg-white table-striped relative">
                <thead>
                    <tr class="text-left">
                        <template x-for="heading in headings">
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-200 px-3 py-3 text-center text-gray-600 font-medium uppercase text-xs"
                                x-text="heading.value" :x-ref="heading.key"
                                :class="{
                                    [heading.key]: true
                                }">
                            </th>
                        </template>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($data as $item) --}}
                    <tr>
                        <td class="border-dashed border-t border-gray-200 text-center">
                            <span class="text-gray-700 justify-center px-1 py-3 flex items-center text-sm">1356</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200 text-center">
                            <span class="text-gray-700 justify-center px-1 py-3 flex items-center text-xs">سامان
                                سیار</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200 text-center">
                            <span
                                class="text-gray-700 justify-center px-1 py-3 flex items-center text-xs">۱۴۰۱/۰۵/۲</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200 text-center">
                            <span class="text-gray-700 justify-center px-1 py-3 flex items-center text-xs">محمد امین
                                سیار</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200 text-center">
                            <span
                                class="text-gray-700 justify-center px-1 py-3 flex items-center text-xs">برقکار</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200 text-center">
                            <span class="text-gray-700 justify-center px-1 py-3 flex items-center text-xs">مازندران -
                                نوشهر</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200 text-center">
                            <span
                                class="text-gray-700 justify-center px-1 py-3 flex items-center text-xs">۱۴۰۱/۷/۱۵</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200 text-center">
                            <div class="relative block">
                                <select id="city" name="city" x-model="citytype"
                                    class="bg-gray-50 px-6 border border-gray-300 text-xs rounded-lg text-gray-600 focus:ring-indigo-500
                                     focus:border-indigo-500 focus:outeline-none  block w-full py-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                                    <option>انتخاب کنید</option>
                                    <option>تایید مدیر</option>
                                    <option>تایید کارشناس</option>
                                    <option>ارسال برای طراحی</option>
                                </select>
                            </div>
                        </td>
                        <td class="border-dashed border-t border-gray-200 text-center">
                            <div class="relative block">
                                <select id="city" name="city" x-model="citytype"
                                    class="bg-gray-50 px-6 border border-gray-300 text-xs rounded-lg text-gray-600 focus:ring-indigo-500
                                     focus:border-indigo-500 focus:outeline-none  block w-full py-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                                    <option>انتخاب کنید</option>
                                    <option>درحال چاپ</option>
                                    <option>درحال طراحی</option>
                                    <option>ارسال شد</option>
                                </select>
                            </div>
                        </td>
                        <td class="border-dashed border-t border-gray-200 text-center">
                            <div class="relative block">
                                <select id="city" name="city" x-model="citytype"
                                    class="bg-gray-50 px-6 border border-gray-300 text-xs rounded-lg text-gray-600 focus:ring-indigo-500
                                     focus:border-indigo-500 focus:outeline-none  block w-full py-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                                    <option>انتخاب کنید</option>
                                    <option>دریافت به صورت jpg</option>
                                    <option>دریافت به صورت pdf</option>
                                </select>
                            </div>
                        </td>
                        <td class="border-dashed border-t border-gray-200 text-center flex justify-center items-center">
                            <button class="relative p-0.5 mt-2 bg-yellow-300 rounded-full w-6 h-6 flex justify-center items-center">
                                <svg class="w-5 text-gray-600 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
                            </button>
                        </td>
                    </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
            {{-- @else
                <p class="my-10 text-gray-500 text-center w-full tetx-sm">چیزی یافت نشد</p>
            @endif --}}
        </div>
    </div>

    <script>
        function datatables() {
            return {
                handlerMessage: true,
                headings: [{
                        'key': 'userId',
                        'value': 'کد سفارش'
                    },
                    {
                        'key': 'firstName',
                        'value': 'ایجاد کننده درخواست'
                    },
                    {
                        'key': 'تاریخ ثبت کاربر',
                        'value': 'تاریخ ثبت کاربر'
                    },
                    {
                        'key': 'نام نام خانوادگی',
                        'value': 'نام نام خانوادگی'
                    },
                    {
                        'key': 'عنوان کارت',
                        'value': 'عنوان کارت'
                    },
                    {
                        'key': 'استان / شهر',
                        'value': 'استان / شهر'
                    },
                    {
                        'key': 'تاریخ درخواست',
                        'value': 'تاریخ درخواست'
                    },
                    {
                        'key': 'تایید اطلاعات',
                        'value': 'تایید اطلاعات'
                    },
                    {
                        'key': 'تغییر وضعیت',
                        'value': 'تغییر وضعیت'
                    },
                    {
                        'key': 'خروجی کارت',
                        'value': 'خروجی کارت'
                    },
                    {
                        'key': 'تنظیمات',
                        'value': 'تنظیمات'
                    }
                ],
                users: '',
                selectedRows: [],

                open: false,

                toggleColumn(key) {
                    // Note: All td must have the same class name as the headings key!
                    let columns = document.querySelectorAll('.' + key);

                    if (this.$refs[key].classList.contains('hidden') && this.$refs[key].classList.contains(key)) {
                        columns.forEach(column => {
                            column.classList.remove('hidden');
                        });
                    } else {
                        columns.forEach(column => {
                            column.classList.add('hidden');
                        });
                    }
                },

                getRowDetail($event, id) {
                    let rows = this.selectedRows;

                    if (rows.includes(id)) {
                        let index = rows.indexOf(id);
                        rows.splice(index, 1);
                    } else {
                        rows.push(id);
                    }
                },

                selectAllCheckbox($event) {
                    let columns = document.querySelectorAll('.rowCheckbox');

                    this.selectedRows = [];

                    if ($event.target.checked == true) {
                        columns.forEach(column => {
                            column.checked = true
                            this.selectedRows.push(parseInt(column.name))
                        });
                    } else {
                        columns.forEach(column => {
                            column.checked = false
                        });
                        this.selectedRows = [];
                    }
                }
            }
        }
    </script>
</div>
