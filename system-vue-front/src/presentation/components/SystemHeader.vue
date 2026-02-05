<script setup lang="ts">
</script>
<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="d-lg-flex justify-content-end w-100">
      <ul class="navbar-nav align-items-center">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fa fa-question"></i>
          </a>
        </li>
        <li class="nav-item position-relative">
          <a class="nav-link" href="#">
            <i class="fa fa-bell"></i>
            <span
              class="badge badge-danger badge-pill position-absolute"
              style="top: 2px; right: 2px; font-size: 8px"
              > </span
            >
          </a>
        </li>
        <li class="nav-item dropdown ml-3">
          <a
            class="nav-link dropdown-toggle d-flex align-items-center"
            data-toggle="dropdown"
            href="#"
            id="userDropdown"
            role="button"
          >
            <div class="text-right mr-2 d-none d-sm-block">
              <div class="small font-weight-bold mb-0">Alex Rivera</div>
              <div class="text-muted small" style="font-size: 10px">Store Manager</div>
            </div>
            <img
              alt="Profile"
              class="avatar-img"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuAmfcWv-1t56fMIchN7r8L7874e9rZ3V75DiNeEyltlRbJdK4-inZCheorm6HSMuHDn3gT5MjiK33uSpgpOLLExdcc0Id5_jTvJIIxaD0eaxJUADP5OENG_t_lqSEnrawhoFMmdjhuiBO6VTVkzGzz6eKum8sauYon3odsDITmq3ool4AH-3mMmq1s16xRWG0qkSmeqF1Xt4oFyDwEY6rGwpPBLGXuFfcGiGrk2rpFi9jdZbQU3YJvu0EnEakYTSOr_6TmZxeHhFHj9"
            />
          </a>
        </li>
      </ul>
    </div>
  </nav>
</template>
