<template>
    <div class="dashboard-container">
        <div class="section">
            <h1>To Do List</h1>
            <ToDoList></ToDoList>
        </div>
        <hr />
        <div class="section">
            <h1>Journal</h1>
            <Journal></Journal>
        </div>
        <hr />
        <div class="section">
            <h1>Calendar</h1>
            <Calendar></Calendar>
        </div>
        <hr />
        <div class="section">
            <h1>Notes</h1>
            <NoteItem></NoteItem>
        </div>
    </div>
</template>

<script type="text/javascript">
    import ToDoList from '../components/ToDoList'
    import Journal from '../components/Journal'
    import Calendar from '../components/Calendar'
    import NoteItem from '../components/NoteItem'

    export default {
        name: 'dashboard',
        components: { ToDoList, Journal, Calendar, NoteItem }
    }
</script>
