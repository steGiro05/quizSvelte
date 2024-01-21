export const load=({fetch, params})=>{

const fetchQuestions = async(id) =>{
    const res =await fetch (`https://dummyjson.com/products/${id}`);
    const data = await res.json()
    return data

}

return fetchQuestions(params.quizId)
}