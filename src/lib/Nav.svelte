<script>
	export let showIcon;
	import { user } from '../store';
	import { goto } from '$app/navigation';
	import { Button, Dropdown, DropdownItem } from 'flowbite-svelte';
	import LinkBtn from './LinkBtn.svelte';

	let showDropdown = false; // Variabile per controllare lo stato del menù a tendina

	const logOut = () => {
		user.update((val) => null);
		localStorage.setItem('user', null);
		goto('/');
	};

	$: isLoggedIn = $user !== null;
</script>

<nav class="flex flex-row items-center justify-between py-8 px-2 bg-transparent w-full h-12">
	{#if showIcon}
		<h1>Ciao</h1>
	{/if}
	{#if isLoggedIn}
		<div class="ml-auto w-auto h-auto flex flex-row gap-7 items-center text-lg">
			<a href="/" class="text-white font-bold">Home</a>

			<a href="/globalStats" class="text-white font-bold">Classifica globale</a>

			<Button class="flex flex-row">
				<p class="tezt-lg">{$user.username}</p>
				<svg
					xmlns="http://www.w3.org/2000/svg"
					viewBox="0 0 24 24"
					fill="currentColor"
					class="w-12 h-12"
				>
					<path
						fill-rule="evenodd"
						d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
						clip-rule="evenodd"
					/>
				</svg>
			</Button>
			<Dropdown>
				<DropdownItem>
					<LinkBtn name="myStats" url="/myStats/{$user.id}" />
				</DropdownItem>
				<DropdownItem>
					<button on:click={logOut}> Logout </button>
				</DropdownItem>
			</Dropdown>
		</div>
	{/if}
</nav>
