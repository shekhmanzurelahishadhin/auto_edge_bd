<x-mail::message>
    # Congratulations!&nbsp; {{ $data['name'] }}

    Your JKKNIU account has been created.

    Your email is: {{ $data['email'] }}

     Your password is: {{ $data['password'] }}

    <x-mail::button :url="'https://jkkniu-university.test'">
        Login
    </x-mail::button>

    This is an auto generated password. Please change password from your panel asap.

    Thanks,
    {{ config('app.name') }}
</x-mail::message>
