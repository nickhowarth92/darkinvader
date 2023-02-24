<template>
    <nav>
        <ul>
            <li>
                <NavLink href="/" :active="$page.url === '/'">Home</NavLink>
            </li>
            <li>
                <NavLink href="/tickets/open" :active="$page.url.startsWith('/tickets/open')">Open Tickets</NavLink>
            </li>
            <li>
                <NavLink href="/tickets/closed" :active="$page.url.startsWith('/tickets/closed')">Closed Tickets</NavLink>
            </li>
        </ul>
    </nav>
</template>

<script>
import NavLink from "./NavLink.vue";

export default {
    components: { NavLink },
};
</script>
