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

    // Add training row on click
    tableTraining.querySelector('tbody').addEventListener('change', evt => {
        addRow(evt.target.parentElement.parentElement.parentElement.parentElement);
        evt.target.addEventListener('change', evt => { evt.stopPropagation(); });
    });

    // Delete training row on click
    tableTraining.querySelectorAll('button[name="remove-cours"]').forEach(element => {
        element.addEventListener("click", evt => {
            deleteRow(element.parentElement.parentElement.parentElement);
        });
    });


    // Add material row on click
    tableMaterial.querySelector('tbody').addEventListener('change', evt => {
        addRow(evt.target.parentElement.parentElement.parentElement.parentElement);
        evt.target.addEventListener('change', evt => { evt.stopPropagation(); });
    });

    // Delete material row
    tableMaterial.querySelectorAll('button[name="remove-material"]').forEach(element => {
        element.addEventListener("click", evt => {
            deleteRow(element.parentElement.parentElement.parentElement);
        });
    });


    // Add destination row on click
    tableDestination.querySelector('tbody').addEventListener('change', evt => {
        addRow(evt.target.parentElement.parentElement.parentElement.parentElement.parentElement);
        evt.target.addEventListener('change', evt1 => { evt.stopPropagation(); });

    });

    // Delete destination row on click
    tableDestination.querySelectorAll('button[name="remove-destination"]').forEach(element => {
        element.addEventListener("click", evt => {
            deleteRow(element.parentElement.parentElement.parentElement);
        });
    });

    /*
    /////////////////////////////////
    Old functionality for navigation
    /////////////////////////////////
    // Add step for hike
    addRowStep.addEventListener('click', function () {
        addStep(this.parentElement.querySelector('table tbody tr'));
    });*/

    /*
    document.querySelectorAll('tbody .btn').forEach(function (elem) {
        elem.addEventListener('click', function () {
            deleteRow(elem.parentElement.parentElement.parentElement);
        });
    });
    */

    /*
    function addStep(elem) {
        // Contain the step input
        var newStep = elem.cloneNode(true);

        // Unfill content
        newStep.querySelector('select[type="button"]').value = '';

        // Show delete button
        newStep.querySelector('button').hidden = false;

        // Delete step
        newStep.querySelector('button').addEventListener('click', function () {
            deleteRow(newStep);
        })

        // Insert clone before destination id
        elem.parentNode.insertBefore(newStep, destination);

    }
    */
});
