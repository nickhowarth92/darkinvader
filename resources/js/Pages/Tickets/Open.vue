<template>
    <h1 class="e-heading-1">Open Tickets</h1>

    <div v-if="!code.success" class="b-notification b-notification--error">{{ code.message }}</div>
    <TicketTable :tickets="tickets.data" :links="tickets.links" v-else/>

</template>

<script>
import Layout from '../../Shared/Layout.vue';
import TicketTable from '../../Shared/TicketTable.vue';

export default {
    layout: Layout,
    props: {
        tickets: Object,
        code: Array
    },
    components: {
        TicketTable
    }
}
</script>