<div class="grid col-span-2 grid-cols-2 gap-4 mt-4 transition-all duration-200 w-full">

    <div class="relative block">
        <x-label for="city" value="استان را انتخاب کنید" />
        <select id="city" name="city" wire:model="typestate" @change="typestate = true" wire:change="HandlerState"
        class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
        <option value="">انتخاب استان</option>
        @foreach ($state as $item)
        <option selected value="{{ $item->city.'-'.$item->prenumber }}">{{ $item->city }}</option>
        @endforeach
    </select>
    <div class="opacity-0">
        {{ $typestate }}
    </div>
</div>
<div class="relative block">
    @if (count($Cityies) > 0)
    <x-label for="city" value="شهر را انتخاب کنید" />

        <select id="city" name="city" :disabled="!typestate"
        class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
        <option selected  value="">انتخاب شهر</option>
        @foreach ($Cityies as $item)
        <option value="{{ $item->city }}">{{ $item->city }}</option>
        @endforeach
    </select>
    @endif
    {{-- {{ dd($showSelectboxCities) }} --}}
</div>
{{-- {{ $Cityies }} --}}
<div class="col-span-2 relative grid lg:grid-cols-2 gap-3">
    <div class="relative block">
        <div class="relative flex justify-start space-x-3 items-center">
            <div></div>
            <div class=" relative block w-4/6">
                <x-label type="phone" value="شماره تلفن" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phonenumber"
                value="09016189372" />
            </div>

            <div class="relative block w-2/6">
                <x-label type="prephone" value="پیش شماره" />

                <x-input id="prephone" wire:model="prephone1" class="block mt-1 w-full" type="text" name="prephone" value="021" />
            </div>
        </div>
        <div id="numbersPhone" class="grid grid-cols-12 gap-3"></div>
    </div>
    <div class="relative flex justify-around mt-5 items-center">
        <button onclick="AddFeild()" type="button"
        class="text-white bg-indigo-600 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-xs  sm:w-auto px-3 w-full py-2 text-center dark:bg-indigo-500 dark:hover:bg-indigo-600 transition duration-150 dark:focus:ring-indigo-700">افزودن
        فیلد</button>
        <p class="text-xs pr-2 text-gray-00">در صورت داشتن شماره تلفن دوم بر روی افزودن فیلد
            کلیک کنید.
            <span class="text-red-500">استفاده از این فیلد تنهای یک با مجاز میباشد</span>
        </p>
    </div>
</div>

<script>
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
            prenumber.setAttribute('name', 'prephone1');
            prenumber.setAttribute('value', '{{ $prephone1 }}');
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
</script>

</div>
