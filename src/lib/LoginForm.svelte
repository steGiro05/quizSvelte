<script>
	import LinkBtn from './LinkBtn.svelte';
	let username = '';
	let password = '';
	let currentError = null;

	const login = () => {
		//fetch al server
		/*
		fetch('http://localhost/es/quizMasterApi/create-user.php', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json'
			},
			body: JSON.stringify({ username: username, password: password })
		})
			.then((res) => {
				if (res.status < 299) return res.json();
				else currentError = 'Something not right with server response';
			})
			.then((data) => {
				if (data) user.update((val) => (val = { ...data }));
			})
			.catch((error) => {
				currentError = error;
				console.log('Error logging in: ', error);
			});*/
	};
</script>

<form
	class="flex flex-col gap-y-4 items-center w-1/3 px-8 py-8 mx-auto px bg-white"
	on:submit|preventDefault={login}
>
	<h1 class="text-6xl">Quizmaster</h1>
	<input
		type="text"
		id="username"
		bind:value={username}
		class="bg-[#ff9051] text-black placeholder:text-black placeholder:opacity-80 w-3/4 h-14 rounded-lg p-4"
		placeholder="mariorossi@gmail.com"
	/>
	<input
		type="password"
		id="password"
		bind:value={password}
		class="bg-[#ff9051] text-black placeholder:text-black placeholder:opacity-80 w-3/4 h-14 rounded-lg p-4"
		placeholder="password"
	/>
	<LinkBtn name="Registrati" url="/register" />
	<button type="submit" class="">Accedi</button>
</form>
