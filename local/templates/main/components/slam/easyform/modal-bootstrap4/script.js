$('document').ready(function () {
    $('select[name="FIELDS[modelrelease]"]').change(function () {
        if($(this).val() == "Есть") {
            $('.choose-file.filerelease').removeClass('d-none');
        } else {
            $('.choose-file.filerelease').addClass('d-none');
        }

    })
    $('.slam-easyform .modal-dialog .btn.btn-secondary').click(function(){
        let modalBody = $(this).parents('.modal-body');
        if(!$(modalBody).find('.alert-danger').hasClass('hidden')) {
            modalBody.find('input[type=text], input[type=checkbox], input[type=file], textarea').val('');
            modalBody.find('input[type=checkbox]').prop('checked', false);
            modalBody.find('.choose-file ol').html('');
        }
    });
});