<script>
	import { goto } from '$app/navigation';
	export let name;
	export let url;
	export let colorIndex = null;
	let colors = ['bg-bOne', 'bg-bTwo', 'bg-bThree', 'bg-bFour', 'bg-secondary'];
	let style =
		colors[colorIndex] + ' rounded-lg px-4 py-2 w-40 mx-auto text-white font-semibold shadow-lg';
	if (colorIndex == null) {
		style = 'rounded-lg px-4 py-2 w-40 mx-auto text-black shadow-sm';
	}
</script>

<button on:click|preventDefault={() => goto(url)} class={style}>
	{name}
</button>
