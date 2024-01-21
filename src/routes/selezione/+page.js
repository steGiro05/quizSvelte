export const load=({fetch, params})=>{

    const fetchQuestions = async() =>{
        const res =await fetch (`http://localhost/es/quizMasterApi/get-questions.php`);
        const data = await res.json()
        return data
    
    }
    
    return fetchQuestions(params.quizId)
    }