
<script>
  import LinkBtn from "$lib/LinkBtn.svelte";

 export let data;
const quiz=data.data
</script>

<div>
    <h2>Scegli un quiz..</h2>
    <div class='row'>
      {#each quiz as q}
      <LinkBtn name={q.titolo} url='quiz/{q.id}'/>
      {/each}
      
    </div>
</div>