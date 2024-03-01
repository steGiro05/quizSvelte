<script>
	import { user } from '/src/store.js';
	import LinkBtn from '../../../lib/LinkBtn.svelte';

	export let data;
	let stats = data.data;
	console.log(stats);
</script>

<div class="div-primary">
	<div class="bg-white">
		<div>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="grey	" class="w-12 h-12">
				<path
					fill-rule="evenodd"
					d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
					clip-rule="evenodd"
				/>
			</svg>
		</div>
		<div>
			<p>{$user.username}</p>
			<p>Statistiche:</p>
		</div>
		<div class="w-4/5 flex flex-row flex-wrap items-center mx-auto gap-8">
			<!-- {#each quiz as q}
				<LinkBtn name={q.titolo} url="quiz/{q.id} " colorIndex={calculateColorIndex()} />
			{/each} -->
			<LinkBtn name="calcio" url="/ " colorIndex="0" />
			<LinkBtn name="calcio" url="/ " colorIndex="0" />
		</div>
	</div>
</div>
