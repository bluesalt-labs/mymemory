<template>
    <ul class="todo-list">
        <draggable v-model="items" :options="{group:'todos'}" @start="drag=true" @end="drag=false">
            <li class="todo-list-item" v-for="(item, index) in items" :key="'todo-item-' + index" ref="'todo-item-' + index" :id="'todo-item-' + index">
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
                    <textarea :id="'todo-input-' + index" v-model="item.title" @keydown="onTodoItemKeydown" @keyup="onTodoTitleChange"></textarea>
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
                            <li><a class="todo-delete-btn" href="#" @click="deleteTodoItem" :id="'todo-delete-' + index"><i class="fa fa-minus-square-o" aria-hidden="true"></i> Delete</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </draggable>
        <li class="todo-list-item">
            <div class="list-btn-container">
                <button class="btn btn-default btn-lg" @click="addTodoItem"><i class="fa fa-plus-square-o" aria-hidden="true"></i></button>
            </div>
        </li>
    </ul>
</template>

<script type="text/babel">
    import draggable from 'vuedraggable';
    // refer to this to figure out a better way to get this done: <https://vuejs.org/v2/guide/list.html> -->
    // This might help me figure out child template stuff?: <https://css-tricks.com/intro-to-vue-2-components-props-slots/>


    export default {
        components: {
            draggable
        },
        watch: {
            focusOn: function(val, oldVal) {
                console.log('focusOn Changed from: ');
                console.log(oldVal);
                console.log('to: ');
                console.log(val);

            },
        },
        mounted() {
            console.log('TodoList Component mounted.'); // debug
        },
        data() {
            return {
                defaults: {
                    type: 0
                },
                focusOn: 0,
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
                event.target.style.height = (event.target.scrollHeight)+"px";
            },
            getTodoItemIndex: function(e) {
                     if(e.target.tagName.toLowerCase() === 'textarea') {
                    return parseInt( e.target.id.replace(/todo-input-/, '') );
                }
                else if(e.target.tagName.toLowerCase() === 'li') {
                    return parseInt( e.target.id.replace(/todo-item-/, '') );
                }
                else if(e.target.className.toLowerCase() === 'todo-delete-btn') {
                    return parseInt( e.target.id.replace(/todo-delete-/, '') );
                 }
            },
            onTodoItemKeydown: function() {
                console.log(event.keyCode); // debug
                if(event.keyCode === 13 && !event.shiftKey) { this.handleEnterKey(event); }
                else if(event.keyCode === 9)    { this.handleTabKey(event); }
                else if(event.keyCode === 8)    { this.handleBackspaceKey(event); }
                else if(event.keyCode === 46)   { this.handleDeleteKey(event); }
                else if(event.keyCode === 38)   { this.handleUpArrowKey(event); }
                else if(event.keyCode === 40)   { this.handleDownArrowKey(event); }
            },
            handleEnterKey: function(e) {
                e.preventDefault();
                // todo: check if cursor is before text somehow, or at end of title value
                var todoID = this.getTodoItemIndex(e);
                this.addTodoItemAfter(todoID, true, '');

            },
            handleTabKey: function(e) {
                e.preventDefault();
                var cursorIndex = e.target.selectionStart;
                var text = e.target.value;
                e.target.value = (text.substring(0, cursorIndex) + "\t" + text.substring(cursorIndex));
                e.target.setSelectionRange(cursorIndex + 1, cursorIndex + 1);
            },
            handleBackspaceKey: function(e) {
                var todoID = this.getTodoItemIndex(e);
                if (this.items[todoID].title === '') {
                    e.preventDefault();
                    this.deleteTodoItem(todoID);
                    this.gotoTodoItem(todoID > 0 ? todoID - 1 : 0, true);
                }
            },
            handleDeleteKey: function(e) {
                this.handleBackspaceKey(e);
            },
            handleDownArrowKey: function(e) {
                e.preventDefault();
                var todoID = this.getTodoItemIndex(e);
                this.gotoTodoItem( this.getNextTodoItem(todoID) );
            },
            handleUpArrowKey: function(e) {
                e.preventDefault();
                var todoID = this.getTodoItemIndex(e);
                this.gotoTodoItem( this.getPreviousTodoItem(todoID), true );
            },
            addTodoItemBefore: function(beforeIndex, focusTo, withText) {
                this.addTodoItem(beforeIndex, false, focusTo, withText);
            },
            addTodoItemAfter: function(afterIndex, focusTo, withText) {
                this.addTodoItem(false, afterIndex, focusTo, withText);
            },
            addTodoItem: function(beforeIndex = false, afterIndex = false, focusTo = false, withText = '') {
                var type = this.defaults.type;
                var newItem = {
                    id: null,
                    type: type,
                    title: withText || '',
                    description: ''
                };
                var newIndex = 0;

                // If no index specified, add to the end of the list
                if( (!beforeIndex && !afterIndex) || ) {
                    afterIndex = (this.items.length > 0 ? this.items.length - 1 : 0);
                }

                else if(beforeIndex) {
                    // Make sure we we're placing at and not before before item id: 0
                    beforeIndex = beforeIndex > 0 ? beforeIndex : 1;

                    var nextType = parseInt(this.items[beforeIndex].type);
                    newItem.type = (nextType !== 'NaN' ? nextType : type);

                    this.items.splice(beforeIndex - 1, 0, newItem);
                    console.log('got here 1'); // debug
                }
                else if(afterIndex) {
                    // Make sure we're placing within or at the end of the array.
                    newIndex = afterIndex = (afterIndex < this.items.length ? afterIndex : this.items.length - 1);

                    var prevType = parseInt(this.items[afterIndex].type);
                    newItem.type = (prevType !== 'NaN' ? prevType : type);

                    this.items.splice(afterIndex + 1, 0, newItem);
                    console.log('got here 2'); // debug
                } else {
                    newIndex = this.items.push(newItem) - 1;
                    console.log('got here 3'); // debug
                }

                console.log('newIndex: ' + newIndex); // debug

                this.gotoTodoItem(newIndex, true);
            },
            deleteTodoItem: function(todoID) {
                if(!!todoID || parseInt(todoID) === 'NaN') {
                    todoID = this.getTodoItemIndex(event);
                }
                this.items.splice(todoID, 1);
            },
            // Moves cursor to text box for item ID specified
            gotoTodoItem: function(todoID, toTop = false) {
                if( !(!!this.items[todoID]) ) {
                    todoID = (toTop ? 0 : todoID);
                }

                var el = document.getElementById('todo-input-' + todoID);
                if(!!el) {
                    this.focusOn = todoID;
                    el.focus();
                }
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
