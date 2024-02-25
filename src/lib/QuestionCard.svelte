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

<div class="card bg-blue-500 text-white rounded p-4 mb-4">
	<p class="question text-lg font-bold mb-2">{question}</p>
	<ul class="answers flex flex-wrap gap-4">
		{#each answers as answer}
			<button
				class="answer w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5 bg-white text-black border border-gray-300 p-2 rounded cursor-pointer"
				on:click={() => handleAnswerClick(answer)}
				id={`answer-${answer.id_risposta}`}
			>
				{answer.testo_risposta}
			</button>
		{/each}
	</ul>
</div>
