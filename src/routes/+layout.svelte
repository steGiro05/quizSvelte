<script>
	import Nav from '$lib/Nav.svelte';
	import { showIcon } from '/src/store.js';
</script>

<Nav showIcon={$showIcon} />

<slot />

<style>
	@import '../global.css';
</style>
