<template>
    <div class="note-item" :id="'note-item-' + note.id">
        <editable class="note-item-title" :id="'note-title-' + note.id" :content="note.title" @update="text = $event"></editable>
        <editable class="note-item-content" :id="'note-content-' + note.id" :content="note.content" @update="text = $event"></editable>
    </div>
</template>

<script type="text/babel">

    export default {
        components: {
            editable: {
                template: '<div contenteditable="true" aria-multiline="true" role="textbox" spellcheck="true" @input="update" @click="onEditableClick"></div>',
                props: ['value'],
                mounted: function() {
                    this.$el.innerText = this.value;
                },
                methods: {
                    update: function(event) {
                        this.$emit('update', event.target.innerText);
                    },
                    onEditableClick: function(e) {
                        e.target.focus();
                        console.log('focusing on #' + e.target.id); // debug
                    }
                }
            }
        },
        props: ['note'],
        methods: {}
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