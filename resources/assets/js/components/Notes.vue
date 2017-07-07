<template>
    <draggable class="note-items-container" @start="drag=true" @end="drag=false" v-model="note">
        <NoteItem v-for="(note, index) in notes" v-bind:note="note" v-bind:index="index" v-bind:key="note.id"></NoteItem>
    </draggable>
</template>

<script type="text/babel">
    import draggable from 'vuedraggable';
    import NoteItem from '../components/NoteItem'
    export default {
        components: { draggable, NoteItem },
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
            }
        }
    }
</script>