<script setup lang="ts">
import { useRouter } from "vue-router";
import Pagination from "@/shared/components/Pagination.vue";
const router = useRouter();

const pagina_actual = parseInt(router.currentRoute.value.query.pagina as string) || 1;
const total_paginas = 10;
</script>

<template>
  <div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-4"
  >
    <h1 class="h2 font-weight-bold">Listado de Ventas</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <button class="btn btn-outline-secondary btn-sm mr-2" type="button">
        <i class="fa fa-file mr-2"></i>
        Exportar
      </button>
      <router-link class="btn btn-primary btn-sm" to="/system/ventas/nuevo">
        <i class="fa fa-plus mr-2"></i>
        Nueva
      </router-link>
    </div>
  </div>
  <div class="card mb-4">
    <div class="card-body">
      <form class="form-inline">
        <div class="form-group mr-3 my-2">
          <label class="mr-2 small font-weight-bold" for="desde">Desde:</label>
          <input class="form-control form-control-sm" id="desde" type="date" />
        </div>
        <div class="form-group mr-3 my-2">
          <label class="mr-2 small font-weight-bold" for="hasta">Hasta:</label>
          <input class="form-control form-control-sm" id="hasta" type="date" />
        </div>
        <div class="form-group mr-3 my-2 flex-grow-1">
          <input
            class="form-control form-control-sm w-100"
            placeholder="Buscar por cliente o ID..."
            type="text"
          />
        </div>
        <button class="btn btn-dark btn-sm" type="submit">Filtrar</button>
      </form>
    </div>
  </div>
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0 font-weight-bold">Historial de Transacciones</h5>
      <small class="text-muted">Mostrando 5 registros</small>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-hover mb-0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Total</th>
            <th>Estado</th>
            <th class="text-right">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="font-weight-bold text-primary">#VEN-9402</td>
            <td>24/05/2024 14:30</td>
            <td>Juan Pérez Herrera</td>
            <td class="font-weight-bold">$1,250.00</td>
            <td><span class="badge badge-pill badge-success">Completado</span></td>
            <td class="text-right">
              <button class="btn btn-outline-secondary btn-sm">
                <i class="fa fa-eye"></i>
              </button>
              <button class="btn btn-outline-secondary btn-sm">
                <i class="fa fa-print"></i>
              </button>
            </td>
          </tr>
          <tr>
            <td class="font-weight-bold text-primary">#VEN-9401</td>
            <td>24/05/2024 12:15</td>
            <td>Comercializadora Global S.A.</td>
            <td class="font-weight-bold">$3,420.50</td>
            <td><span class="badge badge-pill badge-warning">Pendiente</span></td>
            <td class="text-right">
              <button class="btn btn-outline-secondary btn-sm">
                <i class="fa fa-eye"></i>
              </button>
              <button class="btn btn-outline-secondary btn-sm">
                <i class="fa fa-print"></i>
              </button>
            </td>
          </tr>
          <tr>
            <td class="font-weight-bold text-primary">#VEN-9398</td>
            <td>23/05/2024 18:45</td>
            <td>Maria Fernanda Lopez</td>
            <td class="font-weight-bold">$89.99</td>
            <td><span class="badge badge-pill badge-success">Completado</span></td>
            <td class="text-right">
              <button class="btn btn-outline-secondary btn-sm">
                <i class="fa fa-eye"></i>
              </button>
              <button class="btn btn-outline-secondary btn-sm">
                <i class="fa fa-print"></i>
              </button>
            </td>
          </tr>
          <tr>
            <td class="font-weight-bold text-primary">#VEN-9395</td>
            <td>23/05/2024 16:20</td>
            <td>Almacenes El Sol</td>
            <td class="font-weight-bold">$2,100.00</td>
            <td><span class="badge badge-pill badge-danger">Anulado</span></td>
            <td class="text-right">
              <button class="btn btn-outline-secondary btn-sm">
                <i class="fa fa-eye"></i>
              </button>
              <button class="btn btn-outline-secondary btn-sm">
                <i class="fa fa-print"></i>
              </button>
            </td>
          </tr>
          <tr>
            <td class="font-weight-bold text-primary">#VEN-9390</td>
            <td>23/05/2024 09:10</td>
            <td>Roberto Gomez</td>
            <td class="font-weight-bold">$450.00</td>
            <td><span class="badge badge-pill badge-success">Completado</span></td>
            <td class="text-right">
              <button class="btn btn-outline-secondary btn-sm">
                <i class="fa fa-eye"></i>
              </button>
              <button class="btn btn-outline-secondary btn-sm">
                <i class="fa fa-print"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <Pagination :total_paginas="total_paginas" :pagina_actual="pagina_actual" />
  </div>
  <div class="row mt-4">
    <div class="col-md-4">
      <div class="card bg-success text-white">
        <div class="card-body py-3">
          <h6 class="text-uppercase small mb-1">Total Hoy</h6>
          <h3 class="mb-0 font-weight-bold">$7,240.00</h3>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-info text-white">
        <div class="card-body py-3">
          <h6 class="text-uppercase small mb-1">Ventas Hoy</h6>
          <h3 class="mb-0 font-weight-bold">12</h3>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-warning text-dark">
        <div class="card-body py-3">
          <h6 class="text-uppercase small mb-1">Tickets Pendientes</h6>
          <h3 class="mb-0 font-weight-bold">4</h3>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped></style>
