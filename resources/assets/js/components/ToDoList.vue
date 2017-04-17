<template>
    <ul id="todo-list">
        <li class="todo-list-item" v-for="item in items" v-bind:id="'todo-list-item-' + item.id">
            <div class="list-btn-container">
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
            </div>

            <div class="list-text-container">
                <!-- todo: when using backspace in this text box, if there is no text, delete it -->
                <input type="text" v-model="item.title" @keyup.enter="addTodoItem(item.id)" />
            </div>

            <div class="list-btn-container">
                <!-- todo: for the delete function, add an archive or something? so there's an undo/ctrl+z option? -->
                <button class="btn btn-default btn-lg btn-delete" @click="deleteTodoItem(item.id)"><i class="fa fa-minus-square-o" aria-hidden="true"></i></button>
            </div>

        </li>
        <li class="todo-list-item">
            <div class="list-btn-container">
                <button class="btn btn-default btn-lg" @click="addTodoItem()"><i class="fa fa-plus-square-o" aria-hidden="true"></i></button>
            </div>
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
                defaults: {
                    type: 0
                },
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
                },
                addTodoItem: function(afterTodoID) {
                    var newItemID;

                    if(afterTodoID >= 0) {
                        // If to do item id is specified, add new item after it
                        // and shift others after it down
                        newItemID = afterTodoID + 1;
                    } else {
                        // otherwise, add to the end of the list
                        newItemID = this.items.length;
                    }

                    // for now, only allow adding to the end of the list
                    // todo: fix this!
                    newItemID = this.items.length; // debug
                    console.log("new item ID is ID # " + newItemID + '.'); // debug

                    var newItemType = this.defaults.type;

                    // If there is a previous item and it has a type, use that type for the new item.
                    if(this.getPreviousTodoItem(newItemID) > 0) {
                        newItemType = this.items[this.getPreviousTodoItem(newItemID)].type;
                    }

                    this.items.push({
                        id: newItemID,
                        type: newItemType
                    });

                    this.gotoTodoItem(newItemID);
                },
                deleteTodoItem: function(todoID) {

                },
                // todo: add the ability to drag the order of the items around
                gotoTodoItem: function(todoID) {
                    // Moves cursor to text box for item ID specified
                    // todo: add @keyup.tab="gotoTodoItem(item.id + 1)" to todo items
                    // todo: add @keyup.shift.tab="gotoTodoItem(item.id - 1)" to todo items
                },
                getPreviousTodoItem: function(todoID) {
                    var prevID = todoID - 1;
                    if( !(prevID in this.items) ) { prevID = -1; }

                    return prevID;
                },
                getNextTodoItem: function(todoID) {
                    var nextID = todoID + 1;
                    if( !(nextID in this.items) ) { nextID = -1; }

                    return nextID;
                }
            };
        }
    }


</script>
