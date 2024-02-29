export async function handle({ event, resolve }) {
	if (false) {
		return new Response('custom response');
	}
	const response = await resolve(event);
	return response;
}
