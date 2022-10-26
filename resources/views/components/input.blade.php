@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg disabled:bg-gray-200 focus:ring-0 focus:border-indigo-300 focus:outline-none block w-full px-4 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-0 dark:focus:border-indigo-500']) !!}>
