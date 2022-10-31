@props(['data' => null])

<div class="relative block">
    <x-label for="accessbiliy" value="سطح دسترسی را انتخاب کنید" />
    <select id="accessbiliy" name="accessbiliy" autofocus
        class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
        {{-- @if ($data)
            <option value="{{ $data }}" selected>{{ $data }}</option>
        @else --}}
            <option>انتخاب سطح دسترسی</option>
        {{-- @endif --}}
        @foreach (App\Models\accessbility::query()->get() as $title)
            <option value="{{ $title->accessbiliy }}" {{ old('accessbiliy',$data) == $title->accessbiliy ? 'selected' : '' }}>
                {{ $title->accessbiliy }}</option>
        @endforeach
    </select>
</div>
