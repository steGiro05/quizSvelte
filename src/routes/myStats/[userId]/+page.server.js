export const load = ({ fetch, params }) => {
	const fetchQuestions = async (id = 3) => {
		const res = await fetch(`http://localhost/es/quizMasterApi/get-personalScore.php?id=${id}`);
		const data = await res.json();

		return data;
	};

	return fetchQuestions(params.quizId);
};
