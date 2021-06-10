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
                    <th scope="col" class="text-center">Sauvegarder</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td> {{$user->firstname}} </td>    
                        <td> {{$user->lastname}} </td>    
                        <td> {{$user->updated_at}} </td>    
                        <td>
                        <form id="user_form_{{$user->id}}" method="post" action="{{ route('roles.updateRoles',$user) }}" enctype="multipart/form-data">
                            @csrf
                            <select name="user_role" class="form-control w-50" id={{$user->id}}>
                                @foreach ($roles as $role)
                                    @if($user->role->slug == $role->slug)
                                        <option selected="selected" value={{$role->slug}}> {{$role->name}} </option>
                                    @else
                                        <option value={{$role->slug}}> {{$role->name}} </option>
                                    @endif
                                @endforeach
                            </select>    
                            </td>
                            <td class="text-center">
                                <input type="submit" id="btn_{{$user->id}}" class="btn btn-outline-success btn_hidden" value="Save">
                            </td>
                        </form>
                    </tr>
                    <script>
                        // * Display the button if a value inside the list changes *
                        var list = $("#" + {{$user->id}}); //The list's name is the '#'(For HTML class) char with the role's owner ID.
                        $(list).on("change", function(evt) {
                            //console.log(evt.target.value + {{$user->id}});
                            // Add unsaved tag to show a difference between other lists
                            $(evt.target).addClass("listbox_unsaved");
                            // Display
                            $("#btn_" + {{$user->id}}).removeClass("btn_hidden");
                        })
                    </script>
                @endforeach
            </tbody>
        </table>
    </div>

    <style type="text/css">
        .listbox_unsaved {
            border-color:aliceblue;
            background-color: #ececec66;
            font-style: italic;
        }

        .btn_hidden{
            visibility: hidden;
        }
    </style>

@endsection