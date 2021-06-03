@extends('layouts.base')

@section('title', 'Users')

@section('body-content')
    <div class="container-fluid mt-4 table-responsive">
        <table id="hikesTable" class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">Firstname</th>
                    <th scope="col">lastname</th>
                    <th scope="col">Last updated</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td> </td>    
                        <td> </td>    
                        <td> </td>    
                        <td> </td>    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection