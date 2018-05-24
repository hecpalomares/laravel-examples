<!-- Display our Crud using the CrudComponent. Loop the array of Cruds. Add Button to add new Cruds. --> 
<template>
    <div id="app">
        <div class="heading">
            <h1>Cruds</h1>
        </div>
        <crud-component
            v-for="crud in cruds"
            v-bind="crud"
            :key="crud.id"
            @update="update"
            @delete="del"
        ></crud-component>
        <div>
            <button @click="create()">Add</button>
        </div>
    </div>    
</template>
<script>
    function Crud({id, color, name}) {
        this.id = id;
        this.color = color;
        this.name = name;
    }

    import CrudComponent from './CrudComponent.vue';

    export default {
        data() {
            return {
                cruds: []
            }
        },
        methods: {
            read() {
            //TODO
        },
        update(id, color) {
            //TODO
        },
        del(id) {
            //TODO
        }
    },
    components: {
        CrudComponents
    }
}
</script>
