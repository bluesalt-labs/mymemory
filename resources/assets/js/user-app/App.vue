<template>
    <div id="user-app-container">
        <Sidebar></Sidebar>
        <router-view class="container-fluid" id="page-content"></router-view>
    </div>
</template>

<script>
    import Sidebar from '../user-app/Sidebar'
    export default {
        name: 'app',
        components: { Sidebar }
    }
</script>