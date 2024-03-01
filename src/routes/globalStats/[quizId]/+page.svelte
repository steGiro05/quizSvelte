<script>
	export let data;
	import LinkBtn from '../../../lib/LinkBtn.svelte';
	let ranking = data.data;
</script>

<div class="div-primary">
	<div class="bg-white">
		<h1>{ranking[0].titolo}</h1>
		{#each ranking as player}
			<div>
				<p>{player.username}</p>
				<p>{player.punteggio}</p>
			</div>
		{/each}
		<LinkBtn name="indietro" url="/globalStats" />
	</div>
</div>
