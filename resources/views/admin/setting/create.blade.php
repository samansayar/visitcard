<x-app-layout>

    <x-slot name="header">ایجاد شهر جدید</x-slot>
    <div x-data="{ dataCity: [], handlerMessage: true }" x-init="dataCity = await (await fetch('https://iran-locations-api.vercel.app/api/v1/states')).json()">
        {{-- TODO =>  CODEING HERE.... --}}
        <div class="lg:grid grid-cols-12 gap-4 w-full relative">
            <div class="lg:col-span-7 w-full relative rounded-md">

                <form method="post" action="{{ route('admin.setting.store') }}" enctype="multipart/form-data"
                    class="lg:col-span-6 w-full relative rounded-md">
                    @csrf
                    <div class="grid w-full grid-cols-2 gap-4 mt-4 transition-all duration-200">
                        <div class="col-span-2 relative block">
                            <x-label for="title" value="عنوان سایت را وارد کنید" />
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title"
                                value="{{ $data->title }}" />
                        </div>
                        <div class="col-span-2 relative block" dir="ltr">
                            <x-label for="dropzone-file" value="تغییر لوگو" />

                            <div class="flex justify-center items-center w-full">
                                <label for="dropzone-file"
                                    class="flex flex-col justify-center items-center w-full h-40 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                        <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                            کلیک کنید و یک لوگو برای سایت انتخاب کنی</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG</p>
                                    </div>
                                    <input id="dropzone-file" type="file" name="logo" class="hidden">
                                </label>
                            </div>

                        </div>

                        <div class="relative block lg:col-span-2">
                            <x-label for="desc" value="توضیحات" />
                            <textarea rows="8" id="desc" name="desc"
                                class="text bg-gray-50 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-5 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">{!! $data->desc !!}</textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white  mt-4 bg-indigo-600 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-500 dark:hover:bg-indigo-600 transition duration-150 dark:focus:ring-indigo-700">
                        ذخیره تنظیمات
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
                                تنظیمات جدید با موفقیت اضافه شد
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <script>
            ClassicEditor
                .create(document.querySelector('#desc'))
                .catch(error => {
                    console.error(error);
                });
        </script>
</x-app-layout>
