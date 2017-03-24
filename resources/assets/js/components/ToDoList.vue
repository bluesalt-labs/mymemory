<template>
    <ul id="todo-list">
        <li class="todo-list-item" v-for="item in items" v-bind:id="item.id">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle"
                        type="button" v-bind:id="'item-' + item.id + '-type'"
                        data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="true">
                    Dropdown<span class="caret"></span>
                </button>
            </div>

            <ul class="dropdown-menu" v-bind:aria-labelledby="'item-' + item.id + '-type'">
                <ul><a href="#"><!-- value="0" purpose="Task"-->&#xf10c;</a></ul>
                <ul><a href="#"><!-- value="1" purpose="Task Complete"-->&#xf00d;</a></ul>
                <ul><a href="#"><!-- value="2" purpose="Task Migrated"-->&#xf060;</a></ul>
                <ul><a href="#"><!-- value="3" purpose="Task Scheduled"-->&#xf061;</a></ul>
                <ul><a href="#"><!-- value="4" purpose="Event"-->&#xf10c;</a></ul>
                <ul><a href="#"><!-- value="5" purpose="Note"-->-</a></ul>
            </ul>
            <!--
            <select v-bind:value="item.type">
                <option class="type-task" value="0"><!--purpose="Task"-- >&#xf10c;</option>
                <option class="type-task" value="1"><!--purpose="Task Complete"-- >&#xf00d;</option>
                <option class="type-task" value="2"><!--purpose="Task Migrated"-- >&#xf060;</option>
                <option class="type-task" value="3"><!--purpose="Task Scheduled"-- >&#xf061;</option>
                <option class="type-task" value="4"><!--purpose="Event"-- >&#xf10c;</option>
                <option class="type-task" value="5"><!--purpose="Note"-- >-</option>
            </select>
            -->
            <input type="text" v-bind:value="item.title" />
        </li>
    </ul>
</template>

<script type="text/babel">
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                items: [
                    {
                        id: 0,
                        type: 1,
                        title: 'item1',
                        description: 'item 1 is an item'
                    },
                    {
                        id: 1,
                        type: 2,
                        title: 'item2',
                        description: 'item 2 is an item'
                    },
                ]
            };
        }
    }
</script>
