<script setup lang="ts">

import Pagination from "@/shared/components/Pagination.vue";
import { useRouter } from "vue-router";
const router = useRouter();

const pagina_actual = parseInt(router.currentRoute.value.query.pagina as string) || 1;
const total_paginas = 10;
</script>

<template>
  <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
    <div>
      <h1 class="h2 font-weight-bold mb-1">Pedidos</h1>
      <p class="text-muted mb-0">Administrar pedidos y sus detalles.</p>
    </div>
    <router-link class="btn btn-primary d-flex align-items-center px-4 py-2" to="/system/ingresos/nuevo">
      <i class="fa fa-plus mr-2"></i>
      Agregar
    </router-link>
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
              placeholder="Buscar pedidos por referencia..."
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
            <th>Referencia</th>
            <th>Cliente</th>
            <th>Total</th>
            <th>Estado</th>
            <th class="text-right pr-4">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="align-middle">
              <div class="d-flex align-items-center">
                <div class="font-weight-bold text-dark">
                  REF
                </div>
              </div>
            </td>
            <td class="align-middle">
              <div class="d-flex align-items-center">
                <div class="font-weight-bold text-dark">
                  Nombre
                </div>
              </div>
            </td>
            <td class="align-middle font-weight-bold">$0.00</td>
            <td class="align-middle">
              <span class="badge badge-success">En Proceso</span>
              <span class="badge badge-danger">Cancelado</span>
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
