function addRow(parent) {
    parent.querySelector('.btn').hidden = false;
    var rows = parent.querySelectorAll('tbody tr');
    var lastRow = rows[rows.length - 1].cloneNode(true);
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

document.querySelectorAll('tbody .btn').forEach(function (elem) {
    elem.addEventListener('click', function(){
        deleteRow(elem.parentElement.parentElement.parentElement)
    });
});
