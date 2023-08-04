<template>
    <div class="d-flex flex-row" style="width: 100vw; height: 100vh;">
        <div style="height: 100%;">
            <Sidebar />
        </div>
        <div class="d-flex flex-row p-3">
            <div class="col-6">
                <ul v-for="task in tasks">
                    <li>{{ task }}</li>
                </ul>
            </div>
            <div class="col-6">
                <div class="h-70">
                    <NewTaskForm v-bind="$props"/>
                </div>
                <div class="h-30">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores delectus consectetur nesciunt culpa harum maxime quaerat voluptatem molestiae temporibus error? At doloribus facere maiores vel veniam, porro molestiae laudantium voluptas.</div>
            </div>
        </div>
    </div>
</template>
<script>
import Sidebar from '@/Components/Sidebar.vue'
import NewTaskForm from '@/Components/NewTaskForm.vue'

export default {
    props: {
        tasks :  null,
        lists :  null
    },
    components: {
        Sidebar,
        NewTaskForm
    }
}
</script>
<style>
    
</style>