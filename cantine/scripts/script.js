/* Cette fonction agit au click sur une balise de type button. Elle récupère ce qui est écrit entre les deux balises
 et renvoie sur un fichier en fonction de ce qui est écrit */

$(function() {
    $('button').click(function() {
        var htmlRecovered = $(this).html();
        if (htmlRecovered === "Réserver") {
            window.location = "reserve.php";
        } else if (htmlRecovered === "Retour") {
            window.location = "index.php";
        } else {
            window.location = "cancel.php";
        }
    })
})
