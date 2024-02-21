<script>
	import { user } from '../store';
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

<form class="max-w-md mx-auto my-8" on:submit|preventDefault={login}>
	<label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
	<input
		type="text"
		id="username"
		bind:value={username}
		class="w-full p-2 border border-gray-300 rounded mb-4"
	/>

	<label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
	<input
		type="password"
		id="password"
		bind:value={password}
		class="w-full p-2 border border-gray-300 rounded mb-4"
	/>

	<button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-full">Log In</button>
</form>
