@extends('layouts.base')

@section('title', 'Toutes les courses')

@section('body-content')
<h2>Votre Profils</h2>
<div class="d-flex justify-content-center">
    <div class="d-flex p-2">{{ Auth::user()->firstname }}</div>
    <div class="d-flex p-2">{{ Auth::user()->lastname }}</div>
    
</div>
<div class="d-flex justify-content-center">
    <div class="d-flex p-2">{{ Auth::user()->email_address }}</div>
</div>
<div class="d-flex justify-content-center">
    <div class="d-flex p-2">{{ Auth::user()->birthdate }}</div>
</div>
<div class="d-flex justify-content-center">
    <div class="d-flex p-2">Votre numéro de membre : {{ Auth::user()->member_number }}</div>
</div>
@endsection
