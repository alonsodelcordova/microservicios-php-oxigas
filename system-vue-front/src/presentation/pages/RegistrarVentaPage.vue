<script setup lang="ts">
import Pagination from '@/shared/components/Pagination.vue';
import { useRouter } from "vue-router";

const router = useRouter();
const pagina_actual = parseInt(router.currentRoute.value.query.pagina as string) || 1;
const total_paginas = 10;

</script>

<template>
    <div class="row">
        <div class="col-lg-8">
            <div class="card lg-3">
                <div class="card-body p-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white border-right-0">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                        <input class="form-control border-left-0"
                            placeholder="Buscar productos por nombre o SKU... (F4)" type="text" />
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary d-flex align-items-center" type="button">
                                <i class="fa fa-barcode"></i>
                                Escanear
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <div class="row">
                    <div class="col-6 col-lg-3 mb-4">
                        <div class="card product-card h-100">
                            <div class="product-img" style="background-image: url('<?= $producto['url_imagen'] ?>');">
                            </div>
                            <span class="badge badge-light badge-stock text-primary shadow-sm">Stock: 12</span>

                            <div class="card-body p-2">
                                <h6 class="card-title mb-1 text-truncate">
                                    Nombre
                                </h6>
                                <p class="small text-muted mb-2">SKU: PR-
                                    99
                                </p>
                                <h5 class="text-primary mb-0">S/.
                                    10
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <Pagination :total_paginas="total_paginas" :pagina_actual="pagina_actual" />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card cart-container">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-bold">Orden Actual</h5>
                    <button class="btn btn-sm btn-link text-danger p-0">Vaciar</button>
                </div>
                <div class="p-3 bg-light border-bottom">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-user text-muted mr-2"></i>
                        <div class="flex-grow-1">
                            <small class="text-muted d-block">Cliente</small>
                            <span class="font-weight-bold">Venta al Público (C-001)</span>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary">
                            <i class="fa fa-edit"></i>
                        </button>
                    </div>
                </div>
                <div class="cart-items p-0">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="cart-item-img mr-3"
                                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBKwY-zwK-R7mjW8uRj7eGZS2yqDjX4ssTfFtSbHrMTZR8w6JDChp33gUt6oHD-Z1R6sXklIs3M0yDQ4qFSb-vfrz9CqYBNgxCiwi3cl9fibcUb0EYyFceHuteROV8wlnS-eu2o1yXD9DRveEJh4Ic2KVUFQ_Lhm-MYYrBk7xKmUzAHUHRPTf734dBw6eXprg7npyW76ZRmvi4bFMx1jUF_ui9HftRmZ_Vuyyc8PbS48VvMvx1HukEIseL08KT40JcDVox2KjgbSDv2');">
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 text-truncate" style="max-width: 150px;">Wireless Mouse Pro</h6>
                                    <button class="btn btn-sm text-muted p-0">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-outline-secondary" type="button">-</button>
                                        <button class="btn btn-light disabled font-weight-bold" type="button">2</button>
                                        <button class="btn btn-outline-secondary" type="button">+</button>
                                    </div>
                                    <span class="font-weight-bold">S/. 50.00</span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="cart-item-img mr-3"
                                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDTx8I1cBwbB2U0KFJEAG8qMu9guxL5ARnkHjxoH4yiSRLS3G8VXZvWmzRNim4JMu774PooTHtd82m0O6syPP5xGOozgguRduOjIlJkZC4cU_aPXRUO1eK5gp0pnMM7fXT8evKv2Bh_hVVA8p8Y4HkFKswAB68FTwVH36Ytb3OfusA4FI5usNhf4kp73JFgIIvetgIkpHXgA-6xB4C0gD0BX0RuDxXdMJr0O4OBeF63Zy4WfpiG3_duVWmFD1RCKKD1A11WAG5aU_9s');">
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 text-truncate" style="max-width: 150px;">Monitor 24" Full HD</h6>
                                    <button class="btn btn-sm text-muted p-0">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-outline-secondary" type="button">-</button>
                                        <button class="btn btn-light disabled font-weight-bold" type="button">1</button>
                                        <button class="btn btn-outline-secondary" type="button">+</button>
                                    </div>
                                    <span class="font-weight-bold">S/. 180.00</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-footer sticky-summary border-0">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Subtotal</span>
                        <span>S/. 230.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Impuestos (16%)</span>
                        <span>S/. 36.80</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-end mt-3 mb-4">
                        <h5 class="mb-0">Total</h5>
                        <h2 class="text-primary font-weight-black mb-0">S/. 266.80</h2>
                    </div>
                    <div class="row no-gutters mb-3">
                        <div class="col-6 pr-1">
                            <button
                                class="btn btn-outline-secondary btn-block d-flex align-items-center justify-content-center py-2">
                                <i class="fa fa-percent mr-2"></i>
                                Descuento
                            </button>
                        </div>
                        <div class="col-6 pl-1">
                            <button
                                class="btn btn-outline-secondary btn-block d-flex align-items-center justify-content-center py-2">
                                <i class="fa fa-file mr-2"></i>
                                Nota
                            </button>
                        </div>
                    </div>
                    <button
                        class="btn btn-success btn-lg btn-block py-3 d-flex align-items-center justify-content-center">
                        <i class="fa fa-money mr-2"></i>
                        <strong>PAGAR</strong>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>