<x-app-layout>
    <x-slot name="header">ویرایش فرم
        {{ $data->title_shop }}
    </x-slot>
    {{-- {{ dd() }} --}}
    <div x-data="{ handlerMessage: true, show_in_cardvisit: '', modalAddfeild: false, feild: [] }">
        {{-- TODO =>  CODEING HERE.... --}}
        <div class="lg:grid grid-cols-12 gap-4 w-full relative">
            <div class="lg:col-span-7 w-full relative rounded-md">

                <form method="post" action="{{ route('admin.form.update',$data) }}"
                    class="lg:col-span-6 w-full relative rounded-md">
                    @csrf
                    @method('patch')
                    <div class="grid w-full grid-cols-2 gap-4 mt-4 transition-all duration-200">
                        <x-selectbox-title :data="$data->title_shop" />
                        <x-selectbox-access :data="$data->access" />
                        <div class="relative block">
                            <x-label for="show_in_shop" value="نمایش در ویرایش فروشگاه" />
                            <select id="show_in_shop" name="show_in_shop"
                                class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                                <option value="بله" @if ($data->shop_in_shop == 'بله') selected @endif>بله</option>
                                <option value="خیر" @if ($data->shop_in_shop == 'خیر') selected @endif>خیر</option>
                            </select>
                        </div>
                        <div class="relative block">
                            <x-label for="show_in_cardvisit" value="نمایش در کارت ویزیت" />
                            <select id="show_in_cardvisit" x-model="show_in_cardvisit" name="show_in_cardvisit"
                                class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
                                <option value="خیر" @if ($data->show_in_cardvisit == 'خیر') selected @endif>خیر</option>
                                <option value="بله" @if ($data->show_in_cardvisit == 'بله') selected @endif>بله</option>
                            </select>
                        </div>

                        <div class="relative block" x-show="show_in_cardvisit === 'بله'" x-transition>
                            <x-label for="startdate" value="تاریخ شروع را وارد کنید" />
                            <x-input id="startdate" data-jdp class="block mt-1 w-full" type="text" name="startdate"
                                readonly value="{{ old('startdate', $data->startdate) }}" />
                        </div>
                        <div class="relative block" x-show="show_in_cardvisit === 'بله'" x-transition>
                            <x-label for="endstart" value="تاریخ پایان را وارد کنید" />
                            <x-input id="endstart" data-jdp class="block mt-1 w-full" type="text" name="endstart"
                                readonly value="{{ old('endstart', $data->endstart) }}" />
                        </div>


                    </div>
                    <div x-show="modalAddfeild" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
                        role="dialog" aria-modal="true">
                        <div
                            class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                            <div x-cloak @click="modalAddfeild = false" x-show="modalAddfeild"
                                x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-200 transform"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                class="fixed inset-0 transition-opacity bg-gray-800/40 backdrop-blur-sm"
                                aria-hidden="true"></div>

                            <div x-cloak x-show="modalAddfeild"
                                x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave="transition ease-in duration-200 transform"
                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                class="inline-block p-8 my-20 overflow-hidden text-right transition-all transform bg-white rounded-lg shadow-xl w-full lg:w-3/6">
                                <div class="flex items-center justify-between space-x-4">
                                    <h1 class="text-xl font-medium text-gray-800 ">فیلد مورد نظر را وارد کنید</h1>

                                    <button @click.prevent="modalAddfeild = false"
                                        class="text-gray-600 focus:outline-none hover:text-gray-700">
                                        <svg class="w-7 h-7 text-gray-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>

                                <p class="mt-2 text-sm text-right text-gray-500 ">
                                    برای افزودن یک فیلد رویه ان کلیک کنید :)
                                </p>

                                <div class="mt-5">

                                    <ul class="grid gap-3 w-full grid-cols-5">
                                        <li>
                                            <input type="checkbox"  name="feild[]" @if(in_array('website',$data->feild)) checked @endif id="website"
                                                value="website" class="hidden peer">
                                            <label for="website"
                                                class="inline-flex justify-center items-center p-4 w-full text-gray-600 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-2 peer-checked:border-indigo-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="flex-col flex justify-center items-center">
                                                    <svg class="w-6 h-6 mb-3" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                        </path>
                                                    </svg>
                                                    <div class="w-full text-sm font-medium font-sans">Website</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox"  name="feild[]" @if(in_array('address',$data->feild)) checked @endif id="address"
                                                value="address" class="hidden peer">
                                            <label for="address"
                                                class="inline-flex justify-center items-center p-4 w-full text-gray-600 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-2 peer-checked:border-indigo-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="flex-col flex justify-center items-center">
                                                    <svg class="w-6 h-6 mb-3" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                        </path>
                                                    </svg>
                                                    <div class="w-full text-sm font-medium">Address</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox"  name="feild[]" @if(in_array('phone',$data->feild)) checked @endif id="phone"
                                                value="phone" class="hidden peer">
                                            <label for="phone"
                                                class="inline-flex justify-center items-center p-4 w-full text-gray-600 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-2 peer-checked:border-indigo-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="flex-col flex justify-center items-center">
                                                    <svg class="w-6 h-6 mb-3" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                        </path>
                                                    </svg>
                                                    <div class="w-full text-sm font-medium">Phone</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox"  name="feild[]" @if(in_array('email',$data->feild)) checked @endif id="email"
                                                value="email" class="hidden peer">
                                            <label for="email"
                                                class="inline-flex justify-center items-center p-4 w-full text-gray-600 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-2 peer-checked:border-indigo-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="flex-col flex justify-center items-center">
                                                    <svg class="w-6 h-6 mb-3" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                                        </path>
                                                    </svg>
                                                    <div class="w-full text-sm font-medium">Email</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox"  name="feild[]" @if(in_array('name',$data->feild)) checked @endif id="name"
                                                value="name" class="hidden peer">
                                            <label for="name"
                                                class="inline-flex justify-center items-center p-4 w-full text-gray-600 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-2 peer-checked:border-indigo-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="flex-col flex justify-center items-center">
                                                    <svg class="w-6 h-6 mb-3" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                        </path>
                                                    </svg>
                                                    <div class="w-full text-sm font-medium">Name</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox"  name="feild[]" @if(in_array('checkbox',$data->feild)) checked @endif id="checkbox"
                                                value="checkbox" class="hidden peer">
                                            <label for="checkbox"
                                                class="inline-flex justify-center items-center p-4 w-full text-gray-600 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-2 peer-checked:border-indigo-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="flex-col flex justify-center items-center">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                                        </path>
                                                    </svg>
                                                    <div class="w-full text-sm mt-3 font-medium">Checkbox</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox"  name="feild[]" @if(in_array('radio',$data->feild)) checked @endif id="radio"
                                                value="radio" class="hidden peer">
                                            <label for="radio"
                                                class="inline-flex justify-center items-center p-4 w-full text-gray-600 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-2 peer-checked:border-indigo-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="flex-col flex justify-center items-center">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <div class="w-full text-sm mt-3 font-medium">Radio</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox"  name="feild[]" @if(in_array('number',$data->feild)) checked @endif id="number"
                                                value="number" class="hidden peer">
                                            <label for="number"
                                                class="inline-flex justify-center items-center p-4 w-full text-gray-600 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-2 peer-checked:border-indigo-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="flex-col flex justify-center items-center">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                    <div class="w-full text-sm mt-3 font-medium">Number</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox"  name="feild[]" @if(in_array('textarea',$data->feild)) checked @endif id="textarea"
                                                value="textarea" class="hidden peer">
                                            <label for="textarea"
                                                class="inline-flex justify-center items-center p-4 w-full text-gray-600 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-2 peer-checked:border-indigo-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="flex-col flex justify-center items-center">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                                        </path>
                                                    </svg>
                                                    <div class="mt-3 w-full text-sm font-medium">Textarea</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox"  name="feild[]" @if(in_array('input',$data->feild)) checked @endif id="input"
                                                value="input" class="hidden peer">
                                            <label for="input"
                                                class="inline-flex justify-center items-center p-4 w-full text-gray-600 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-2 peer-checked:border-indigo-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="flex-col flex justify-center items-center">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2">
                                                        </path>
                                                    </svg>
                                                    <div class="mt-3 w-full text-sm font-medium">Input</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox"  name="feild[]" @if(in_array('fileupload',$data->feild)) checked @endif id="fileupload"
                                                value="fileupload" class="hidden peer">
                                            <label for="fileupload"
                                                class="inline-flex justify-center items-center p-4 w-full text-gray-600 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-2 peer-checked:border-indigo-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="flex-col flex justify-center items-center">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                        </path>
                                                    </svg>
                                                    <div class="mt-3 w-full text-sm font-medium">File Upload</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox"  name="feild[]" @if(in_array('timepicker',$data->feild)) checked @endif id="timepicker"
                                                value="timepicker" class="hidden peer">
                                            <label for="timepicker"
                                                class="inline-flex justify-center items-center p-4 w-full text-gray-600 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-2 peer-checked:border-indigo-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="flex-col flex justify-center items-center">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <div class="mt-3 w-full text-sm font-medium">Time Picker</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox"  name="feild[]" @if(in_array('datepicket',$data->feild)) checked @endif id="datepicket"
                                                value="datepicket" class="hidden peer">
                                            <label for="datepicket"
                                                class="inline-flex justify-center items-center p-4 w-full text-gray-600 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-2 peer-checked:border-indigo-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="flex-col flex justify-center items-center">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                    <div class="mt-3 w-full text-sm font-medium">Date Picker</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox"  name="feild[]" @if(in_array('selectbox',$data->feild)) checked @endif id="selectbox"
                                                value="selectbox" class="hidden peer">
                                            <label for="selectbox"
                                                class="inline-flex justify-center items-center p-4 w-full text-gray-600 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-2 peer-checked:border-indigo-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="flex-col flex justify-center items-center">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                                    </svg>
                                                    <div class="mt-3 w-full text-sm font-medium">Select Box</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox"  name="feild[]" @if(in_array('hideenfeild',$data->feild)) checked @endif id="hideenfeild"
                                                value="hideenfeild" class="hidden peer">
                                            <label for="hideenfeild"
                                                class="inline-flex justify-center items-center p-4 w-full text-gray-600 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-2 peer-checked:border-indigo-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="flex-col flex justify-center items-center">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                                        </path>
                                                    </svg>
                                                    <div class="mt-3 w-full text-sm font-medium">Hideen Feild</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox"  name="feild[]" @if(in_array('pagebreak',$data->feild)) checked @endif id="pagebreak"
                                                value="pagebreak" class="hidden peer">
                                            <label for="pagebreak"
                                                class="inline-flex justify-center items-center p-4 w-full text-gray-600 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-2 peer-checked:border-indigo-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="flex-col flex justify-center items-center">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                                        </path>
                                                    </svg>
                                                    <div class="mt-3 w-full text-sm font-medium">Page Break</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox"  name="feild[]" @if(in_array('html',$data->feild)) checked @endif id="html"
                                                value="html" class="hidden peer">
                                            <label for="html"
                                                class="inline-flex justify-center items-center p-4 w-full text-gray-600 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-2 peer-checked:border-indigo-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="flex-col flex justify-center items-center">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                                    </svg>
                                                    <div class="mt-3 w-full text-sm font-medium">HTML</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox"  name="feild[]" @if(in_array('captcha',$data->feild)) checked @endif id="captcha"
                                                value="captcha" class="hidden peer">
                                            <label for="captcha"
                                                class="inline-flex justify-center items-center p-4 w-full text-gray-600 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-2 peer-checked:border-indigo-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="flex-col flex justify-center items-center">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
                                                        </path>
                                                    </svg>
                                                    <div class="mt-3 w-full text-sm font-medium">Captcha</div>
                                                </div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox"  name="feild[]" @if(in_array('postdata',$data->feild)) checked @endif id="postdata"
                                                value="postdata" class="hidden peer">
                                            <label for="postdata"
                                                class="inline-flex justify-center items-center p-4 w-full text-gray-600 bg-white rounded-lg border-2 border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-2 peer-checked:border-indigo-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="flex-col flex justify-center items-center">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                                        </path>
                                                    </svg>
                                                    <div class="mt-3 w-full text-sm font-medium">Post Data</div>
                                                </div>
                                            </label>
                                        </li>

                                    </ul>



                                    <div class="flex justify-end mt-6">
                                        <button type="button" @click.prevent="modalAddfeild = ! modalAddfeild"
                                            class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                                            ثبت فیلد های انتخابی
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" @click.prevent="modalAddfeild =!modalAddfeild"
                        class="text-gray-900  mt-4 bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-400 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-500 dark:hover:bg-yellow-600 transition duration-150 dark:focus:ring-indigo-700">
                        اضافه کردن فیلد جدید
                    </button>

                    <button type="submit"
                        class="text-white mr-2  mt-4 bg-indigo-500 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-400 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-500 dark:hover:bg-indigo-600 transition duration-150 dark:focus:ring-indigo-700">
                        ثبت نهایی فرم
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
                                فرم جدید با موفقیت اضافه شد
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </div>

        <script>
            jalaliDatepicker.startWatch();
        </script>
</x-app-layout>
