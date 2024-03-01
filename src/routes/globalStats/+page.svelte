<script>
	import LinkBtn from '../../lib/LinkBtn.svelte';
	export let data;
	let quiz = data.data;
	let colorIndex = 0;

	// Funzione per calcolare il valore di colorIndex ad ogni iterazione
	function calculateColorIndex() {
		colorIndex = colorIndex % 4; // Assicura che colorIndex sia compreso tra 0 e 3
		return colorIndex++;
	}
</script>

<div class="div-primary">
	<div
		class="flex flex-col gap-y-4 items-center w-2/5 px-8 py-8 mx-auto h-auto bg-white rounded-lg"
	>
		<h1 class="text-4xl text-secondary font-semibold">Classifica Globale</h1>
		<div class="w-4/5 flex flex-row flex-wrap items-center mx-auto gap-8">
			{#each quiz as q}
				<LinkBtn name={q.titolo} url="globalStats/{q.id} " colorIndex={calculateColorIndex()} />
			{/each}
		</div>
	</div>
</div>
