<template>
    <h5 class="ms-4">Adicionar nova tarefa</h5>
    <form @submit.prevent="onSumbmit()" class="p-2 pb-3">
        <div class="mb-3 w-75 ms-3">
            <label class="form-label" for="name">Nome</label>
            <input v-model="form.name" required type="text" name="name" id="name" class="form-control">
        </div>

        <div class="mb-3 w-75 ms-3">
            <label class="form-label" for="email">Email</label>
            <input type="email" v-model="form.email" required class="form-control" name="email" id="email">
        </div>

        <div class="mb-3 w-75 ms-3">
            <label class="form-label" for="password">Nova senha</label>
            <input type="password" v-model="form.password" required class="form-control" name="password" id="password">
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
        errors : null,
        user : null
    },
    data() {
        return {
            form: useForm({
                name: this.user.name,
                email: this.user.email,
                password: '',
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
