
<script>
  import LinkBtn from "$lib/LinkBtn.svelte";
  import {current_question,punteggio} from '$lib/store.js'

 export let data;
const quiz=data.data
current_question.update(prev=>prev=0)
punteggio.set(0)
</script>

<div>
    <h2>Scegli un quiz..</h2>
    <div class='row'>
      {#each quiz as q}
      <LinkBtn name={q.titolo} url='quiz/{q.id}'/>
      {/each}
      
    </div>
</div>