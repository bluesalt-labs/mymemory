<template>
    <draggable v-model="notes" @start="drag=true" @end="drag=false">
        <div class="note-item" v-for="(note, index) in notes" :id="'note-item-' + index">
            <input class="note-item-title" type="text" v-model="note.title" />
            <textarea :id="'note-content-' + index" v-model="note.content"></textarea>
        </div>
    </draggable>
</template>

<script type="text/babel">
    import draggable from 'vuedraggable';

    export default {
        components: {
            draggable
        },
        data() {
            return {
                notes: [
                    {
                        id: 22345,
                        type: 0,
                        title: 'note1',
                        content: 'The contents of note1'
                    },
                    {
                        id: 22346,
                        type: 0,
                        title: 'note2',
                        content: 'The contents of note2'
                    }
                ]
            };
        }
    };
</script>