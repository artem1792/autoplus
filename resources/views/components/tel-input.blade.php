@props(['disabled' => false])

<input
    x-data
    x-mask="+7(999)999-99-99"
    type="tel"
    {{ $attributes->merge(['class' => 'border-gray-300 focus:border-teal-500 focus:ring-teal-500 rounded-md shadow-sm']) }}
    {{ $disabled ? 'disabled' : '' }}
>