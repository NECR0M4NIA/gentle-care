@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'transition border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-[#FF8D28] dark:focus:border-[#4B83F5] focus:ring-[#FF8D28] dark:focus:ring-[#4B83F5] rounded-md shadow-sm']) }}>
