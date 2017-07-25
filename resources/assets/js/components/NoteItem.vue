<template>
    <div class="note-item">
        <editable class="note-item-title" :id="'note-title-' + noteid" :content="title" @update="text = $event"></editable>
        <editable class="note-item-content" :id="'note-content-' + noteid" :content="content" @update="text = $event"></editable>
    </div>
</template>

<script type="text/babel">

    export default {
        components: {
            editable: {
                template: '<div contenteditable="true" aria-multiline="true" role="textbox" spellcheck="true" @input="update"><!--@mousedown="editMouseDown" @mouseup="editMouseUp"-->{{ content }}</div>',
                props: ['content'],
                /*
                mounted: function() {
                    this.$el.innerText = this.content;
                },
                */
                methods: {
                    update: function(e) {
                        this.$emit('update', e.target.innerHTML);
                    },
                    editMouseDown: function(e) {
                        e.target.parentElement.draggable = false;
                        e.target.focus();
                    },
                    editMouseUp: function(e) {
                        e.target.parentElement.draggable = true;
                    }
                }
            }
        },
        props: {
            index: {
                type: Number,
                required: true
            },
            noteid: Number,
            title: {
                type: String,
                default: ''
            },
            content: {
                type: String,
                default: ''
            }
        },
        methods: {
            update: function(e) {
                console.log(e); // debug
                //this.$emit('update', e.target.innerHTML);
            },
        }
    };
</script>

<style lang="scss" type="text/scss">
    @import '../../sass/_variables.scss';
    .note-item {
        display: flex;
        flex-direction: column;
        border: 1px solid $panel-default-border;
        background: rgba($panel-default-border, 0.25);
        min-width: 250px;
        min-height: 250px;
        width: auto;
        height: auto;
        margin: 5px;
        padding: 5px 10px;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        font-size: 12px;
    }

    .note-item .note-item-title,
    .note-item .note-item-content {
        background: transparent;
        display: block;
        border: none;
        outline: none;
        width: 100%;
        cursor: text;
        overflow: hidden;
        resize: none;
        padding: 5px;
    }
    .note-item .note-item-title {
        font-weight: bold;
        font-size: 1.5em;
        padding-bottom: 7px;
        border-bottom: 1px solid transparent;
    }
    .note-item .note-item-content {
        flex: 1;
        height: 100%;
        font-size: 1.2em;
    }

    .note-item .note-item-title:hover,
    .note-item .note-item-title:focus,
    .note-item .note-item-title:active{
        border-color: $input-border;
    }
</style>