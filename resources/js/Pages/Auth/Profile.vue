<template>
    <MainTemplate v-bind="$props">
        <ProfileForm v-bind="$props"/>
    </MainTemplate>
</template>
<script>
import MainTemplate from '@/Pages/App.vue';
import ProfileForm from '@/Components/ProfileForm.vue'
export default {
    components: {
        MainTemplate,
        ProfileForm
    },
    props: {
        user : null,
        errors : null
    }
}
</script>