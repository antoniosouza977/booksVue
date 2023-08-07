<template>
    <div id="task-box" class="px-2">
        <ul class="list-group" v-for="task in tasks">
            <li class="list-group-item my-1">
                <div class="d-flex align-items-center justify-content-between ">
                    <span class="d-flex align-items-center">

                        <div class="d-flex align-items-center ms-2 fs-5">
                            <div v-if="task.done == false" class="d-flex align-items-center">
                                <i class="bi bi-square"></i>
                            </div>
                            <div v-else class="d-flex align-items-center">
                                <i class="bi bi-check-square"></i>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center ms-2 fs-5">
                            <div v-if="task.done == false" class="d-flex align-items-center">
                                {{ task.title }}
                            </div>
                            <div v-else class="d-flex align-items-center text-decoration-line-through"> {{ task.title }}
                            </div>
                            <span v-if="task.priority == 1" class="mx-1 text-danger ">
                                <i class="bi bi-exclamation-circle"></i>
                            </span>
                            <span v-if="task.priority == 2" class="mx-1 text-warning ">
                                <i class="bi bi-exclamation-circle"></i>
                            </span>
                        </div>
                    </span>
                    <span>
                        <form @submit.prevent="form.post(`/tarefas/completar/${task.id}`)" class="d-inline">
                            <button class="btn btn-outline-success mx-1" type="submit">
                                <i class="bi bi-check-lg"></i>
                            </button>
                        </form>
                        <Link :href="`/editar/${task.id}`">
                            <button class="btn btn-outline-info mx-1" type="submit">
                                <i class="bi bi-pen-fill"></i>
                            </button>
                        </Link>

                        <form @submit.prevent="form.post(`/tarefas/deletar/${task.id}`)" class="d-inline">
                            <button class="btn btn-outline-danger mx-1" type="submit">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                    </span>
                </div>
            </li>
        </ul>
    </div>
</template>
<script>
import { useForm, Link } from '@inertiajs/vue3';

export default {
    name: 'TaskComponent',
    props: {
        tasks: null,
        lists: null
    },
    components: {
        Link
    },
    data() {
        return {
            form: useForm({})
        }
    },
}
</script>
<style scoped>
#task-box {
    overflow-y: scroll;
    height: 80vh;
}
</style>