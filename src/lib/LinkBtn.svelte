<script>
	import { goto } from '$app/navigation';
	export let name;
	export let url;
	export let colorIndex;
	let colors = ['bg-bOne', 'bg-bTwo', 'bg-bThree', 'bg-bFour'];
	let style =
		colors[colorIndex] + ' rounded-lg px-4 py-2 w-40 mx-auto text-white font-semibold shadow-sm';
</script>

<button on:click|preventDefault={() => goto(url)} class={style}>
	{name}
</button>
