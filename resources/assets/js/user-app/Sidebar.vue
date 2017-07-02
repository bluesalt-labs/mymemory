<template>
    <nav id="user-sidebar">
        <ul id="sidebar-links">
            <li><a href="/app/#/dashboard">Dashboard</a></li>
        </ul>
    </nav>
</template>

<script type="text/javascript">
    export default {
        name: 'sidebar'
    }
</script>

<style type="text/css">
    #user-sidebar {
        left: 0;
        z-index: 9999;
        position: fixed;
        top: 50px;
        width: 250px;
        height: 100%;
        padding: 0;
        margin: 0;
        background: #f8f8f8;
        border-top: 1px solid #e7e7e7;
    }

    #user-app-container #sidebar-links {
        list-style: none;
        padding: 0;
        margin: 0;
        width: 250px;
        display: block;
        height: 100%;
    }
    #user-app-container #sidebar-links li.active { background: #dcdcdc; }
    #user-app-container #sidebar-links li { border-bottom: 1px solid #dcdcdc; }
    #user-app-container #sidebar-links li > a {
        display: block;
        height: 40px;
        padding: 5px 15px;
        line-height: 30px;
        color: #222;
    }
    #user-app-container #sidebar-links li > a:active,
    #user-app-container #sidebar-links li > a:focus,
    #user-app-container #sidebar-links li > a:hover {
        background: #cecece;
        text-decoration: none;
        cursor: pointer;
    }


</style>