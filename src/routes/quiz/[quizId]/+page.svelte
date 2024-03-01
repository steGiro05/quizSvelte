<script>
	export let data;
	import { onMount } from 'svelte';
	import QuestionCard from '$lib/QuestionCard.svelte';
	import { current_question, punteggio } from '/src/store.js';
	import ScoreCard from '../../../lib/ScoreCard.svelte';

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
			<ScoreCard questionLenght={questions.length} quizId={data.data.idQuiz} />
		{/if}
	</div>
</div>
