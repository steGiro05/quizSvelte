<script>
	export let showIcon;
	import { user } from '../store';

	const logOut = () => {
		user.update((val) => null);
	};

	$: isLoggedIn = $user !== null;
</script>

<nav class="flex items-center justify-between p-4 bg-trasparent w-full h-12">
	{#if showIcon}
		<h1>Ciao</h1>
	{/if}
	{#if isLoggedIn}
		<h1>Ciao</h1>
	{/if}
</nav>
