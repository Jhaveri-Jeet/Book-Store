document.querySelector('#close-update').onclick = () =>
{
  document.querySelector('.edit-product-form').style.display = 'none';
  window.location.href = 'products.php';
}