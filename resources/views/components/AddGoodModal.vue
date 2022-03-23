<template>
    <form action=""> 
      <input id="nome" type="text" name="nome" placeholder="Nome da mercadoria">
      <input id="price" type="number" name="preco" placeholder="Price">
        <div>
      <label for="tamanhos">Tamanhos: </label>
      <select id="tamanhos" name="tamanhos">
          <option value="35"> 35 </option>
          <option value="36"> 36 </option>
          <option value="37"> 37 </option>
        </select>
        <label for="Quantidade"> Quantidade: </label>
        <input id="quantidade" name="quantidade" type="number">
        <div>
        <label for="imagens"> Imagens </label>
        <input id="imagens" name="imagens" type="file">
        </div>
        </div>
    </form>

</template>
