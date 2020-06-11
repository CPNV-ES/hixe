@extends('layouts.base')

@section('title', 'Profile')

@section('body-content')




<div class="container d-flex justify-content-center">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-md-12">
                        <h2>Edit your profils</h2>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-6 col-md-12">
                        <hr style="border-color: black;">
                        <form method="POST" action="{{ route('profile.update',$user) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- username -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="firstname" class="form-control" placeholder="firstname" value="{{ $user->firstname  }}">
                                <input type="text" name="lastname" class="form-control" placeholder="lastname"  value="{{ $user->lastname }}">
                            </div>

                            <!-- birthday -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-birthday-cake"></i></span>
                                </div>
                                <input type="date" name="birthday" class="form-control" placeholder="birthday" value="{{ $user->birthdate }}">
                            </div>

                            <!-- Email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i> </span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="birthday" value="{{ $user->email_address }}">
                            </div>

                        
                            <hr style="border-color: black;">
                            <button type="submit" class="btn btn-primary float-right" onclick='return confirm("Voulez vous modifier votre profile avec les informations ci-dessous ?")'>Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
