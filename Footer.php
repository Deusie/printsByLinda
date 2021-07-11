<footer class="container-fluid pt-3 pb-5" style="background-color: #535353;">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="list-group list-group-horizontal justify-content-center">
                    <li class="list-group-item footerLI"><a  href="index.php">Home</a></li>
                    <li class="list-group-item footerLI"><a  href="Store.php">Store</a></li>
                    <li class="list-group-item footerLI"><a  href="Contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script>
    function searchBar() {
        document.getElementById("searchIcon").style.display = "none";
        document.getElementById("heartIcon").style.display = "none";
        document.getElementById("cartIcon").style.display = "none";
        document.getElementById("SearchBar").style.display = "block";
        $(document.body).click(function(e){
            var $box = $('#SearchBar');
            var $box2 = $('#searchIcon');
            if(e.target.id !== 'SearchBar' && e.target.id !== 'searchIcon' && !$.contains($box[0], e.target) && !$.contains($box2[0], e.target)){
                console.log("remove searchbar");
                document.getElementById("searchIcon").style.display = "block";
                document.getElementById("heartIcon").style.display = "block";
                document.getElementById("cartIcon").style.display = "block";
                document.getElementById("SearchBar").style.display = "none";
            }
        });
    }
</script>
