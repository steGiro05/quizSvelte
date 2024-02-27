<script>
	import { goto } from '$app/navigation';
	export let name;
	export let url;
</script>

<button on:click|preventDefault={() => goto(url)}>
	{name}
</button>
