<x-mail::message>
    > #### Info
    > - Name {{$data['name']}}.
    > - Email  {{$data['email']}}.


<x-mail::button :url="$data['place_url']">
Show the Error
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
