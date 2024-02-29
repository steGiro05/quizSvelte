import { navigate } from 'svelte-routing';

export const load = ({ fetch, params }) => {
	const fetchQuestions = async (id = 3) => {
		const res = await fetch(`http://localhost/es/quizMasterApi/get-image.php?id=${id}`);
		const data = await res.json();
		if (data.data == false) {
			navigate('/selezione');
		}
		console.log(data);
		return data;
	};

	return fetchQuestions(params.quizId);
};
