<template>
    <!--<div class="note-items-container">-->
    <draggable class="note-items-container" @start="drag=true" @end="drag=false">
        <NoteItem v-for="(note, index) in notes"
                  :title="note.title"
                  :content="note.content"
                  :id="'note-item-' + note.id"
                  :index="index"
                  :noteid="note.id"
                  :key="note.id"
                  v-model="note.id"></NoteItem>
    </draggable>
    <!--</div>-->
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