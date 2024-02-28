import { Handle } from '@sveltejs/kit';

export const Handle = async ({ event, resolve }) => {
	console.log(event);
};
