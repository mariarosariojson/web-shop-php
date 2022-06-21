document.addEventListener("DOMContentLoaded", () => {
  let viewBtn = document.querySelectorAll(".view-products-details");
  for (const button of viewBtn) {
    button.addEventListener("click", onClickProductDetails);
  }
});

async function onClickProductDetails(e) {
  const id = this.dataset.id;
  console.log(id);

  const response = await fetch(`/ws/api/get-product.php?id=${id}`);
  const product = await response.json();

  const productDetails = document.getElementById("product-details");
  productDetails.hidden = false;

  document.getElementById("product-img").src = product.img_url;
  document.getElementById("product-title").innerText = product.title;
  document.getElementById("product-description").innerText = product.description;
  document.getElementById("product-price").innerText = product.price + " kr";
}
