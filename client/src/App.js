import React, {useState} from 'react';
import './style.css';
import Create from './Create.js';
import View from './View.js';
import Chart from './Chart';

function App() {
  const [createComponent, setCreateComponent] = useState(false);
  const [viewComponent, setViewComponent] = useState(false);
  const [successfulSubmit, setSuccesfulSubmit] = useState(false);
  const [chartComponent, setChartComponent] = useState(false);

  const successSubmit = () => {
    setSuccesfulSubmit(true);
    setCreateComponent(false);
    setViewComponent(false);
    
  }

  const renderParent = () => {
    setSuccesfulSubmit(false);
    setCreateComponent(false);
    setViewComponent(false);
    setChartComponent(false);
  }

  if(createComponent){
    return(
      <Create successSubmit = {successSubmit} renderParent = {renderParent} />
    )
  }
  if(viewComponent){
    return(
      <View renderParent = {renderParent} />
    )
  }
  if(chartComponent){
    return(
      <Chart renderParent = {renderParent} />
    )
  }

  return (
    <>
    {successfulSubmit && <div className="alert alert-success" role="alert">The record was inputted succesfully</div>}
    <div style={{height: "100vh"}}>
      <div className="container d-flex justify-content-center align-items-center flex-column h-100">
      <h1 className="mb-5 text-center">Diabetes log application</h1>
        <button onClick={() => setCreateComponent(true)}className="btn btn-primary mb-2">Create a new record</button>
        <button onClick={() => setViewComponent(true)}className="btn btn-secondary">View a record</button>
        <button onClick={() => setChartComponent(true)}className="btn btn-secondary mt-2">Carb chart</button>
      </div>
    </div>
    </>
  )
}

export default App;
