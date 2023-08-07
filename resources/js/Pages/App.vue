<template>
    <div class="d-flex flex-row" style="width: 100vw; height: 100vh;">
        <div style="height: 100%;">
            <Sidebar v-bind="$props"/>
        </div>
        <div class="d-flex flex-row w-100 p-3">
            <div class="col-6 border-end pe-3">
                <TaskComponent v-bind="$props"/>
            </div>
            <div class="col-6">
                <div class="h-70">
                    <!-- <NewTaskForm v-bind="$props" /> -->
                    <slot />

                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Sidebar from '@/Components/Sidebar.vue';
import NewTaskForm from '@/Components/NewTaskForm.vue';
import TaskComponent from '@/Components/TaskComponent.vue';

export default {
    name: 'MainTemplate',
    props: {
        tasks: null,
        user : null
    },
    components: {
        Sidebar,
        NewTaskForm,
        TaskComponent
    }
}
</script>