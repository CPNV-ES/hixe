@extends('layouts.base')

@section('title', 'Ajouter des courses')

@section('body-content')

<div class="content">
    <div class="row justify-content-md-center">
      <div class="col-md-10">
      @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__(" Insérer des cours")}}</h5>
          </div>
          <div class="card-body">          
            <form method="post" action="addMultiHikes" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
              @method('post')
              <div class="row">
              </div>
              <!-- Date -->
                <div class="row">
                    <div class="col-md-11 pr-1">
                        <div class="form-group">
                            <table id="mytable">
                                <thead>
                                    <td>name</td>
                                    <td>Départ</td>
                                    <td>Retour</td>
                                    <td>Destination</td>
                                    <td>Type</td>
                                    <td>Dénivelé</td>
                                    <td>Difficulté</td>
                                    <td>Max Pers.</td>
                                    <td>CdC</td>
                                    <td>Altitude</td>
                                </thead>
                                <tbody>
                                    <tr id="rows">
                                        <td><input type="text" name="name[]" class="form-control" value=''></td>
                                        <td><input type="datetime-local" name="start[]" class="form-control" value=''></td>
                                        <td><input type="datetime-local" name="finish[]" class="form-control" value=''></td>
                                        <td><input type="text" name="destination[]" class="form-control" value=''></td>
                                        <td><input type="text" name="type[]" class="form-control" value=''></td>
                                        <td><input type="text" name="elevation[]" class="form-control" value=''></td>
                                        <td><input type="text" name="difficulty[]" class="form-control" value=''></td>
                                        <td><input type="text" name="max[]" class="form-control" value=''></td>
                                        <td><input type="text" name="cdc[]" class="form-control" value=''></td>
                                        <td><input type="number" name="altitude[]" class="form-control" value=''></td>
                                        <td><input type="button" class="btn btn-danger btn-round" value="Delete" onclick="deleteRow(this)"></td>
                                    </tr>
                                </tbody>
                            </table> 
                            <div class="d-flex justify-content-end">
                              <div id="insert-more" class="btn btn-secondary btn-round d-flex justify-content-end" style="margin-top:15px"> Add Row </div>
                            </div> 
                        </div>
                    </div>
                </div>
              <div class="footer ">
                <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
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
</script>
@endsection