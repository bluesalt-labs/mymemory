<template>
    <div id="user-app-container">
        <Sidebar></Sidebar>
        <router-view id="page-content"></router-view>
    </div>
</template>

<script>
    import Sidebar from '../user-app/Sidebar'
    export default {
        name: 'app',
        components: { Sidebar }
    }
</script>

<style lang="scss" type="text/scss">
    @import '../../sass/_variables.scss';
    #user-app-container > #page-content {
        margin: 0;
        padding: 10px 20px;
        -webkit-transition: margin $sidebar-trans-time;
        transition: margin $sidebar-trans-time;
    }
    
    @media(min-width: 768px) {
        #user-app-container > #page-content {
            margin-left: $sidebar-width;
        }
    }

</style>