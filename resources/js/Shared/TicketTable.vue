<template>
    {{ tickets.links }}
    <table class="e-table">
        <thead>
            <tr>
                <td>Name</td>
                <td>Subject</td>
                <td>Date Published</td>
            </tr>
        </thead>
        <tbody>
            <tr v-for="ticket in tickets" :key="ticket.id">
                <td><Link class="e-link" :href="`/users/${ticket.email}/tickets`">{{ ticket.name }}</Link></td>
                <td>{{ ticket.subject }}</td>
                <td>{{ ticket.publish_date }}</td>
            </tr>
        </tbody>
    </table>

    <Pagination :links="links" />

</template>
<script>
import Pagination from './Pagination.vue';

export default {
    props: {
        tickets: Object,
        links: Object
    },
    components: {
        Pagination
    }
}
</script>