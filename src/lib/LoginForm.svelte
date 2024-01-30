<script>
  let email = "";
  let password = "";

  let isLoading = false;

  let isSuccess = false;

  export let submit;

  let errors = {};

  const handleSubmit = () => {
    errors = {};

    if (email.length === 0) {
      errors.email = "Field should not be empty";
    }
    if (password.length === 0) {
      errors.password = "Field should not be empty";
    }

    if (Object.keys(errors).length === 0) {
      isLoading = true;
      submit({ email, password })
        .then(() => {
          isSuccess = true;
          isLoading = false;
        })
        .catch((err) => {
          errors.server = err;
          isLoading = false;
        });
    }
  };
</script>

<form
  class="bg-white p-8 w-72 h-96 flex flex-col justify-center items-center border border-gray-300 rounded"
  on:submit|preventDefault={handleSubmit}
>
  {#if isSuccess}
    <div class="text-4xl text-blue-500 success">
      🔓<br />
      You've been successfully logged in.
    </div>
  {:else}
    <h1 class="text-5xl text-blue-500 mb-6">👤</h1>

    <label class="mb-2 text-blue-500">Username</label>
    <input
      name="email"
      placeholder="name@example.com"
      class="border-none border-b border-gray-300 mb-4 transition-all duration-300 focus:outline-none focus:border-blue-500 w-full"
      bind:value={email}
    />

    <label class="mb-2 text-blue-500">Password</label>
    <input
      name="password"
      type="password"
      class="border-none border-b border-gray-300 mb-6 transition-all duration-300 focus:outline-none focus:border-blue-500 w-full"
      bind:value={password}
    />

    <button
      type="submit"
      class="mt-4 bg-blue-500 text-white py-2 px-4 w-48 rounded-full uppercase font-bold cursor-pointer transition-all duration-300 hover:shadow"
    >
      {#if isLoading}Logging in...{:else}Log in 🔒{/if}
    </button>

    <br />

    {#if Object.keys(errors).length > 0}
      <ul
        class="errors list-none p-4 m-0 border-2 border-red-500 text-red-500 bg-red-100 rounded"
      >
        {#each Object.keys(errors) as field}
          <li>{field}: {errors[field]}</li>
        {/each}
      </ul>
    {/if}
  {/if}
</form>

<style>
    /* Your other styles */
  
    @import '../css/tailwind.css'; /* Import Tailwind CSS */
  </style>
