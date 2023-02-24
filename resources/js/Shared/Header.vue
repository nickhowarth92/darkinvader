<template>

<header class="b-header-main">
    <div class="b-header-main__inner">
        <div class="b-header-main__logo">DarkInvader Ticket App</div>
        <div class="b-header-main__nav">
            <Nav />
        </div>
    </div>
</header>

</template>

<script>
import Nav from './Nav.vue';
export default {
    components: {
        Nav
    }
};
</script>