import { navigate } from 'svelte-routing';

export const load = ({ fetch, params }) => {
	const fetchQuestions = async (id) => {
		const res = await fetch(`http://localhost/es/quizMasterApi/get-questions.php?id=${id}`);
		const data = await res.json();
		if (data.data == false) {
			navigate('/selezione');
		}
		return data;
	};

	return fetchQuestions(params.quizId);
};
