<template>
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 250px; height: 100%;">
        <Link :href="route('tarefas.index')" class="text-center text-decoration-none text-white fs-3">
        Tarefas
        </Link>
        <hr>
        <ul id="nav" class="nav nav-pills flex-column mb-auto fs-6">
            <li class="nav-item">
                <Link :href="route('tarefas.index')" class="nav-link text-white">
                <i class="bi bi-house-fill"></i>
                Home
                </Link>
            </li>
            <li>
                <Link :href="route('tarefas.create')" class="nav-link text-white">
                <span><i class="bi bi-plus-circle-fill"></i></span>
                Nova Tarefa
                </Link>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle"></i>
                <strong class="mx-1">{{ user.name }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li>
                    <Link class="dropdown-item" :href="route('user.edit')">
                        Perfil
                    </Link>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <form @submit.prevent="logout">
                        <input v-model="form.logout" type="hidden" name="logout">
                        <input class="dropdown-item" type="submit" value="Logout">
                    </form>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
import { Link, useForm } from '@inertiajs/vue3';

export default {
    name: 'Sidebar',
    components: {
        Link
    },
    props: {
        user: null
    },
    data() {
        return {
            form: useForm({
                logout: null
            })
        }
    },
    methods: {
        logout() {
            this.form.post('/logout')
        }
    }
}
</script>

<style scoped>
#nav li:hover {
    background-color: rgb(53, 58, 58);
    border-radius: .5rem;
}
</style>
