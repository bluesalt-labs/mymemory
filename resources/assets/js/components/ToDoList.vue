<template>
    <ul id="todo-list">
        <li class="todo-list-item" v-for="item in items" v-bind:id="'todo-list-item-' + item.id">
            <div class="dropdown">
                <button class="btn btn-default btn-lg dropdown-toggle"
                        type="button" v-bind:id="'item-' + item.id + '-type'"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="true">
                    <span class="fa" v-html="todoListTypes[item.type].html"></span>
                </button>
                <ul class="dropdown-menu" v-bind:aria-labelledby="'item-' + item.id + '-type'">
                    <li><a href="#" @click="todoSetType(item.id, 0)"><i class="fa fa-circle" aria-hidden="true"></i>Task</a></li>
                    <li><a href="#" @click="todoSetType(item.id, 1)"><i class="fa fa-times" aria-hidden="true"></i>Task Complete</a></li>
                    <li><a href="#" @click="todoSetType(item.id, 2)"><i class="fa fa-angle-right" aria-hidden="true"></i>Task Migrated</a></li>
                    <li><a href="#" @click="todoSetType(item.id, 3)"><i class="fa fa-angle-left" aria-hidden="true"></i>Task Scheduled</a></li>
                    <li><a href="#" @click="todoSetType(item.id, 4)"><i class="fa fa-circle-o" aria-hidden="true"></i>Event</a></li>
                    <li><a href="#" @click="todoSetType(item.id, 5)"><i class="fa">-</i>Note</a></li>
                </ul>
            </div>

            <input type="text" v-model="item.title" />
        </li>
    </ul>
</template>

<script type="text/babel">
    export default {
        mounted() {
            console.log('Component mounted.');
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
                ],
                todoListTypes: [
                    {
                        id: 0,
                        name: 'Task',
                        html: '<i class="fa fa-circle" aria-hidden="true"></i>',
                        char: '&#x111;'
                    },
                    {
                        id: 1,
                        name: 'Task Complete',
                        html: '<i class="fa fa-times" aria-hidden="true"></i>',
                        char: '&#x00d;'
                    },
                    {
                        id: 2,
                        name: 'Task Migrated',
                        html: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
                        char: '&#x105;'
                    },
                    {
                        id: 3,
                        name: 'Task Scheduled',
                        html: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                        char: '&#x104;'
                    },
                    {
                        id: 4,
                        name: 'Event',
                        html: '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                        char: '&#x10c;'
                    },
                    {
                        id: 5,
                        name: 'Note',
                        html: '-'
                    },
                ],
                todoSetType: function(todoID, typeID) {
                    this.items[todoID].type = typeID;
                }
            };
        }
    }


</script>
