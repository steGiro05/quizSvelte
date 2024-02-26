<script>
	import Nav from '$lib/Nav.svelte';
	import { showIcon } from '/src/store.js';
	import { onMount } from 'svelte';
	import { user } from '../store';

	onMount(() => {
		const storedUser = localStorage.getItem('user');
		if (storedUser) {
			user.set(JSON.parse(storedUser));
		}
	});
</script>

<Nav showIcon={$showIcon} />

<slot />

<style>
	@import '../global.css';
</style>
