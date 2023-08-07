<template>
    <h5 class="ms-4">Adicionar nova tarefa</h5>
    <form @submit.prevent="onSumbmit()" class="p-2 pb-3">
        <div class="mb-3 w-75 ms-3">
            <label class="form-label" for="title">Titulo</label>
            <input v-model="form.title" required type="text" name="title" id="title" class="form-control">
        </div>
        <div class="mb-3 w-75 ms-3">
            <label class="form-label" for="priority">Prioridade</label>
            <select v-model="form.priority" required class="form-select" name="priority" id="priority">
                <option value="3">Normal</option>
                <option value="2">Importante</option>
                <option value="1">Urgente</option>
            </select>
        </div>

        <div class="mb-3">
            <p v-for="error in errors" class="alert alert-danger">
                {{ error }}
            </p>
        </div>

        <div class="bm-3">
            <input type="submit" value="Salvar" class="ms-3 btn btn-primary ">
        </div>
    </form>
</template>
<script>
import { useForm } from '@inertiajs/vue3'

export default {
    props: {
        errors : null
    },
    data() {
        return {
            form: useForm({
                title: null,
                priority: 3,
            })
        }
    },
    methods: {
        onSumbmit() {
            this.form.post('/tarefas/criar');
            this.form.title = '';
        }
    }
}

</script>
