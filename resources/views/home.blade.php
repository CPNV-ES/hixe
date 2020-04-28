@extends('layouts.base')

@section('title', 'Accueil')

@section('body-content')

<div class="title m-b-md">
  Mes Courses
</div>
<div class="links">
  Le site d'organisation de courses en montagne du CAS Valais
</div>

@if (Auth::check())
<form action="auth/logout" method="POST">
@csrf
    <tr>
        <td><img alt="icon" width="25" heigth="25">{{Auth::user()->name}}<button type="submit">Logout</button></td>
    </tr>
</form>
@else
    <tr>
        <td><a href="/auth/github"><img alt="Github" width="25" heigth="25" src="/images/github.png">Login with GitHub</a></td>
    </tr>
@endif
@endsection
