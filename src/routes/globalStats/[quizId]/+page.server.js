export const load = ({ fetch, params }) => {
	const fetchQuestions = async (id) => {
		console.log(id);
		const res = await fetch(`http://localhost/es/quizMasterApi/get-globalRank.php?quizId=${id}`);
		const data = await res.json();
		return data;
	};

	return fetchQuestions(params.quizId);
};
