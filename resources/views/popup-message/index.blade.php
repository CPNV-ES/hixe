@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block" > {{ $message }} </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block" > {{ $message }} </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block" > {{ $message }} </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block"> {{ $message }} </div>
@endif

<script>
    setTimeout(function() {
        $(".alert").fadeOut(1000, function(){
            this.remove();
        });
    }, 5000);   
</script>

