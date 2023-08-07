<template>
    <MainTemplate v-bind="$props">
        <EditTaskForm v-bind="$props"/>
    </MainTemplate>
</template>
<script>
import MainTemplate from '@/Pages/App.vue';
import EditTaskForm from '@/Components/EditTaskForm.vue'
export default {
    components: {
        MainTemplate,
        EditTaskForm
    },
    props: {
        tasks : null,
        task : null,
        user : null
    }
}
</script>
