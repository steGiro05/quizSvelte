export const load = ({ fetch }) => {
	const fetchQuiz = async () => {
		const res = await fetch(`http://localhost/es/quizMasterApi/get-quiz.php`);
		const data = await res.json();
		return data;
	};

	return fetchQuiz();
};
