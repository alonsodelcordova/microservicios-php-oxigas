
<script setup lang="ts">
import SystemHeader from '@/presentation/components/SystemHeader.vue'
import SystemSidebar from '@/presentation/components/SystemSidebar.vue'

</script>

<template>
    <div class="wrapper">
        <SystemSidebar />
        <div id="content">
            
            <SystemHeader />

            <main class="container-fluid py-4 px-4">
                <router-view />
            </main>
        </div>
    </div>
    
  
</template>

<style scoped>
</style>