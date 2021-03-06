document.addEventListener("DOMContentLoaded", function () {

    function addRow(parent) {
        var rows = parent.querySelectorAll('tbody tr');
        var lastRow = rows.last().cloneNode(true);

        rows.forEach(function (elem) {
            elem.querySelector('.btn').hidden = false;
        });

        // Unfill content of input when added
        lastRow.querySelectorAll('input').forEach(function (elem) {
            elem.value = "";
        });

        lastRow.querySelector('.btn').addEventListener('click', (a) => { // () => Is like function() but doesn't keep the scope
            deleteRow(lastRow);
        });

        parent.querySelector('tbody').appendChild(lastRow);
    }

    function deleteRow(child) {
        var parent = child.parentElement;
        parent.removeChild(child);
        if (parent.querySelectorAll('tr').length <= 1) {
            parent.querySelector('.btn').hidden = true;
        }
    }

    // Add course row on click
    tableTraining.querySelector('tbody').addEventListener('change', evt => {
        addRow(evt.target.parentElement.parentElement.parentElement.parentElement);
        evt.target.addEventListener('change', evt => { evt.stopPropagation(); });

    });


    tableTraining.querySelectorAll('button[name="remove-cours"]').forEach(element => {
        element.addEventListener("click", evt => {
            deleteRow(element.parentElement.parentElement.parentElement);
        });
    });

    tableMaterial.querySelectorAll('button[name="remove-material"]').forEach(element => {
        element.addEventListener("click", evt => {
            deleteRow(element.parentElement.parentElement.parentElement);
        });
    });
    // Add material row on click
    tableMaterial.querySelector('tbody').addEventListener('change', evt => {
        addRow(evt.target.parentElement.parentElement.parentElement.parentElement);
        evt.target.addEventListener('change', evt => { evt.stopPropagation(); });
    });

    // Add step for hike
    addRowStep.addEventListener('click', function () {
        addStep(this.parentElement.querySelector('table tbody tr'));
    });

    document.querySelectorAll('tbody .btn').forEach(function (elem) {
        elem.addEventListener('click', function () {
            deleteRow(elem.parentElement.parentElement.parentElement)
        });
    });

    function addStep(elem) {
        // Contain the step input
        var newStep = elem.cloneNode(true);

        // Unifll content
        newStep.querySelector('input').value = '';

        // Show delete button
        newStep.querySelector('button').hidden = false;

        // Delete step
        newStep.querySelector('button').addEventListener('click', function () {
            deleteRow(newStep);
        })

        // Insert clone before destination id
        elem.parentNode.insertBefore(newStep, destination);
        addSearchAutocomplete();
    }
    addSearchAutocomplete();
});


function addSearchAutocomplete(){
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
                        var list = input.parentElement.parentElement;

                        // Remove redudant query content from autocomplete list
                        if (document.querySelector('#destinationList'))
                            destinationList.remove();

                        // Convert DOM's text in HTML format
                        var doc = new DOMParser().parseFromString(data, "text/xml");
                        list.appendChild(doc.documentElement);

                        list = destinationList;
                        list.querySelectorAll("li").forEach(li=> {
                            li.addEventListener("click", () => {
                                input.value = li.innerHTML;

                                // remove list's content when element selected
                                list.remove();
                            })
                        });
                    }
                });
            }
        });
    });
}




