<script>
	export let question = ''; // Testo della domanda
	export let answers = []; // Array di risposte
	export let img;
	import { current_question, punteggio } from '../store';

	function handleAnswerClick(answer) {
		setTimeout(() => {
			current_question.update((prev) => (prev += 1));
		}, 100);
	}
</script>

<img src="/{img}" height="50" width="50" alt="Immagine quiz" />
<div class="text-secondary p-4 mb-2">
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
