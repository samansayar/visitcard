{{-- ShopTitle::query()->get() --}}
@props(['data' => null])
<div class="relative block">
    <x-label for="title" value="عنوان فروشگاه را انتخاب کنید" />
    <select id="title" name="title" autofocus
        class="bg-gray-50 px-10 !appearance-none border border-gray-300 text-sm rounded-lg text-gray-600 focus:ring-indigo-500 focus:border-indigo-500 focus:outeline-none  block w-full p-2 dark:bg-gray-700 dark-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 focus:outline-none dark:focus:border-indigo-500 disabled:bg-gray-200 disabled:text-gray-600">
        @if ($data)
            <option value="{{ $data }}" selected>{{ $data }}</option>
        @else
            <option selected>انتخاب کنید</option>
        @endif
        @foreach (App\Models\ShopTitle::query()->get() as $title)
            <option value="{{ $title->title_shop }}" {{ old('title') == $title->title_shop ? 'selected' : '' }}>
                {{ $title->title_shop }}</option>
        @endforeach
    </select>
</div>
