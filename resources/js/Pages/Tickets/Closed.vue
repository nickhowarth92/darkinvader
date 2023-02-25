<template>
    <h1 class="e-heading-1">Closed Tickets</h1>

    <div v-if="error" class="b-notification b-notification--error">{{ error }}</div>
    <TicketTable :tickets="tickets.data" :links="tickets.links" v-else/>

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