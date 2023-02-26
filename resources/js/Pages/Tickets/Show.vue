<template>
    <h1 class="e-heading-1">Ticket Information</h1>
    
    <div v-if="error" class="b-notification b-notification--error">{{ error }}</div>
    <div v-else class="b-ticket-card">
        <h2 class="e-heading-2">{{ ticket.subject }}</h2>
        <div class="b-ticket-card__row">
            <strong>User: </strong>
            <p>{{ user.name }} - {{ user.email }}</p>
        </div>
        <div class="b-ticket-card__row">
            <strong>Content: </strong>
            <p>{{ ticket.content }}</p>
        </div>
        <div class="b-ticket-card__row">
            <strong>Publsh Date: </strong>
            <p>{{ ticket.publish_date }}</p>
        </div>
        <div class="b-ticket-card__row">
            <strong>Status: </strong>
            <p v-if="ticket.status == 1">Processed</p>
            <p v-else>Unprocessed</p>
        </div>
    </div>

</template>

<script>
import Layout from '../../Shared/Layout.vue';

export default {
    layout: Layout,
    props: {
        ticket: Object,
        user: Object,
        error: String
    },
}
</script>