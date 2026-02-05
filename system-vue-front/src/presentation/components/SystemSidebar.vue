<script setup lang="ts">
import { useRouter } from "vue-router";
import { useAuthStore } from "@/domain/storage/auth";
import { alertConfirm } from "@/shared/utils/alerts";

const router = useRouter();
const authStore = useAuthStore();

const logout = async () => {
  const result = await alertConfirm(
    "Confirmación",
    "¿Estás seguro que deseas cerrar sesión?"
  );
  if (result.isConfirmed) {
    authStore.clearUser();
    router.push("/login");
  }
};

const menus = [
  { path: "/system/home", name: "Dashboard", icon: "fa-dashboard" },
  { path: "/system/productos", name: "Productos", icon: "fa-cart-plus" },
  { path: "/system/ingresos", name: "Ingresos", icon: "fa-table" },
  { path: "/system/ventas", name: "Ventas", icon: "fa-shopping-cart" },
  { path: "/system/usuarios", name: "Usuarios", icon: "fa-users" },
  { path: "/system/clientes", name: "clientes", icon: "fa-users" },
  { path: "/system/config", name: "Settings", icon: "fa-cog" },
];
</script>
<template>
  <nav id="sidebar">
    <div class="sidebar-header d-flex align-items-center">
      <i class="mr-2 text-primary fa fa-database"></i>
      <h5 class="mb-0">ERP System</h5>
    </div>
    <div class="list-group list-group-flush mt-3" v-for="menu in menus">
      <router-link :class="'list-group-item list-group-item-action '+(menu.path == $route.path ? 'active' : '')"
        :to="menu.path">
        <i :class="'fa ' + menu.icon"></i> {{ menu.name }}
      </router-link>
    </div>
    <div class="p-3 mt-auto">
      <button class="btn btn-primary btn-block" @click="logout">
        <i class="fa fa-sign-out"></i> Cerrar Sesión
      </button>
    </div>
  </nav>
</template>

<style>
#sidebar {
  min-width: 250px;
  max-width: 250px;
  min-height: 100vh;
  background-color: #343a40;
  color: #fff;
  position: fixed;
  transition: all 0.3s;
  z-index: 1040;
}
</style>
