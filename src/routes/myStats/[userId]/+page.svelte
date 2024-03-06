<script>
	import LinkBtn from '../../../lib/LinkBtn.svelte';

	export let data;
	let quiz = data.data;
</script>

<div class="div-primary">
	<div>
		<div
			class="bg-white rounded-lg w-4/5 flex flex-row flex-wrap items-center justify-center mx-auto gap-8 p-4"
		>
			{#each quiz as q}
				<div>
					<p class="text-3xl font-bold mb-5 text-secondary">{q.nomeQuiz}</p>
					{#if q.max.maxScore}
						<div class="flex flex-row items-center gap-3">
							<div class="flex flex-col justify-center bg-green px-4 py-5 rounded-xl">
								<p class="text-white font-bold text-5xl">{q.max.maxScore * 100}%</p>
								<p class="text-white font-semibold text-lg">Massimo</p>
							</div>
							<div class="flex flex-col justify-center bg-red px-4 py-5 rounded-xl">
								<p class="text-white font-bold text-5xl">{q.min.minScore * 100}%</p>
								<p class="text-white font-semibold text-lg">Minimo</p>
							</div>
							<div class="flex flex-col justify-center bg-bFour px-4 py-5 rounded-xl">
								<p class="text-white font-bold text-5xl">{q.avg.avgScore * 100}%</p>
								<p class="text-white font-semibold text-lg">Medio</p>
							</div>
						</div>
					{:else}
						<p class="text-red text-xl">Nessun dato per questo quiz!</p>
					{/if}
				</div>
			{/each}
		</div>
	</div>
</div>
