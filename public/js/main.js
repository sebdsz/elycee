$(function () {

    var token = $('meta[name=_token]').attr('content');

    /** SUPPRESSION COMMENTAIRE **/
    $(document).on('submit', 'form.delete-comment', function (e) {
        var link = $(this).attr('action'),
            $comment = $(this).parents('.box-comment');
        e.preventDefault();
        $.confirm({
            theme: 'material',
            animation: 'top',
            closeAnimation: 'bottom',
            backgroundDismiss: true,
            animationBounce: 1,
            animationSpeed: 1000,
            title: 'Suppression',
            content: 'Êtes-vous sûr de vouloir supprimer votre commentaire ?',
            confirmButton: 'Oui',
            cancelButton: 'Non',
            confirm: function () {
                $.ajax({
                    url: link,
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': token},
                }).always(function (count) {
                    $comment.fadeOut();
                    $comment.parents('.comments').prev('.count').html(count);
                });
            }
        });
    });

    /** EDITION COMMENTAIRE **/
    $(document).on('click', 'button.edit-comment', function () {
        var $this = $(this),
            link = $this.attr('data-url'),
            $comment = $this.parents('.comments').find('.comment');

        if ($this.html() === 'Valider') {
            $.ajax({
                url: link,
                type: 'PUT',
                headers: {'X-CSRF-TOKEN': token},
                data: {'content': $comment.html()}
            }).done(function () {
                $comment.attr('contenteditable', false);
                $this.html('Modifier');
                $.alert({
                    theme: 'material',
                    title: 'Modification',
                    confirmButton: 'OK',
                    content: 'Votre commentaire à été modifié avec succès !',
                    autoClose: 'confirm|3000',
                });

            }).fail(function () {
                $.alert({
                    theme: 'material',
                    title: 'Erreur',
                    confirmButton: 'OK',
                    content: 'Il y a eu une erreur, veuillez réessayer plus tard !',
                    autoClose: 'confirm|3000',
                });
            });
        } else {
            $comment.attr('contenteditable', true);
            $this.html('Valider');
        }
    });

})