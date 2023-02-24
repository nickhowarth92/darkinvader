<template>
    <h1 class="e-heading-1">Dashboard</h1>

    <div class="b-stats-panel">
        <div class="b-stats-panel__card">
            <h2 class="e-heading-2">Total Tickets</h2>
            <div class="b-stats-panel__card__value">
                {{  totalTickets }}
            </div>
        </div>
        <div class="b-stats-panel__card">
            <h2 class="e-heading-2">Unprocessed Tickets</h2>
            <div class="b-stats-panel__card__value">
                {{  unprocessedTickets }}
            </div>
        </div>
        <div class="b-stats-panel__card">
            <h2 class="e-heading-2">Highest Ticket Count</h2>
            <div class="b-stats-panel__card__value">
                {{  highestUser }} ({{ highestUserCount }})
            </div>
        </div>
        <div class="b-stats-panel__card">
            <h2 class="e-heading-2">Last Processed</h2>
            <div class="b-stats-panel__card__value">
                {{  lastProcessed }}
            </div>
        </div>
    </div>
</template>

<script>
import Layout from '../Shared/Layout.vue';

export default {
    layout: Layout,
    props: {
        totalTickets: Number,
        unprocessedTickets : Number,
        highestUser: String,
        highestUserCount: Number,
        lastProcessed: String
    }
}
</script>
