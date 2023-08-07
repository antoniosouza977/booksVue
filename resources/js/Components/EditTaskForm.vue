<template>
    <h5 class="ms-4">Editar tarefa</h5>
    <form @submit.prevent="updateTask" class="p-2 pb-3">
        <div class="mb-3 w-75 ms-3">
            <label class="form-label" for="title">Titulo</label>
            <input v-model="form.title" required type="text" name="title" id="title" class="form-control">
        </div>
        <div class="mb-3 w-75 ms-3">
            <label class="form-label" for="priority">Prioridade</label>
            <select v-model="form.priority" required class="form-select" name="priority" id="priority">
                <option selected value="3">Normal</option>
                <option value="2">Importante</option>
                <option value="1">Urgente</option>
            </select>
        </div>

        <input type="submit" value="Salvar" class="ms-3 btn btn-primary ">
    </form>
</template>
<script>
import { useForm } from '@inertiajs/vue3'

export default {
    props : {
        task : null
    },
    data() {
        return {
            form: useForm({
                title: this.task.title,
                priority: this.task.priority,
            })
        }
    },
    methods: {
        updateTask() {
            this.form.post(`/tarefas/editar/${this.task.id}`)
        }
    }
}

</script>
