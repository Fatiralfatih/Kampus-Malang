@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => ' border-1 border-gray-500 focus:border-indigo-500 focus:ring-indigo-500 py-1 ps-2 rounded-md shadow-sm']) !!}>
