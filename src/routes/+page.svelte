<script>
	import { user } from '../store';
	import {goto} from '$app/navigation';
	import LoginForm from '../lib/LoginForm.svelte';
	import LinkBtn from '../lib/LinkBtn.svelte'

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
