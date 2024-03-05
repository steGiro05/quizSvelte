<script>
	import { user } from '/src/store.js';
	import LinkBtn from '../../../lib/LinkBtn.svelte';

	export let data;
	let quiz = data.data;
	let userId = data.userId;

	let colorIndex = 0;

	function calculateColorIndex() {
		colorIndex = colorIndex % 4; // Assicura che colorIndex sia compreso tra 0 e 3
		return colorIndex++;
	}
</script>

<div class="div-primary">
	<div class="bg-white">
		<div class="w-4/5 flex flex-row flex-wrap items-center mx-auto gap-8">
			{#each quiz as q}
				<LinkBtn name={q.titolo} url="quiz/{q.id} " colorIndex={calculateColorIndex()} />
			{/each}
		</div>
	</div>
</div>
