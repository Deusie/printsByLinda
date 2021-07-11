Favorites = window.localStorage;

function flip(flipID) {
    $("#flip" + flipID.toString()).toggleClass('flipped');
}

$(document).ready(function(){
    for (var i = 0; i < localStorage.length; i++){
        document.getElementById('addHeart' + localStorage.getItem(localStorage.key(i))).style.display = "none";
        document.getElementById('removeHeart' + localStorage.getItem(localStorage.key(i))).style.display = "block";
    }
});


function DeleteALlFavorites() {
    Favorites.clear();
    console.log("remove all favorites")
}