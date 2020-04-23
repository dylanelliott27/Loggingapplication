import React, {useState} from 'react';
import './style.css';



function View(props) {
    const [date, setDate] = useState('');
    const [results, setResults] = useState();
    const [loading, setLoading] = useState(false);

const requestRecords = (e) => {
    setLoading(true);
    e.preventDefault();
    //?date=${date}
    fetch(`/api/retrieve`)
        .then(response => response.json())
        .then(jsondata => {setResults(jsondata); setLoading(false)})
}
  if(results){
      return(
        <div>
        <table className="table table-striped text-center">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Meal-type</th>
                    <th>Food</th>
                    <th>Carbs</th>
                    <th>Time</th>
                    <th>Insulin</th>
                    <th>Sugars</th>
                </tr>
            </thead>
            <tbody>
          {results.map(row => 
                <tr key={row.id}>
                    <td>{row.date}</td>
                    <td>{row.mealtype}</td>
                    <td>{row.food}</td>
                    <td>{row.carbs}</td>
                    <td>{row.time}</td>
                    <td>{row.insulin}</td>
                    <td>{row.sugars}</td>
                </tr>
          )}
            </tbody>
        </table>
        <button onClick={() => props.renderParent()}className="btn btn-danger mt-5">BACK to main menu</button>
        </div>
      )
  }
  return (
        <div className="container">
        <div className="d-flex justify-content-center flex-column align-items-center">
            <h1 className="mb-5"> Please choose a date from which you'd like to retrieve </h1>
            <form action="get.php" method="POST">
                {loading ? <div className="spinner-border text-primary"></div> :
            <div>
                <input onChange={(e) => setDate(e.target.value)} name ="date" type="date" id="birthdaytime"></input>
                <button onClick={(e) => requestRecords(e)} className="btn btn-primary">FIND!</button>
            </div>
             }
            </form>
            <button onClick={() => props.renderParent()} className="btn btn-danger mt-5">BACK to main menu</button>
        </div>
        </div>
 
  )
}


export default View;
