<template>
    <div id="login" class="container-fluid">
        <div id="login-box" class="mx-auto bg-light rounded">
            <main class="form-signin w-100 m-auto shadow-sm p-4">
                <form @submit.prevent="login">
                    <h1 class="h3 mb-3 fw-normal">Faça seu registro</h1>

                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input v-model="form.name" type="text" class="form-control" id="name"
                            placeholder="Insira seu nome">
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input v-model="form.email" type="email" class="form-control" id="email"
                            placeholder="email@example.com">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="password">Senha</label>
                        <input v-model="form.password" type="password" class="form-control" id="password"
                            placeholder="password">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary py-2" type="submit">
                            Registrar
                        </button>
                    </div>

                </form>
            </main>
        </div>
    </div>
</template>
<script>
import { useForm } from '@inertiajs/vue3'

export default {
    data() {
        return {
            form: useForm({
                name: null,
                email: null,
                password: null,
            })
        }
    },
    methods: {
        login() {
            this.form.post('/registrar')
        }
    }
}
</script>
<style scoped>
#login {
    background-color: rgba(0, 0, 0, 0.788);
    height: 100vh;
    padding-top: 18vh;
}

#login-box {
    width: 30vw;
}
</style>