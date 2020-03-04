<style>
  .login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-form-1{
    padding: 5%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    color: #333;
}
.login-form-2{
    padding: 5%;
    background: #0062cc;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-2 h3{
    text-align: center;
    color: #fff;
}
.login-container form{
    padding: 10%;
}
.btnSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    border: none;
    cursor: pointer;
}
.login-form-1 .btnSubmit{
    font-weight: 600;
    color: #fff;
    background-color: #0062cc;
}
.login-form-2 .btnSubmit{
    font-weight: 600;
    color: #0062cc;
    background-color: #fff;
}
.login-form-2 .ForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}
.login-form-1 .ForgetPwd{
    color: #0062cc;
    font-weight: 600;
    text-decoration: none;
}
</style>
@extends('layouts.base')

@section('title', 'Accueil')

@section('body-content')
<div class="content">
    <div class="row justify-content-md-center">
        @if(Auth::check())
        <div class="col-md-10">
        <div class="title m-b-md">
            Mes Courses
          </div>
          <table  id="hikesTable"  class="table table table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Guide</th>
                    <th scope="col">Inscrits</th>
                    <th scope="col">Minimum</th>
                    <th scope="col">Maximum</th>
                    <th scope="col">État</th>
                </tr>
            </thead>
            <tbody>

              
            @foreach ($hikes as $hike)
              @php
              $arrayEmail = implode(', ', $hike->users()->pluck('email_address')->toArray());
              $emailCo = Auth::user()->email_address;
              $pos = strpos($arrayEmail, $emailCo);
              @endphp
              @if($pos == true)
                <tr>
                  <th scope="row">{{ $hike->name }}</th>
                  <td>{{ $hike->meeting_date }}</td>
                  <td>{{ implode(', ', $hike->destinations()->pluck('location')->toArray()) }}</td>
                  <td>{{ implode(', ', $hike->guides()->pluck('firstname')->toArray()) }}</td>
                  <td>{{ $hike->users()->count() }}</td>
                  <td>{{ $hike->min_num_participants }}</td>
                  <td>{{ $hike->max_num_participants }}</td>
                  <td>{{ $hike->state->name }}</td>
                </tr>
              @endif
            @endforeach
        </tbody>
        </table>
        @else
        <div class="col-md-4">
          <div class="col-md-12 login-form-1">
              <h3>Login</h3>
              <form>
                  <div class="form-group">
                      <input type="text" class="form-control" placeholder="Your Email *" value="" />
                  </div>
                  <div class="form-group">
                      <input type="password" class="form-control" placeholder="Your Password *" value="" />
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btnSubmit" value="Login" />
                  </div>
                  <div class="form-group">
                      <a href="#" class="ForgetPwd">Forget Password?</a>
                  </div>
              </form>
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
