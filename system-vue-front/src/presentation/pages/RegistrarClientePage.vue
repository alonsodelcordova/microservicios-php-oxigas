<script setup lang="ts">
    import { reactive } from 'vue';
    
    interface FormData {
        nombre: string;
        apellido: string;
        email: string;
        telefono: string;
    }
    const formData = reactive<FormData>({
        nombre: '',
        apellido: '',
        email: '',
        telefono: ''
    });

    const submitForm = async (e: Event) => {
        e.preventDefault();
        console.log(formData.apellido);
    }

</script>
<template>

    <div class="container p-3">

        <router-link to="/system/clientes" class="btn btn-primary mb-2">
            <i class="fa fa-arrow-left"></i> Volver
        </router-link>
        <h2>Crear Cliente</h2>



        <form  @submit="submitForm">
            <div class="form-group my-2">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" 
                v-model="formData.nombre" required>
            </div>
            <div class="form-group my-2">
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido" class="form-control"
                v-model="formData.apellido" required>
            </div>
            <div class="form-group my-2">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" 
                v-model="formData.email" required>
            </div>
            <div class="form-group my-2">
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" class="form-control" 
                v-model="formData.telefono" required>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success btn-lg">
                    <i class="fa fa-save"></i> Guardar
                </button>
            </div>

        </form>
    </div>



</template>