@extends('layouts.base')

@section('title', 'Users')

@section('body-content')
    <div class="container-fluid mt-4 table-responsive">
        <table id="hikesTable" class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Dernière connection</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td> {{$user->firstname}} </td>    
                        <td> {{$user->lastname}} </td>    
                        <td> {{$user->updated_at}} </td>    
                        <td>
                            <select name="role" id="role_id">
                                @foreach ($roles as $role)
                                    @if($user->role->slug == $role->slug)
                                        <option selected="selected" value={{$role->slug}}> {{$role->name}} </option>
                                    @else
                                        <option value={{$role->slug}}> {{$role->name}} </option>
                                    @endif
                                @endforeach
                            </select>    
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection