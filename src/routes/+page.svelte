<script>
	import { user } from '../store';
	import LoginForm from '../lib/LoginForm.svelte';

	$: isLoggedIn = $user === null ? false : true;

	const logOut = () => {
		user.update((val) => (val = null));
	};
</script>

<div>
	{#if isLoggedIn}
		<h2>Thank yo for logging in!</h2>
		<input type="button" value="Logout!" on:click={logOut} />
	{:else}
		<h2>Log in</h2>
		<LoginForm />
	{/if}
</div>
