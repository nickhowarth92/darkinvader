<template>
    <Link class="b-nav__link" :class="{ 'b-nav__link b-nav__link--active' : active}">
        <slot />
    </Link>
</template>

<script>

export default {
    components: { },
    props: {
        active: Boolean
    }
};
</script>
