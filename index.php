<?php
// http://localhost:8081/ws/
require_once __DIR__ . "/classes/Template.php";


?>

<?php
Template::header('a Clothing Store');
?>
<div class="header-img"><img src="/WS/assets/img/header-WS.jpg" alt="" srcset=""></div>


<h2 class="sub-header-text">new arrivals.</h2>

<div class="new-arrivals-img">

    <div class="img-small">
        <img class="products-img-index" src="assets/img/WS_0.jpg" width="100%">
    </div>

    <div class="img-small">
        <img class="products-img-index" src="assets/img/WS_2.jpg" width="100%">
    </div>

    <div class="img-small">
        <img class="products-img-index" src="assets/img/WS_3.jpg" width="100%">
    </div>

    <div class="img-small">
        <img class="products-img-index" src="assets/img/WS_4.jpg" height="100%">
    </div>
</div>

<div class="about-section">
    <div class="about-section-text">
        <p>
        <h1 class="about-header">About us text</h1>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi tempore perspiciatis magnam delectus nulla, inventore iusto, alias ab asperiores qui eaque soluta doloremque? Animi nam expedita incidunt illum nulla quaerat!</p>
        <button>Read More</button>
    </div>
    <div class="about-section-picture"><img class="products-img-index" src="assets/img/WS_7.jpg" width="100%"> </div>
</div>

<?php
Template::footer();
