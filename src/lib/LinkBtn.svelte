<script>
  export let name
  export let url
</script>

<a href="/{url}"><button>{name}</button></a>


<style>
    button {
    padding: 10px 15px;
    background-color: #007bff; /* Colore del pulsante */
    color: #fff; /* Colore del testo del pulsante */
    border: none;
    cursor: pointer;
    border-radius: 5px; /* Arrotonda gli angoli del pulsante */

  }

  button:hover{

    background-color: #0056b3; /* Colore del pulsante */

  }
</style>