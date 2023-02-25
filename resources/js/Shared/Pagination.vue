<template>
    <!--Paginator-->
    <div class="b-pagination-links">
        <!--Dynamic component to handle logic-->
        <Component 
            :is="link.url ? 'Link' : 'span'"
            v-for="link in links" 
            :href="link.url"
            v-html="link.label"
            class="b-pagination-links__link"
            :class="{ 'b-pagination-links__link': ! link.url, 'b-pagination-links__link--active' : link.active }"/>

    </div>
</template>

<script>
export default {
    props: {
        links: Array
    }
}
</script>