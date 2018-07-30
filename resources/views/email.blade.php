<!DOCTYPE html>
<html>
<head>
    <title> {{ __('activation_mail_title') }} </title>
</head>
    <body>
        <p>
            {{ __('activation_mail_p1') }} {{ $user->name }} {{ __('activation_mail_p2') }}
            </br>
            <a href="{{ $user->activation_link }}">{{ $user->activation_link }}</a>
        </p>
    </body>
</html>
