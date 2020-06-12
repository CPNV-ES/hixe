document.querySelectorAll('.destination-input').forEach( input => {
    input.addEventListener('keyup', () => {
        var query = input.value;
        if(query != '')
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: input.dataset.url,
                method:"POST",
                data:{query:query, _token:_token},
                success:function(data){
                    destinationList.innerHTML = data;
                    destinationList.querySelectorAll("li").forEach(li=> {
                        li.addEventListener("click", () => {
                            input.value = li.innerText;
                        })
                    });
                }
            });
        }
    });
});
