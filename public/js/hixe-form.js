function addRow(parent) {
    parent.querySelector('.btn').hidden = false;
    var rows = parent.querySelectorAll('tbody tr');
    var lastRow = rows[rows.length - 1].cloneNode(true);

    // Unfill content of input when added
    lastRow.querySelectorAll('input').forEach(function(elem){
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
    if (parent.querySelectorAll('tr').length < 2) {
        parent.querySelector('.btn').hidden = true;
    }
}

// Add course row on click
addRowCourse.addEventListener('click', function() {
    addRow(this.parentElement.querySelector('table'));
});

// Add material row on click
addRowMaterial.addEventListener('click', function() {
    addRow(this.parentElement.querySelector('table'));
});

// Add step for hike
addRowStep.addEventListener('click', function() {
    addStep(this.parentElement.querySelector('table tbody tr'));
});

document.querySelectorAll('tbody .btn').forEach(function (elem) {
    elem.addEventListener('click', function(){
        deleteRow(elem.parentElement.parentElement.parentElement)
    });
});

function addStep(elem) {
   var newStep = elem.cloneNode(true);

   // Unifll content
   newStep.querySelector('input[type="text"]').value = '';
   newStep.querySelector('button').hidden = false;
   newStep.querySelector('button').addEventListener('click', function () {
        deleteRow(newStep);
   })
   console.log(newStep);
   elem.parentNode.insertBefore(newStep, destination);

}
