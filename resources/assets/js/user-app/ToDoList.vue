<template>
    <div class="section">
        <ToDoList></ToDoList>
    </div>
</template>

<script type="text/javascript">
    import ToDoList from '../components/ToDoList'
    export default {
        name: 'todo-list',
        components: { ToDoList }
    }
</script>
