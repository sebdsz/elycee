$(function () {
    /** Gestion des checkbox **/
    var $allCheckboxInput = $('input.all'),
        $checkboxsInput = $('input.checked');


    if ($allCheckboxInput.length) {
        $allCheckboxInput.on('change', function () {
            if ($allCheckboxInput.is(':checked')) {
                $.each($checkboxsInput, function () {
                    $(this).prop('checked', true);
                });
            } else {
                $.each($checkboxsInput, function () {
                    $(this).prop('checked', false);
                });
            }
        });
        $checkboxsInput.on('change', function () {
            if ($allCheckboxInput.is(':checked')) {
                $allCheckboxInput.prop('checked', false);
            }
        });

    }

    /** Gestion de la popup suppression de ressources **/

    $('button.action').on('click', function (e) {
        if ($('select[name=action]').val() === 'delete') {
            var checked = [],
                checkbox = [];

            $.each($checkboxsInput, function () {
                if ($(this).is(':checked')) {
                    checked.push($(this).val());
                    checkbox.push($(this));
                }
            });
            e.preventDefault();
            var link = $(this).parents('form').attr('action'),
                token = $('meta[name=_token]').attr('content');
            $.confirm({
                theme: 'white',
                animation: 'top',
                closeAnimation: 'bottom',
                backgroundDismiss: true,
                animationBounce: 1,
                animationSpeed: 1000,
                title: 'Suppression',
                content: 'Êtes-vous sûr de vouloir le(s) supprimer ?',
                confirmButton: 'Oui',
                cancelButton: 'Non',
                confirm: function () {
                    if ($allCheckboxInput.is(':checked')) {
                        $.ajax({
                            url: link,
                            type: 'POST',
                            headers: {'X-CSRF-TOKEN': token},
                            data: {all: true, action: 'delete'}
                        }).always(function () {
                            location.reload();
                        });
                    } else {
                        $.ajax({
                            url: link,
                            type: 'POST',
                            headers: {'X-CSRF-TOKEN': token},
                            data: {checked: checked, action: 'delete'}
                        }).always(function (count) {
                            $.each(checkbox, function () {
                                $(this).parents('tr').remove();
                            });
                            $('span.count').html(count);
                        });
                    }
                },
                onAction: function (action) {
                    if (action === 'confirm') {
                        $.confirm({
                            title: 'Supprimer !',
                            content: 'Les éléments ont été supprimé avec succès !',
                            autoClose: 'confirm|2000',
                            closeIcon: false,
                            cancelButton: false,
                            backgroundDismiss: true,
                            confirmButton: 'OK',

                        });
                    }
                }
            });
        }
    });


    /** Transform textarea with tinymce **/
    tinymce.init({selector: 'textarea.editor'});

    /** Transform input[type=date] with bootstrap-datepicker **/
    $('input[type=date]').datepicker({
        format: 'dd/mm/yyyy',
        language: 'fr',
        todayBtn: true,
        todayHighlight: true,
    });

    $('button.close').on('click', function () {
        $(this).parent().fadeOut();
    });

});