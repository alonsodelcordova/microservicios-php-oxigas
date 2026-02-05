<script setup lang="ts">
import { defineProps } from "vue";

const props = defineProps({
  total_paginas: Number,
  pagina_actual: Number,
});


 // total_paginas y pagina_actual son variables de entrada, cuando se crea el componente
 // se le pasan por props
 const total_paginas = parseInt(props.total_paginas as string) || 1;
 const pagina_actual = parseInt(props.pagina_actual as string) || 1;

const getArrPages = () => {
  const arr = [];
  const mostrar_items = 5;
  // el array quiero que sea solo 5 numeros osea:
  //si PA =1 y TP = 10 tengo [1,2,3,4,5]
  //si PA = 2 y TP = 10 tengo [1,2,3,4,5]
  //si PA = 3 y TP = 10 tengo [1,2,3,4,5]
  //si PA = 4 y TP = 10 tengo [2,3,4,5,6]
  //si PA = 5 y TP = 10 tengo [3,4,5,6,7]
  //si PA = 6 y TP = 10 tengo [4,5,6,7,8]
  //si PA = 7 y TP = 10 tengo [5,6,7,8,9]
  //si PA = 8 y TP = 10 tengo [6,7,8,9,10]
  //si PA = 9 y TP = 10 tengo [6,7,8,9,10]
  //si PA = 10 y TP = 10 tengo [6,7,8,9,10]
  if(total_paginas <= mostrar_items){
    for(let i = 1; i <= total_paginas; i++){
      arr.push(i);
    }
  }else{
    if(pagina_actual <= mostrar_items-2){
      for(let i = 1; i <= mostrar_items; i++){
        arr.push(i);
      }
    }else if(pagina_actual >= total_paginas - 2){
      for(let i = total_paginas - 4; i <= total_paginas; i++){
        arr.push(i);
      }
    }else{
      for(let i = pagina_actual - 2; i <= pagina_actual + 2; i++){
        arr.push(i);
      }
    }
  }
  return arr;
};
</script>
<template>
    <div
      class="card-footer bg-white border-top-0 d-flex align-items-center justify-content-between"
    >
      <span class="small text-muted"
        >Mostrando
        {{ pagina_actual }}
        de
        {{ total_paginas }}
        paginas</span
      >
      <nav>
        <ul class="pagination pagination-sm">
          <li class="page-item" v-if="pagina_actual > 1">
            <a class="page-link" :href="'?pagina=' + (pagina_actual - 1)">Anterior</a>
          </li>
          <li
            v-for="i in getArrPages()"
            :key="i"
            :class="'page-item '+ (pagina_actual == i ? 'active' : '' )"
          >
            <a class="page-link" :href="'?pagina=' + i">
              {{ i }}
            </a>
          </li>

          <li class="page-item" v-if="pagina_actual < total_paginas">
            <a class="page-link" :href="'?pagina=' + (pagina_actual + 1)">Siguiente</a>
          </li>
        </ul>
      </nav>
    </div>
</template>