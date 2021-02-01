$(() => {
    $('.datetimepicker').datetimepicker({
        locale: 'fr',
        format: '[le] DD/MM/YYYY [à] HH:mm',
        sideBySide: true,
        keepInvalid: false,
    }).on('dp.change', (e) => {
        let input = document.querySelector(e.target.dataset['input']);

        if (input) {
            input.value = e.timeStamp;
        }
    });
});