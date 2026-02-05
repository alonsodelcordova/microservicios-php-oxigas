<script setup lang="ts">
import { useRouter } from "vue-router";
import Pagination from "@/shared/components/Pagination.vue";
const router = useRouter();

const pagina_actual = parseInt(router.currentRoute.value.query.pagina as string) || 1;
const total_paginas = 10;

</script>

<template>
  <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
    <div>
      <h1 class="h2 font-weight-bold mb-1">Catálogo de Productos</h1>
      <p class="text-muted mb-0">
        Gestiona el inventario, precios y niveles de existencias por categoría.
      </p>
    </div>
    <router-link
      class="btn btn-primary d-flex align-items-center px-4 py-2"
      to="/system/productos/nuevo"
    >
      <i class="fa fa-plus mr-2"></i>
      Agregar
    </router-link>
  </div>
  <div class="row mb-4">
    <div class="col-md-4">
      <div class="card h-100 p-3">
        <div class="d-flex justify-content-between align-items-start">
          <div>
            <p class="text-muted small mb-1">Total Productos</p>
            <h3 class="font-weight-bold mb-0">23</h3>
          </div>
          <i class="fa fa-money text-success"></i>
        </div>
        <p class="text-success small mt-2 mb-0 font-weight-bold">
          <i class="fa fa-arrow-up"></i> +2% este mes
        </p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100 p-3">
        <div class="d-flex justify-content-between align-items-start">
          <div>
            <p class="text-muted small mb-1">Stock Bajo</p>
            <h3 class="font-weight-bold mb-0">12</h3>
          </div>
          <i class="fa fa-exclamation-triangle text-warning"></i>
        </div>
        <p class="text-warning small mt-2 mb-0 font-weight-bold">Requiere atención</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card h-100 p-3">
        <div class="d-flex justify-content-between align-items-start">
          <div>
            <p class="text-muted small mb-1">Sin Existencias</p>
            <h3 class="font-weight-bold mb-0">5</h3>
          </div>
          <i class="fa fa-times text-danger"></i>
        </div>
        <p class="text-danger small mt-2 mb-0 font-weight-bold">Actualizar catálogo</p>
      </div>
    </div>
  </div>
  <div class="card mb-4 shadow-sm">
    <div class="card-body py-3">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-3 mb-lg-0">
          <div class="input-group search-container">
            <div class="input-group-prepend">
              <span class="input-group-text bg-white border-right-0">
                <i class="fa fa-search"></i>
              </span>
            </div>
            <input
              class="form-control border-left-0"
              placeholder="Buscar productos por nombre, SKU o categoría..."
              type="text"
            />
          </div>
        </div>
        <div class="col-lg-6 text-lg-right">
          <div class="btn-group mr-2">
            <button
              class="btn btn-outline-secondary btn-sm dropdown-toggle"
              data-toggle="dropdown"
              type="button"
            >
              Categorías
            </button>
          </div>
          <button class="btn btn-light border btn-sm mr-2">
            <i class="fa fa-filter"></i>
          </button>
          <button class="btn btn-light border btn-sm">
            <i class="fa fa-download"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="card shadow-sm mb-4">
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th class="pl-4">Producto</th>
            <th>SKU</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Estado</th>
            <th class="text-right pr-4">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="pl-4">
              <div class="d-flex align-items-center">
                <img alt="producto" class="product-img mr-3" width="100" height="180" />
                <div>
                  <div class="font-weight-bold text-dark">Producto</div>
                </div>
              </div>
            </td>
            <td class="align-middle">COD-001</td>
            <td class="align-middle">
              <span class="badge badge-light border"> Categoría </span>
            </td>
            <td class="align-middle font-weight-bold">90</td>
            <td class="align-middle">0 Unidades</td>
            <td class="align-middle">
              <span class="badge badge-success">En Stock</span>
              <span class="badge badge-danger">Sin Stock</span>
              <span class="badge badge-warning">Stock Bajo</span>
            </td>
            <td class="text-right pr-4 align-middle">
              <button class="btn btn-sm btn-outline-primary mr-1">
                <i class="fa fa-edit"></i>
              </button>
              <button class="btn btn-sm btn-outline-danger">
                <i class="fa fa-trash"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <Pagination :total_paginas="total_paginas" :pagina_actual="pagina_actual" />
  </div>
</template>

<style scoped></style>
