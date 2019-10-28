$('document').ready(function () {
    $('select[name="FIELDS[MODEL_RELEASE]"]').change(function () {
        if($(this).find('option[value=' + $(this).val() + ']').html() == "Есть") {
            $(this).parents('.afd-row').siblings('.choose-file[data-field=RELEASE_FILE]').removeClass('d-none');
        } else {
            $('.choose-file[data-field=RELEASE_FILE]').addClass('d-none');
        }

    })
});