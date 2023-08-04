<template>
    <form @submit.prevent="onSumbmit()" class="shadow-sm p-2">
        <div class="mb-3 w-75 ms-3">
            <label class="form-label" for="title">Titulo</label>
            <input v-model="form.title" type="text" name="title" id="title" class="form-control">
        </div>
        <div class="mb-3 w-75 ms-3">
            <label class="form-label" for="priority">Prioridade</label>
            <select v-model="form.priority" class="form-select" name="priority" id="priority">
                <option selected value="3">Normal</option>
                <option value="2">Importante</option>
                <option value="1">Urgente</option>
            </select>
        </div>
        <div class="mb-3 w-75 ms-3">
            <label class="form-label" for="list">Lista</label>
            <select v-model="form.list" class="form-select" name="list" id="list">
                <option v-for="list in lists" :value="list.id">
                    {{ list.title }}
                </option>
            </select>
        </div>
        <input type="submit" value="Salvar" class="ms-3 btn btn-primary ">
    </form>
</template>
<script>
import { useForm } from '@inertiajs/vue3'

export default {
    props : {
        lists : null
    },
    data() {
        return {
            form: useForm({
                title: null,
                priority: null,
                list: null
            })
        }
    },
    methods: {
        onSumbmit() {
            this.form.post('/tarefas/criar')
        }
    }
}

</script>
