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
                cruds: [],
                mute: false
            }
        },
        methods: {
            read() {
                this.mute = true;
                window.axios.get('/api/cruds').then(({data}) => {
                    data.forEach(crud => {
                        this.cruds.push(new Crud(crud));
                    });
                    this.mute = false;
                }); 
            },
            update(id, color) {
                this.mute = true;
                window.axios.put(`/api/cruds/${id}`, { color }).then(() => {
                // Once AJAX resolves we can update the Crud with the new color
                    this.cruds.find(crud => crud.id === id).color = color;
                    this.mute = false;
                });
            },
            del(id) {
                this.mute = true;
                window.axios.get('/api/cruds/create').then(({ data }) => {
                    let index = this.cruds.findIndex(crud => crud.id === id);
                    this.cruds.splice(index, 1);
                    this.mute = false;
                });
            },
            create() {
                this.mute = true;
                window.axios.get('/api/cruds/create').then(({ data }) => {
                    this.cruds.push(new Crud(data));
                    this.mute = false;
                });
            }
        },
    created() {
        this.read()
    }, 
    components: {
        CrudComponent
    },
    watch: {
        mute(val) {
            document.getElementById('mute').className = val ? "on" : "";
        }
    }
}
</script>
