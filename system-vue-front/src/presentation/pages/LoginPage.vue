<script setup lang="ts">
import "@/assets/css/login.css";
import { loginService } from "@/domain/services/auths.service";
import { useAuthStore } from "@/domain/storage/auth";
import { useRouter } from "vue-router";
import { alertSuccess, alertError } from "@/shared/utils/alerts";
import { reactive } from "vue";

const authStore = useAuthStore();
const router = useRouter();

const formLogin = reactive({
  username: "",
  password: "",
});

const login = async (username: string, password: string) => {
  loginService(username, password)
  .then(async (response:any) => {
    if (response.status == 'success') {
      authStore.setUser(response.data);
      authStore.setToken(response.token);
      await alertSuccess('Inicio de sesión exitoso');
      router.push("/system");
    }else{
        await alertError(response.message);
    }
  });
};

const handleSubmit = (e: Event) => {
  e.preventDefault();
  login(formLogin.username, formLogin.password);
};




</script>

<template>
  <div class="content-login">
    <div class="login-container">
      <div class="login-box">
        <h2>Iniciar Sesión</h2>
        <form @submit="handleSubmit">
          <div class="input-group">
            <label for="username">Usuario</label>
            <input type="text" name="username" required 
              v-model="formLogin.username"
            />
          </div>
          <div class="input-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required 
              v-model="formLogin.password"
            />
          </div>
          <button type="submit">Ingresar</button>
        </form>
        <div class="links">
          <a href="/home">¿Olvidaste tu contraseña?</a>
          <a href="/home/register">Regístrate</a>
        </div>
      </div>
    </div>
  </div>
</template>
