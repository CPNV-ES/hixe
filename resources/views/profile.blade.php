@extends('layouts.base')

@section('title', 'Profile')

@section('body-content')




<div class="container d-flex justify-content-center">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-md-12">
                        <h2>Votre Profils</h2>
                        <hr style="border-color: black;">
                    </div>
                    <div class="col-sm-6 col-md-12">
                        <h4>{{ $user->firstname }} {{ $user->lastname }}</h4>
                        <small><i class="fas fa-birthday-cake"></i> {{ $user->birthdate }}</small>
                        <p><i class="fas fa-envelope"></i> {{ $user->email_address }}</p>
                        <p><i class="fas fa-list-ol"></i> Numéro de membre : {{ $user->member_number }}</p>
                        <hr style="border-color: black;">
                        <h4>Role des course :</h4>
                        <table class="table table table-hover mt-3">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nom de la course</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->hikes as $userHike)
                                    <tr class="select" onclick="location.href='{{ route('hikes.show',$userHike->id) }}'">
                                        <td>{{ $userHike->name }}</td>
                                        <td>
                                            @foreach($roles as $role)
                                                @if($role->id == $userHike->pivot->role_id)
                                                    {{ $role->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-right">
                        <hr style="border-color: black;">
                        <form action="/auth/logout" method="POST">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
