<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => '
            inline-flex
            items-center
            justify-center
            px-6
            py-2.5
            rounded-lg
            font-semibold
            text-sm
            uppercase
            tracking-wide

            bg-blue-600
            text-white

            hover:bg-blue-700
            active:bg-blue-800

            focus:outline-none
            focus:ring-2
            focus:ring-blue-500
            focus:ring-offset-2

            disabled:opacity-50
            disabled:cursor-not-allowed

            transition
            duration-200
            ease-in-out
        '
    ]) }}
>
    {{ $slot }}
</button>
