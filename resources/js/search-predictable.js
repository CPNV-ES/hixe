    $('#destination').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: $(this).data('url'),
                method:"POST",
                data:{query:query, _token:_token},
                success:function(data){
                    $('#destinationList').fadeIn();
                    $('#destinationList').html(data);
                }
            });
        }
    });

    $(document).on('click', 'li', function(){
        $('#destination').val($(this).text());
        $('#destinationList').fadeOut();
    });

