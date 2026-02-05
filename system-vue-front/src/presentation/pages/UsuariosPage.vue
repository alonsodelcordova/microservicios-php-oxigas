<script setup lang="ts">
  import { useRouter } from "vue-router";
  import Pagination from "@/shared/components/Pagination.vue";
  const router = useRouter();
  const pagina_actual = parseInt(router.currentRoute.value.query.pagina as string) || 1;
  const total_paginas = 10;
</script>

<template>
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h1 class="h3 font-weight-bold mb-0">Gestión de Usuarios</h1>
      <p class="text-muted small mb-0">
        Administre el personal que tiene acceso al sistema.
      </p>
    </div>
    <button
      class="btn btn-primary d-flex align-items-center px-4"
      data-target="#addUserModal"
      data-toggle="modal"
    >
      <i class="fa fa-plus mr-2"></i>
      Nuevo
    </button>
  </div>
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0 font-weight-bold">Lista de Usuarios</h5>
      <div class="input-group input-group-sm w-25">
        <input class="form-control" placeholder="Buscar usuario..." type="text" />
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th class="pl-4">Usuario</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Último Login</th>
            <th class="text-right pr-4">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="pl-4 align-middle">
              <div class="d-flex align-items-center">
                <img
                  alt="User"
                  class="user-avatar mr-3"
                  src="https://lh3.googleusercontent.com/aida-public/AB6AXuDXJ12R6jDjm6vcR-C2GUx6nl0jTYpdKCOeJE8OoBc5exyBj3XmZk2fOwV-IUxJQ9Y98XAKH0k8dDhPC9u2DMzzV7NCEg02pW28vdMAk4ohZGZwK5GXqoa6aHkc84a1aq62o1s63l2K5xCttDCPjYhuneohPxbDL8DZjg2c0f1EjvUIUtD3Gn55EQj03erUOeXjWu0OjV7jvG_aZHBtYil0Ncp_La1BBBKeQnz1jkxGa6xP2U6trocM-X01FxaogfDDUbTp9DYrsVeo"
                  width="100"
                  height="100"
                />
                <div>
                  <div class="font-weight-bold text-dark">
                    Nombre
                  </div>
                  <div class="small text-muted">
                    correo@correo.com
                  </div>
                </div>
              </div>
            </td>
            <td class="align-middle">
              <span class="badge badge-pill badge-primary"> USER </span>
            </td>
            <td class="align-middle">
              <span class="status-indicator bg-success"></span>
              <small class="font-weight-bold text-success">Activo</small>
            </td>
            <td class="align-middle text-muted small">Hace 12 minutos</td>
            <td>
              <button
                class="btn btn-sm btn-light"
                data-target="#editPermissionsModal"
                data-toggle="modal"
                title="Editar Permisos"
              >
                <i class="fa fa-shield"></i>
              </button>
              <button class="btn btn-sm btn-light" title="Editar">
                <i class="fa fa-edit"></i>
              </button>
              <button class="btn btn-sm btn-light text-danger" title="Eliminar">
                <i class="fa fa-trash"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <Pagination :total_paginas="total_paginas" :pagina_actual="pagina_actual" />
  </div>

  <div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold">Añadir Nuevo Usuario</h5>
          <button class="close" data-dismiss="modal" type="button">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="font-weight-bold">Nombre Completo</label>
                <input
                  class="form-control"
                  placeholder="Ej. Juan Pérez"
                  type="text"
                  value="Juan Pérez"
                />
              </div>
              <div class="form-group col-md-6">
                <label class="font-weight-bold">Correo Electrónico</label>
                <input
                  class="form-control"
                  placeholder="ejemplo@correo.com"
                  type="email"
                  value="juan.perez@empresa.com"
                />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label class="font-weight-bold">Rol del Sistema</label>
                <select class="custom-select">
                  <option selected="" value="1">Administrador</option>
                  <option value="2">Cajero</option>
                  <option value="3">Supervisor</option>
                  <option value="4">Inventarios</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label class="font-weight-bold">Sucursal</label>
                <select class="custom-select">
                  <option selected="">Matriz Centro</option>
                  <option>Sucursal Norte</option>
                  <option>Sucursal Sur</option>
                </select>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-light" data-dismiss="modal" type="button">
            Cancelar
          </button>
          <button class="btn btn-primary" type="button">Guardar Usuario</button>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped></style>
