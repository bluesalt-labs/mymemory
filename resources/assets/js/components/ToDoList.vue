<template>
    <ul class="todo-list">
        <li class="todo-list-item" v-for="(item, index) in items" :key="item.id" :id="'todo-list-item-' + index">
            <div class="list-btn-container">
                <div class="dropdown">
                    <button class="btn btn-default btn-lg dropdown-toggle"
                            type="button" :id="'item-' + index + '-type'"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="true">
                        <span class="fa" v-html="todoListTypes[item.type].html"></span>
                    </button>
                    <ul class="dropdown-menu" :aria-labelledby="'item-' + index + '-type'">
                        <li><a href="#" @click="todoSetType(index, 0)"><i class="fa fa-circle" aria-hidden="true"></i>Task</a></li>
                        <li><a href="#" @click="todoSetType(index, 1)"><i class="fa fa-times" aria-hidden="true"></i>Task Complete</a></li>
                        <li><a href="#" @click="todoSetType(index, 2)"><i class="fa fa-angle-right" aria-hidden="true"></i>Task Migrated</a></li>
                        <li><a href="#" @click="todoSetType(index, 3)"><i class="fa fa-angle-left" aria-hidden="true"></i>Task Scheduled</a></li>
                        <li><a href="#" @click="todoSetType(index, 4)"><i class="fa fa-circle-o" aria-hidden="true"></i>Event</a></li>
                        <li><a href="#" @click="todoSetType(index, 5)"><i class="fa fa-minus" aria-hidden="true"></i>Note</a></li>
                    </ul>
                </div>
            </div>

            <div class="list-text-container">
                <!-- todo: when using backspace in this text box, if there is no text, delete it -->
                <textarea  v-model="item.title" @keydown.enter="addTodoItem" @keyup="onTodoTitleChange"></textarea>
            </div>

            <div class="list-btn-container">
                <!-- todo: for the delete function, add an archive or something? so there's an undo/ctrl+z option? -->
                <div class="dropdown">
                    <button class="btn btn-default btn-lg dropdown-toggle btn-item-menu"
                            type="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="true">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#" @click="deleteTodoItem(index)"><i class="fa fa-minus-square-o" aria-hidden="true"></i> Delete</a></li>
                    </ul>
                </div>
            </div>

        </li>
        <li class="todo-list-item">
            <div class="list-btn-container">
                <button class="btn btn-default btn-lg" @click="addTodoItem"><i class="fa fa-plus-square-o" aria-hidden="true"></i></button>
            </div>
        </li>
    </ul>
</template>

<script type="text/babel">
    // refer to this to figure out a better way to get this done: <https://vuejs.org/v2/guide/list.html> -->
    // This might help me figure out child template stuff?: <https://css-tricks.com/intro-to-vue-2-components-props-slots/>
    export default {
        mounted() {
            console.log('TodoList Component mounted.'); // debug
        },
        data() {
            return {
                defaults: {
                    type: 0
                },
                items: [
                    {
                        id: 4857583,
                        type: 1,
                        title: 'item1',
                        description: 'item 1 is an item'
                    },
                    {
                        id: 4857372,
                        type: 2,
                        title: 'item2',
                        description: 'item 2 is an item'
                    }
                ],
                todoListTypes: [
                    {
                        name: 'Task',
                        html: '<i class="fa fa-circle" aria-hidden="true"></i>',
                        char: '&#x111;'
                    },
                    {
                        name: 'Task Complete',
                        html: '<i class="fa fa-times" aria-hidden="true"></i>',
                        char: '&#x00d;'
                    },
                    {
                        name: 'Task Migrated',
                        html: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
                        char: '&#x105;'
                    },
                    {
                        name: 'Task Scheduled',
                        html: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                        char: '&#x104;'
                    },
                    {
                        name: 'Event',
                        html: '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                        char: '&#x10c;'
                    },
                    {
                        name: 'Note',
                        html: '<i class="fa fa-minus" aria-hidden="true"></i>',
                        char: '"&#x068;'
                    },
                ],
            };
        },
        methods: {
            todoSetType: function(todoID, typeID) {
                this.items[todoID].type = typeID;
            },
            onTodoTitleChange: function() {
                event.srcElement.style.height = (event.srcElement.scrollHeight)+"px";
            },
            addTodoItem: function(todoID) {
                var newTodoID;

                if(event.keyCode === 13 && !event.shiftKey) {
                    event.preventDefault();
                    if(todoID >= 0) {
                        // If to do item id is specified, add new item after it
                        // and shift others after it down
                        newTodoID = todoID + 1;
                    } else {
                        // otherwise, add to the end of the list
                        newTodoID = this.items.length;
                    }

                    var newItemType = this.defaults.type;

                    // If there is a previous item and it has a type, use that type for the new item.
                    if(this.getPreviousTodoItem(newTodoID) > 0) {
                        newItemType = this.items[this.getPreviousTodoItem(newTodoID)].type;
                    }

                    this.items.push({
                        type: newItemType
                    });

                    /*
                    var object = this.items[newTodoID]; // debug
                    Vue.nextTick(() => {
                        object.focus();
                    });
                    */

                    /* <using something like this? I don't know what's going on...
                    Vue.directive('focus', {
                        bind: function() {
                            var object = event.
                        }
                    });
                    this.gotoTodoItem(newTodoID);
                    */
                } else { this.onTodoTitleChange(event); } // you would think this wouldn't be needed, but whatever
            },
            deleteTodoItem: function(todoID) {
                //delete this.data[todoID];
                this.data.splice(todoID, 1); // use this instead?
            },
            // todo: add the ability to drag the order of the items around
            gotoTodoItem: function(todoID) {
                // Moves cursor to text box for item ID specified
                // todo: add @keyup.tab="gotoTodoItem(index + 1)" to todo items
                // todo: add @keyup.shift.tab="gotoTodoItem(index - 1)" to todo items

                /* debug */
                Vue.nextTick(() => {
                    //console.log(this.$refs); // debug
                    //this.$refs[todoID].focus();
                });
                /* end debug */
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
        }
    }
</script>
