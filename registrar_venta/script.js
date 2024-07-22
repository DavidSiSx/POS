const addProductButton = document.querySelector('.add-product');
const productLinesContainer = document.getElementById('product-lines');

addProductButton.addEventListener('click', () => {
  const newProductLine = document.createElement('div');
  newProductLine.className = 'product-line';
  newProductLine.innerHTML = `
    <label class="producto" for="producto">Producto:</label>
    <select id="producto" name="producto">
      <option value="">Seleccione un producto</option>
      <option value="1">Arroz</option>
      <option value="10">Frijoles</option>
      <option value="3">Aceite</option>
      <option value="4">Azucar</option>
      <option value="5">Sal</option>
    </select>
    <br /><br />
    <label class="cantidad" for="cantidad">Cantidad:</label>
    <input type="number" id="cantidad" name="cantidad" min="1" required />
  `;
  productLinesContainer.appendChild(newProductLine);
});