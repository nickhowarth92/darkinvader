<template>
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
                <td><Link :href="`/users/${ticket.email}/tickets`">{{ ticket.name }}</Link></td>
                <td>{{ ticket.subject }}</td>
                <td>{{ ticket.publish_date }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    props: {
        tickets: Object
    }
}
</script>