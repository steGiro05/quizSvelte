<script>
  export let name;
  export let url;

</script>

<a href="/{url}">
  <button >{name}</button>
</a>

<style>
  button {
    padding: 10px 15px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
    border-radius: 5px;
  }

  button:hover {
    background-color: #0056b3;
  }
</style>
