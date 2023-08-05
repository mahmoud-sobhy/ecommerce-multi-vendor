<h1>Hello</h1>

@foreach ($users as $user)
  <h2> {{$user->id}} </h2>
  <h2> {{$user->name}} </h2>
  <h2> {{$user->email}} </h2>
  <h2> {{$user->email_verified_at}} </h2>
  <h2> {{$user->password}} </h2>
  <h2> {{$user->remember_token}} </h2>
  <hr>
  
@endforeach
