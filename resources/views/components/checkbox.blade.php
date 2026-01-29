<input
  type="checkbox"
  {!! $attributes->merge([
'class' => '
h-5 w-5
rounded-md
border border-gray-300
bg-white
text-blue-600
shadow-sm
transition
duration-200

focus:outline-none
focus:ring-2
focus:ring-blue-500
focus:ring-offset-2

checked:bg-blue-600
checked:border-blue-600
'
]) !!}
>