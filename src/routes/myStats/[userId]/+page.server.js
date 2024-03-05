export const load = ({ fetch, params }) => {
	const fetchQuiz = async () => {
		const res = await fetch(`http://localhost/es/quizMasterApi/get-quiz.php`);
		const data = await res.json();
		return { ...data, ...params }; // Concatena i parametri ai dati e restituisci l'oggetto risultante
	};

	return fetchQuiz();
};
