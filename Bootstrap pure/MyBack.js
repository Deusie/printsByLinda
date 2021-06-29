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

function searchBar() {
    document.getElementById("searchIcon").style.display = "none";
    document.getElementById("heartIcon").style.display = "none";
    document.getElementById("SearchBar").style.display = "block";
    $(document.body).click(function(e){
        var $box = $('#SearchBar');
        var $box2 = $('#searchIcon');
        if(e.target.id !== 'SearchBar' && e.target.id !== 'searchIcon' && !$.contains($box[0], e.target) && !$.contains($box2[0], e.target)){
            console.log("remove searchbar");
            document.getElementById("searchIcon").style.display = "block";
            document.getElementById("heartIcon").style.display = "block";
            document.getElementById("SearchBar").style.display = "none";
        }
    });
}