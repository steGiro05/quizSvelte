export const load=({fetch, params})=>{

const fetchQuestions = async(id) =>{
    const res =await fetch (`http://localhost/es/quizMasterApi/get-questions.php?id=${id}`);
    const data = await res.json()
    return data

}

return fetchQuestions(params.quizId)
}