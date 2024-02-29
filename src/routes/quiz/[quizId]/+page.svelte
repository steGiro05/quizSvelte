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
			<QuestionCard
				question={questions[$current_question].domanda}
				answers={questions[$current_question].risposte}
				img={url}
			/>
			<p>{$current_question + 1}/{questions.length}</p>
		{:else}
			<img src="\scoreIcon.png" width="30" height="30" alt="An alt text" />
			<h2>Il tuo punteggio</h2>
			<div class="bg-green">
				<p>{$punteggio}</p>
				<p>RISPOSTE CORRETTE</p>
			</div>
			<div class="bg-red">
				<p>{questions.length - $punteggio}</p>
				<p>RISPOSTE ERRATE</p>
			</div>
			<LinkBtn url="/selezione" name="Indietro" />
		{/if}
	</div>
</div>
