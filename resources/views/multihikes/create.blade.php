@extends('layouts.base')

@section('title', 'Ajouter des courses')

@section('body-content')

<div class="content">
    <div class="row justify-content-md-center">
      <div class="col-md-12">
        <!-- MSG succes or error doesn't working -->
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Insérer des courses")}}</h5>
          </div>
          <div class="card-body">
            <p><em>Champs obligatoire*</em></p>
          <form method="POST" action="{{ route("multiHikes.store") }}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
              @method('post')
              <!-- Date -->
                <div class="row">
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                            <table id="mytable">
                                <thead>
                                    <td>Nom*</td>
                                    <td>Chef de course*</td>
                                    <td>Meeting location*</td>
                                    <td>Meeting Date*</td>
                                    <td>Hike date*</td>
                                    <td>Start*</td>
                                    <td>Finish*</td>
                                    <td>Min Pers.</td>
                                    <td>Max Pers.</td>
                                    <td>Difficulé*</td>
                                    <td>Info</td>
                                    <td>Dénivelé*</td>
                                </thead>
                                <tbody>
                                    <tr id="rows">
                                        <td><input type="text"    name="name[]" class="form-control" value=''></td>
                                        <td>
                                          <select class="form-control" name="chef[]">
                                          @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</option>  
                                          @endforeach
                                          </select>
                                        </td>
                                        <td><input type="text"    name="meetingLocation[]" class="form-control" value=''></td>
                                        <td><input type="date"    name="meetingDate[]" class="form-control" value='' onblur="AutoInpute(value, this, 'hikeDate[]')"></td>
                                        <td><input type="date"    name="hikeDate[]" class="form-control"></td>
                                        <td><input type="time"    name="start[]" class="form-control" value='' onblur="AutoInpute(value, this, 'finish[]')"></td>
                                        <td><input type="time"    name="finish[]" class="form-control" value=''></td>
                                        <td><input type="number"  min="1"        name="min[]" class="form-control" value=''></td>
                                        <td><input type="number"  min="1"        name="max[]" class="form-control" value=''></td>
                                        <td><input type="number"  min="1" max="9"   name="difficulty[]" class="form-control" value=''></td>
                                        <td><input type="text"    name="info[]" class="form-control" value=''></td>
                                        <td><input type="number"  min="1" name="denivele[]" class="form-control" value=''></td>
                                        <td><input type="button"  class="btn btn-danger btn-round" value="Delete" onclick="deleteRow(this)"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              <div class="row footer ">
                <div class="col-md-12 pr-1 d-flex justify-content-end">
                  <div id="insert-more" class="btn btn-secondary btn-round" style="margin-right:15px" > Add Row </div>
                  <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>




<script>
 $("#insert-more").click(function () {
     $("#mytable").each(function () {
         var tds = '<tr>';
         jQuery.each($('tr:last td', this), function () {
             tds += '<td>' + $(this).html() + '</td>';
         });
         tds += '</tr>';
         if ($('tbody', this).length > 0) {
             $('tbody', this).append(tds);
         } else {
             $(this).append(tds);
         }
     });
});
function deleteRow(r){
  var i = r.parentNode.parentNode.rowIndex;
  var tbllenght = $('#mytable tr').length-1;
  if(tbllenght != 1){
    document.getElementById('mytable').deleteRow(i);
  }
}

function AutoInpute(autoValue, i, name){
  w = i.parentNode.parentNode.rowIndex - 1;
  var x = document.getElementsByName(name);
  x[w].value = autoValue;
}
</script>
@endsection