$(function () {

    var token = $('meta[name=_token]').attr('content');

    $(document).on('submit', 'form.delete-comment', function (e) {
        var link = $(this).attr('action'),
            $comment = $(this).parents('.box-comment');
        e.preventDefault();
        $.confirm({
            theme: 'white',
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

    $(document).on('click', 'button.edit-comment', function () {
        var $this = $(this),
            link = $this.attr('data-url'),
            $comment = $this.parents('.comments').find('.comment');

        if ($this.html() === 'Valider') {
            $.ajax({
                url: link,
                type: 'PUT',
                headers: {'X-CSRF-TOKEN': token},
                data: {'content' : $comment.html()}
            }).always(function () {
                $comment.attr('contenteditable', false);
                $this.html('Modifier');
            });
        } else {
            $comment.attr('contenteditable', true);
            $this.html('Valider');
        }


    });

})