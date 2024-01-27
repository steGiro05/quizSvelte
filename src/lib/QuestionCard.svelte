<script>
  export let question = ''; // Testo della domanda
  export let answers = [];  // Array di risposte
  import { current_question,punteggio } from './store.js';

  function resetBackgroundColors() {
    answers.forEach(answer => {
      const answerElement = document.getElementById(`answer-${answer.id_risposta}`);
      if (answerElement) {
        answerElement.style.backgroundColor = '#fff'; // Imposta il colore di sfondo a bianco
      }
    });
  }

  function handleAnswerClick(answer) {
    
    const answerElement = document.getElementById(`answer-${answer.id_risposta}`);
    
    if (answer.corretta) {
      answerElement.style.backgroundColor = 'green';
      punteggio.update(prev=>prev+=1)
    } else {
      answerElement.style.backgroundColor = 'red';
    }
    
    setTimeout(() => {
      
      current_question.update(prev => prev += 1);
      resetBackgroundColors(); // Resetta gli sfondi prima di impostare quello corrente
    }, 500);
  }
</script>

<div class="card">
  <p class="question">{question}</p>
  <ul class="answers">
    {#each answers as answer }
      <li class="answer" on:click={() => handleAnswerClick(answer)} id={`answer-${answer.id_risposta}`}>{answer.testo_risposta}</li>
    {/each}
  </ul>
</div> 
  
  <style>
    /* Aggiungi stili CSS secondo le tue preferenze */
  
    .card {
      height: auto;
      font-family: 'Arial', sans-serif;
      background-color: #007bff; /* Colore di base blu */
      color: #fff; /* Colore del testo bianco */
      border-radius: 10px; /* Bordo arrotondato */
      padding: 20px;
      margin-bottom: 20px;
    }
  
    .question {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px; /* Spazio inferiore alla domanda */
      color: #fff; /* Colore del testo bianco per le domande */
      user-select: none; /* Rende il testo non evidenziabile */
    }
  
    .answers {
      list-style-type: none;
      padding: 0;
      display: flex;
      flex-wrap: wrap; /* Per andare a capo dopo due risposte */
      justify-content: space-between; /* Distribuire le risposte su due colonne */
    }
  
    .answer {
      width: 30%; /* Larghezza per fare in modo che ci siano due risposte per riga */
      background-color: #fff; /* Sfondo bianco per le risposte */
      color: #000; /* Colore del testo nero per le risposte */
      border: 1px solid #ddd;
      padding: 10px;
      margin: 8px 0;
      border-radius: 5px; /* Bordo arrotondato per le risposte */
      user-select: none; /* Rende il testo non evidenziabile */
      cursor: pointer; /* Cambia l'icona del cursore per indicare che l'elemento è cliccabile */
    }
  </style>
  