<script setup lang="ts">
    import './../assets/css/login.css'
    import { login } from '@/services/auths.service'


    const login = async (username: string, password: string) => {
      const response = await login(username, password) as any
      if (response.status === 'success') {
        console.log(response.data)
      }

    }

    const handleSubmit = async (e: Event) => {
      e.preventDefault()
      const form = e.target as HTMLFormElement
      const username = form.username.value
      const password = form.password.value

      await login(username, password)

    }

</script>

<template>
     <div class="content-login">
        <div class="login-container">
            <div class="login-box">
                <h2>Iniciar Sesión </h2>
                <form @submit="handleSubmit">
                    <div class="input-group">
                        <label for="username">Usuario</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" required>
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