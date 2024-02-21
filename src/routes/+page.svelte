<script>
	import { user, showIcon } from '../store';
	import LoginForm from '../lib/LoginForm.svelte';


	showIcon.set(false)
	let isLoggedIn = false;

	const logOut = () => {
		user.update(val => null);
	};
	
	$: isLoggedIn = $user !== null;
</script>



<div>
	{#if isLoggedIn}
		<h2>Thank you for logging in!</h2>
		<input type="button" value="Logout!" on:click={logOut} />
	{:else}
		<LoginForm />
	{/if}
</div>
