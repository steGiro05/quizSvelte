<script>
	export let question = ''; // Testo della domanda
	export let answers = []; // Array di risposte
	import { current_question, punteggio } from '../store';

	function resetBackgroundColors() {
		answers.forEach((answer) => {
			const answerElement = document.getElementById(`answer-${answer.id_risposta}`);
			if (answerElement) {
				answerElement.classList.remove('bg-green-500', 'bg-red-500');
				answerElement.classList.add('bg-white');
			}
		});
	}

	function handleAnswerClick(answer) {
		const answerElement = document.getElementById(`answer-${answer.id_risposta}`);

		if (answer.corretta) {
			answerElement.classList.remove('bg-white', 'bg-red-500');
			answerElement.classList.add('bg-green-500');
			punteggio.update((prev) => (prev += 1));
		} else {
			answerElement.classList.remove('bg-white', 'bg-green-500');
			answerElement.classList.add('bg-red-500');
		}

		setTimeout(() => {
			current_question.update((prev) => (prev += 1));
			resetBackgroundColors();
		}, 500);
	}
</script>

<div class="card bg-blue-500 text-secondary rounded p-4 mb-2">
	<p class="text-xl font-bold mb-16">{question}</p>
	<div class="w-full flex flex-row flex-wrap items-center mx-auto gap-8">
		{#each answers as answer}
			<button
				class="rounded-lg px-4 py-2 w-44 mx-auto text-secondary border border-secondary bg-trasparent font-semibold shadow-sm cursor-pointer"
				on:click={() => handleAnswerClick(answer)}
				id={`answer-${answer.id_risposta}`}
			>
				{answer.testo_risposta}
			</button>
		{/each}
	</div>
</div>
