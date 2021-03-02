$(() => {
    $('.datetimepicker').datetimepicker({
        locale: 'fr',
        format: '[le] DD/MM/YYYY [à] HH:mm',
        sideBySide: true,
        keepInvalid: false,
    }).on('dp.change', (e) => {
        let input = document.querySelector(e.target.dataset['input']);

        if (input) {
            // Convert Javascript timestamp to PHP timestamp
            input.value = Math.round(e.timeStamp / 1000);
        }
    }).each((_, datetimepicker) => {
        let input = document.querySelector(datetimepicker.dataset['input']);

        if (input?.value != '') {
            // Set the datetimepicker date to the value of the PHP timestamp 
            // of the input
            $(datetimepicker).data('DateTimePicker').date(new Date(input.value * 1000));
        } else {
            let now = Date.now();
            input.value = Math.round(now / 1000);
            $(datetimepicker).data('DateTimePicker').date(new Date(now));
        }
    });
});