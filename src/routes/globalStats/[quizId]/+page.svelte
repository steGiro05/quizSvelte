<script>
	export let data;
	import LinkBtn from '../../../lib/LinkBtn.svelte';
	let ranking = data.data;
</script>

<div class="div-primary">
	{#if ranking}
		<div class="bg-white flex flex-col items-center gap-3 py-5 px-8 rounded-lg">
			<img src="/trophyImg.png" alt="" srcset="" class="w-20 h-20" />
			<h1 class="text-secondary text-3xl font-bold mb-5">Classifica Globale {ranking[0].titolo}</h1>
			<div class="flex flex-row gap-6">
				{#each ranking.slice(0, 3) as player, index}
					<div class="flex flex-col items-center">
						<svg
							xmlns="http://www.w3.org/2000/svg"
							viewBox="0 0 24 24"
							fill="grey"
							class="w-20 h-20"
						>
							<path
								fill-rule="evenodd"
								d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
								clip-rule="evenodd"
							/>
						</svg>
						<p class="text-secondary text-2xl">{player.username}</p>
						<p class="text-secondary text-lg">{player.punteggio * 100}%</p>
					</div>
				{/each}
			</div>
			<div class="flex flex-col gap-2 w-2/3">
				{#each ranking.slice(3, 6) as player, index}
					<div class="flex flex-row justify-between w-full">
						<p class="text-secondary">{index + 4}</p>
						<p class="text-secondary">{player.username}</p>
						<p class="text-secondary">{player.punteggio * 100}%</p>
					</div>
				{/each}
			</div>

			<!--
		<div>
			{#each ranking as player}
				<div>
					<p>{player.username}</p>
					<p>{player.punteggio * 100}%</p>
				</div>
			{/each}
		</div>
		-->
			<LinkBtn name="indietro" url="/globalStats" />
		</div>
	{:else}
		<h1 class="text-red font-bold text-lg">No data</h1>
		<a href="/globalStats">Back!</a>
	{/if}
</div>
