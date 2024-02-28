<script>
	export let data;
	import { onMount } from 'svelte';
	import QuestionCard from '$lib/QuestionCard.svelte';
	import { current_question, punteggio } from '/src/store.js';
	import LinkBtn from '$lib/LinkBtn.svelte';

	onMount(() => {
		current_question.set(0);
		punteggio.set(0);
	});

	let questions = data.data;
</script>

<div class="div-primary">
	<div class="w-2/5 h-auto flex flex-col items-center p-8 mx-auto bg-white rounded-lg">
		{#if $current_question < questions.length}
			<QuestionCard
				question={questions[$current_question].domanda}
				answers={questions[$current_question].risposte}
			/>
			<p>{$current_question + 1}/{questions.length}</p>
		{:else}
			<h2>fine!</h2>
			<p>Punteggio: {$punteggio}</p>
			<LinkBtn url="/selezione" name="Indietro" />
		{/if}
	</div>
</div>
