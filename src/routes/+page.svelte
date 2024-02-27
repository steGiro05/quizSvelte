<script>
	import { user, showIcon } from '../store';
	import LoginForm from '../lib/LoginForm.svelte';
	import { goto } from '$app/navigation';

	showIcon.set(false);
	let isLoggedIn = false;

	$: isLoggedIn = $user !== null;
</script>

<div class="div-primary">
	{#if isLoggedIn}
		{goto('/selezione')}
	{:else}
		<LoginForm />
	{/if}
</div>
