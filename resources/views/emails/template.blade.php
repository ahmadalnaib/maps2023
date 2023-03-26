<x-mail::message>
#username {{$data['name']}}

#url page {{$data['place_url']}}

<x-mail::button :url="''">
Error
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
