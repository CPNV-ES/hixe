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
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td> {{$user->firstname}} </td>    
                        <td> {{$user->lastname}} </td>    
                        <td> {{$user->updated_at}} </td>    
                        <td>
                            <select name="user_role" id={{$user->id}}>
                                @foreach ($roles as $role)
                                    @if($user->role->slug == $role->slug)
                                        <option selected="selected" value={{$role->slug}}> {{$role->name}} </option>
                                    @else
                                        <option value={{$role->slug}}> {{$role->name}} </option>
                                    @endif
                                @endforeach
                            </select>    
                        </td>
                        <td class="text-center"><a href="save me" id="btn_{{$user->id}}" class="btn btn-outline-success btn_hidden"><i class="fas fa-check"></i></a></td>
                    </tr>

                    <script>
                        // if the value of the x-selected-list has changed 
                        // -> Display button 
                        var list = $("#" + {{$user->id}}); //The list's name is the '#'(For HTML class) char with the role's owner ID.

                        $(list).on("change", function(evt) {
                            alert(evt.target.value + {{$user->id}});
                            
                            // Add unsaved tag to show a difference between other lists
                            $(evt.target).addClass("listbox_unsaved");
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
        }

        .btn_hidden{
            visibility: hidden;
        }
    </style>

@endsection