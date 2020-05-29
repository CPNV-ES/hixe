document.addEventListener("DOMContentLoaded", function () {
    $('#destination[]').keyup(function(){
        var query = $(this).val();
        if(query != ''){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('create.fetch') }}",
                method: "POST",
                data:{query:query, _token:_token},
                success: function (data)
                {
                    $('#destinationList').fadeIn();
                    $('#destinationList').html(data);
                }
            })
        }

    })
});
