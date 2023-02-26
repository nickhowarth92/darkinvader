<template>
    <table class="e-table">
        <thead>
            <tr>
                <td>Name</td>
                <td>Subject</td>
                <td>Date Published</td>
                <td>Acions</td>
            </tr>
        </thead>
        <tbody>
            <tr v-for="ticket in tickets" :key="ticket.id">
                <td><Link class="e-link" :href="`/users/${ticket.email}/tickets`">{{ ticket.name }}</Link></td>
                <td>{{ ticket.subject }}</td>
                <td>{{ ticket.publish_date }}</td>
                <td><Link class="e-btn" :href="`/tickets/${ticket.id}`">View</Link></td>
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