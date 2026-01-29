@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' =>'bg-white
border border-gray-300
text-gray-800
rounded-lg
shadow-sm
focus:outline-none
focus:ring-2
focus:ring-blue-500
focus:border-blue-500
disabled:opacity-50
disabled:cursor-not-allowed']) !!}>