<h1>Hello</h1>

<p>
  Please click the following link to reset your password,

  <a href="{{ env('APP_URL') }}/reset/{{ $user->email }} / {{ $code }}"> click here!</a>
</p>
