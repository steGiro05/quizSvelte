<script>
    export let data;
    import QuestionCard from '$lib/QuestionCard.svelte';
    import {current_question,punteggio} from '$lib/store.js'
  import LinkBtn from "$lib/LinkBtn.svelte";

  
    let questions = data.data;

  
   
  
    
  </script>
  
  <div>
    {#if $current_question<questions.length}
      <QuestionCard question={questions[$current_question].domanda} answers={questions[$current_question].risposte}/>
    <p>{$current_question+1}/{questions.length}</p>
  {:else} 
  <h2>fine!</h2>
  <p>Punteggio: {$punteggio}</p>
  <LinkBtn url='selezione' name='Indietro' />
  {/if}
  </div>
  