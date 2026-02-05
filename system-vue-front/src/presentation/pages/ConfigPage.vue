<script setup lang="ts">
import { onMounted, ref, reactive } from 'vue';
import { EmpresaService } from '@/domain/services/empresa.service';
import { Empresa, DIGIDES, Configuracion } from '@/domain/types/empresa.types';

const monedas = ref<Configuracion[]>([]);
const timezones = ref<Configuracion[]>([]);
const isLoading = ref(true);

const empresa = reactive<Empresa>({
  nombre: '',
  ident_fiscal: '',
  direccion: '',
  moneda: '',
  zona_horaria: '',
  is_alert_inventar_bajo: false,
  is_modo_offline: false,
});

onMounted(() => {
  consultarDigides();
  infoEmpresa();
});

const consultarDigides = async () => {
  await EmpresaService.consultarConfiguraciones(
    [DIGIDES.MONEDAS, DIGIDES.ZONA_HORARIA]
  ).then((response: any) => {
      var datos = response.data as Configuracion[];
      monedas.value = datos.filter(dato => dato.cod_prim == DIGIDES.MONEDAS && dato.cod_sec != null);
      timezones.value = datos.filter(dato => dato.cod_prim == DIGIDES.ZONA_HORARIA && dato.cod_sec != null);
  });
}

const infoEmpresa = async () => {
  await EmpresaService.infoEmpresa().then((response: any) => {
    empresa.nombre = response.nombre;
    empresa.ident_fiscal = response.ident_fiscal;
    empresa.direccion = response.direccion;
    empresa.moneda = response.moneda;
    empresa.zona_horaria = response.zona_horaria;
    empresa.is_alert_inventar_bajo = response.is_alert_inventar_bajo == 1;
    empresa.is_modo_offline = response.is_modo_offline == 1;
    isLoading.value = false;
  });
};




</script>

<template>
  <div class="mb-4">
    <h1 class="h3 font-weight-bold">Configuración del Sistema</h1>
    <p class="text-muted">
      Gestione la información básica, usuarios y preferencias de su negocio.
    </p>
  </div>

  <div class="card mb-4">
    <div class="card-header">
      <h5 class="mb-1 font-weight-bold">Información de la Empresa</h5>
      <p class="text-muted small mb-0">
        Estos datos aparecerán en sus facturas y reportes oficiales.
      </p>
    </div>
    <div class="card-body p-4">
      <form>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label class="small font-weight-bold text-muted" for="businessName">Nombre Comercial</label>
            <input class="form-control" id="businessName" type="text" v-model="empresa.nombre" />
          </div>
          <div class="form-group col-md-6">
            <label class="small font-weight-bold text-muted" for="taxId">RFC / Identificación Fiscal</label>
            <input class="form-control" id="taxId" type="text" v-model="empresa.ident_fiscal" />
          </div>
        </div>
        <div class="form-group">
          <label class="small font-weight-bold text-muted" for="address">Dirección Fiscal</label>
          <textarea class="form-control" id="address" rows="3" v-model="empresa.direccion"></textarea>
          <small class="form-text text-muted">Incluya calle, número, colonia y código postal.</small>
        </div>
        <hr class="my-4" />
        <div class="form-row">
          <div class="form-group col-md-6">
            <label class="small font-weight-bold text-muted" for="currency">Moneda Base</label>
            <select class="custom-select" id="currency" v-model="empresa.moneda">
              <option v-for="moneda in monedas" :key="moneda.cod_sec" :value="moneda.cod_sec">
                {{ moneda.nombre }}
              </option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label class="small font-weight-bold text-muted" for="timezone">Zona Horaria</label>
            <select class="custom-select" id="timezone" v-model="empresa.zona_horaria">
              <option v-for="timezone in timezones" :key="timezone.cod_sec" :value="timezone.cod_sec">
                {{ timezone.nombre }}
              </option>
            </select>
          </div>
        </div>
        <hr class="my-4" />
        <h6 class="text-muted small font-weight-bold text-uppercase mb-3">
          Preferencias del Sistema
        </h6>
        <div class="card bg-light border-0 mb-2">
          <div class="card-body d-flex justify-content-between align-items-center py-3">
            <div class="d-flex align-items-center">
              <i class="fa fa-info-circle text-primary mr-3"></i>
              <div>
                <p class="mb-0 font-weight-bold small">Alertas de Inventario Bajo</p>
                <small class="text-muted">Notificar cuando el stock sea menor al punto de reorden.</small>
              </div>
            </div>
            <div class="custom-control custom-switch">
              <input class="custom-control-input" id="switch1" type="checkbox"
                v-model="empresa.is_alert_inventar_bajo" />
              <label class="custom-control-label" for="switch1"></label>
            </div>
          </div>
        </div>
        <div class="card bg-light border-0 mb-4">
          <div class="card-body d-flex justify-content-between align-items-center py-3">
            <div class="d-flex align-items-center">
              <i class="fa fa-plug text-primary mr-3"></i>
              <div>
                <p class="mb-0 font-weight-bold small">Modo Offline (Sincronización)</p>
                <small class="text-muted">Permite realizar ventas sin conexión a internet.</small>
              </div>
            </div>
            <div class="custom-control custom-switch">
              <input class="custom-control-input" id="switch2" type="checkbox" v-model="empresa.is_modo_offline" />
              <label class="custom-control-label" for="switch2"></label>
            </div>
          </div>
        </div>
        <div class="pt-4">
          <button class="btn btn-primary px-4 font-weight-bold" type="submit">
            <i class="fa fa-save mr-1"></i> Guardar
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<style scoped></style>
