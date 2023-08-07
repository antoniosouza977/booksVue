<template>
    <MainTemplate v-bind="$props">
        <NewTaskForm v-bind="$props"/>
    </MainTemplate>
</template>
<script>
import MainTemplate from '@/Pages/App.vue';
import NewTaskForm from '@/Components/NewTaskForm.vue'
export default {
    components: {
        MainTemplate,
        NewTaskForm
    },
    props: {
        tasks : null,
        user : null,
        errors : null
    }
}
</script>
