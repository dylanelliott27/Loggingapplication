import React, {useState} from 'react';
import './style.css';
import Create from './Create.js';
import View from './View.js';


function App() {
  const [createComponent, setCreateComponent] = useState(false);
  const [viewComponent, setViewComponent] = useState(false);
  const [successfulSubmit, setSuccesfulSubmit] = useState(false);

  const successSubmit = () => {
    setSuccesfulSubmit(true);
    setCreateComponent(false);
    setViewComponent(false);
    
  }

  const renderParent = () => {
    setSuccesfulSubmit(false);
    setCreateComponent(false);
    setViewComponent(false);
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
  console.log("rerendering app");
  return (
    <>
    {successfulSubmit && <div className="alert alert-success" role="alert">The record was inputted succesfully</div>}
    <div style={{height: "100vh"}}>
      <div className="container d-flex justify-content-center align-items-center flex-column h-100">
      <h1 className="mb-5 text-center">Diabetes log application</h1>
        <button onClick={() => setCreateComponent(true)}className="btn btn-primary mb-2">Create a new record</button>
        <button onClick={() => setViewComponent(true)}className="btn btn-secondary">View a record</button>
      </div>
    </div>
    </>
  )
}

export default App;
