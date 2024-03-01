<script>
	export let data;
	import { onMount } from 'svelte';
	import QuestionCard from '$lib/QuestionCard.svelte';
	import { current_question, punteggio, user } from '/src/store.js';
	import LinkBtn from '$lib/LinkBtn.svelte';

	const path = '/scoreIcon.png';

	onMount(() => {
		current_question.set(0);
		punteggio.set(0);
	});

	let questions = data.data.domande;
	let url = data.data.url_img;
</script>

<div class="div-primary">
	<div class="w-2/5 h-auto flex flex-col items-center p-8 mx-auto bg-white rounded-lg">
		{#if $current_question < questions.length}
			<img src="/{url}" alt="Immagine quiz" class="h-20 w-20" />

			<QuestionCard
				question={questions[$current_question].domanda}
				answers={questions[$current_question].risposte}
			/>
			<p class="text-secondary font-semibold">{$current_question + 1}/{questions.length}</p>
		{:else}
			<img src="\scoreIcon.png" width="" height="" alt="" class="w-20 h-20" />
			<h2 class="text-3xl font-bold mb-10 text-secondary">Il tuo punteggio:</h2>
			<div class="flex flxel-col gap-14 mb-5">
				<div class="text-white flex flex-col gap-y-5 bg-green py-3 px-10 rounded-lg">
					<p class="font-bold text-7xl">{$punteggio}</p>
					<p class="text-sm font-bold">RISPOSTE<br />CORRETTE</p>
				</div>
				<div class="bg-red text-white flex flex-col gap-y-5 py-3 px-10 rounded-lg">
					<p class="font-bold text-7xl">{questions.length - $punteggio}</p>
					<p class="text-sm font-bold">RISPOSTE<br />ERRATE</p>
				</div>
			</div>

			<a href="/globalStats" class="text-secondary mb-2">Visualizza classifica globale</a>
			<LinkBtn url="/selezione" name="Torna alla Home" colorIndex="4" />
		{/if}
	</div>
</div>
