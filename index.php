<?php
// http://localhost:8081/ws/
require_once __DIR__ . "/classes/Template.php";


?>

<?php
Template::header('a Clothing Store');
?>
<div class="header-img"><img src="/WS/assets/img/header-WS.jpg" alt="" srcset=""></div>

<h2 class="sub-header-text">New Arrivals</h2>

<div class="new-arrivals-img">

    <div class="img-small">
        <img class="products-img-index" src="assets/uploads/1655310046.jpg" width="350px" height="300px">


    </div>
    <div class="img-small"> <img class="products-img-index" src="assets/uploads/1655310046.jpg" width="350px" height="300px"></div>
    <div class="img-small"> <img class="products-img-index" src="assets/uploads/1655310046.jpg" width="350px" height="300px"></div>
    <div class="img-small"> <img class="products-img-index" src="assets/uploads/1655310046.jpg" width="350px" height="300px"></div>
</div>
</div>
<?php
Template::footer();
