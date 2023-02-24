<template>
    <h1>User Tickets</h1>

    <div v-if="error" class="b-notifcation b-notifcation--error">{{ error }}</div>
    <TicketTable :tickets="tickets.data" v-else/>

</template>

<script>
import Layout from '../../Shared/Layout.vue';
import TicketTable from '../../Shared/TicketTable.vue';

export default {
    layout: Layout,
    props: {
        tickets: Object,
        error: String
    },
    components: {
        TicketTable
    }
}
</script>