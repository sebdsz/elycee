$(function () {

    $(document).on('submit', 'form.delete-comment', function (e) {
        var link = $(this).attr('action'),
            token = $('meta[name=_token]').attr('content'),
            $comment = $(this).parent('.comment');
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

})