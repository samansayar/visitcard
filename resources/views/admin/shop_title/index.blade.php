<x-app-layout>
    <x-slot name="header">لیست عنوان ها</x-slot>
    <div class="container mx-auto py-4" x-data="datatables()" x-cloak>
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
        <div class="flex justify-between mb-4 items-center">
            <div class="relative w-2/3">
                <div class="inline-flex items-center max-w-full">
                    <button
                        class="flex items-center flex-grow-0 flex-shrink pl-2 relative border border-gray-300 rounded-xl px-1"
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
            <a href="{{ route('admin.shop-titles.create') }}"
                class="text-white bg-indigo-600 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-3 text-center dark:bg-indigo-500 dark:hover:bg-indigo-600 transition duration-150 dark:focus:ring-indigo-700">
                ایجاد عنوان جدید
            </a>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg overflow-y-auto relative" style="height: 360px;">
            @if (count($data) > 0)
                <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                    <thead>
                        <tr class="text-left">
                            <template x-for="heading in headings">
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-200 px-6 py-3 text-center text-gray-600 font-medium uppercase text-xs"
                                    x-text="heading.value" :x-ref="heading.key"
                                    :class="{
                                        [heading.key]: true
                                    }">
                                </th>
                            </template>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="border-dashed border-t border-gray-200 text-center">
                                    <span
                                        class="text-gray-700 justify-center px-2 py-3 flex items-center text-sm">{{ $item->id }}</span>
                                </td>
                                <td class="border-dashed border-t border-gray-200 text-center">
                                    <span
                                        class="text-gray-700 justify-center px-6 py-3 flex items-center text-sm">{{ $item->title_shop }}</span>
                                </td>
                                <td class="border-dashed border-t border-gray-200 text-center">
                                    <span
                                        class="text-gray-700 justify-center px-6 py-3 flex items-center text-sm">{{ $item->sort }}</span>
                                </td>

                                <td class="border-dashed border-t border-gray-200 text-center">
                                    <span
                                        class="text-gray-700 justify-center px-6 py-3 flex items-center text-sm">{{ $item->desc }}</span>
                                </td>
                                <td
                                    class="border-dashed border-t border-gray-200 flex justify-center pt-1 items-end text-center">
                                    {{-- Delete --}}
                                    <form method="POST" action="{{ route('admin.shop-titles.destroy', $item) }}">
                                        @csrf
                                        @method('delete')
                                        <button title="حذف"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="p-1 w-7 flex justify-center items-center h-7 rounded-full bg-red-300/60 hover:scale-110 hover:bg-red-200 transition duration-150 text-red-600">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>

                                </td>
                                <td class="border-dashed border-t border-gray-200 text-center">
                                    <div class="w-full flex justify-around items-center">
                                        {{-- Verify / Reject --}}
                                        <form method="POST" action="{{ route('member.update', $item) }}"
                                            class="flex items-center">
                                            @csrf
                                            @method('patch')
                                            <button onclick="event.preventDefault(); this.closest('form').submit();"
                                                title="فعال سازی / غیر فعال سازی"
                                                class="p-0.5 w-8 flex justify-center items-center h-8 rounded-full hover:scale-110 hover:bg-indigo-200  transition duration-150 text-indigo-600">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                                    </path>
                                                </svg>
                                            </button>
                                            <p class="pr-1 text-xs text-indigo-500">
                                                {{ $item->status ? 'فعال' : 'غیر فعال' }}</p>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="my-10 text-gray-500 text-center w-full tetx-sm">چیزی یافت نشد</p>
            @endif
        </div>
    </div>

    <script>
        function datatables() {
            return {
                handlerMessage: true,
                headings: [{
                        'key': 'userId',
                        'value': 'ردیف'
                    },
                    {
                        'key': 'نام عنوان',
                        'value': 'نام عنوان'
                    },
                    {
                        'key': 'ترتیب نمایش',
                        'value': 'ترتیب نمایش'
                    },
                    {
                        'key': 'توضیحات',
                        'value': 'توضیحات'
                    },
                    {
                        'key': 'حذف',
                        'value': 'حذف'
                    },
                    {
                        'key': 'عملیات',
                        'value': 'عملیات'
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
</x-app-layout>
