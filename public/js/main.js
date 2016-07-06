$(function () {
    $(document).on('submit', 'form.delete-comment', function () {
        var x = confirm("Êtes-vous sur de vouloir supprimer votre commentaire ?");
        if (x)
            return true;
        else
            return false;
    });
})