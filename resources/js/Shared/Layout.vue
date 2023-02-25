<template>
    <Head>
        <title>Dark Invader Ticket App</title>
        <meta type="description" content="Some awesome meta for our ticket app!" head-key="description">
    </Head>

    <Header />

    <div class="l-standard-container">
        <slot />
    </div>

    <Footer />
</template>

<script>
import Header from './Header.vue';
import Footer from './Footer.vue';

export default {
    components: {
        Header, Footer
    },
};
</script>