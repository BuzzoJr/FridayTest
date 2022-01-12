<template>
<div id="example-1">
    <button v-on:click="counter += 1">Adiciona 1</button>
    <p>Quantas vezes o botão acima foi clicado: {{ counter }}</p>
</div>
</template>

<script>
var example1 = new Vue({
  el: '#example-1',
  data: {
    counter: 0
  }
})
</script>
