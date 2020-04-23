import React, {useState, useRef, useEffect} from 'react';
import './style.css';
function Create(props) {
    const [loading, setLoading] = useState();
    const [nextCard, setNextCard] = useState();
    const [recordInserted, setRecordInserted] = useState();
    const [submitLoading, setSubmitLoading] = useState();
    const containerRef = useRef(null);

  useEffect(() => {
    containerRef.current.focus();
  },[loading]);


    const nextCardValidate = (num) => {
        setNextCard(num);
        setLoading(num);
        setTimeout(() => { ///remove this!!!!!!!! just for imitation
            setLoading(0);
            
    
        }, 1000);
    }

    const submitForm = (e) => {
        setSubmitLoading(true);
        console.log('called');
        e.preventDefault();
        const form = document.getElementById('recordform');
        var forminfo = new FormData(form);

        fetch('http://localhost/loggingapplication/public/post.php', {body: forminfo, method: 'post'})
        .then(res =>{
            if(res.status === 200){
                console.log("SUCCESS");
                //props.successSubmit();
                setSubmitLoading(false);
                setRecordInserted(true);
            }
        })
    }
  return (
<>
    <div className="d-flex justify-content-center mb-3">
        <button onClick={() => props.renderParent()} className="btn btn-danger">Back to main menu</button>
    </div>
<div className="formwrapper">
    <form id="recordform" className="form" onSubmit={submitForm}>
        <div className="card shadow-sm">
        <h5 className="text-center card-header">Date</h5>
        <div className="d-flex justify-content-center align-center flex-column card-body">
            <div className="d-flex justify-content-center">
                <div className="date mb-3">
                <label >DATE:</label>
                    <input required type="date" name="date"></input>
                </div>
            </div>
            {nextCard >= 2 ? 
            <button className="mNamet-3 btn btn-secondary" disabled>Saved</button>
            : <button href='#' ref={containerRef}  onClick={() => nextCardValidate(2)} className="mt-3 btn btn-primary">Next</button>
            }
        </div>
        </div>

        
        {nextCard >= 2 &&
        <div ref={containerRef} tabIndex={-1} className="card mt-5 shadow-sm">
        <h5 className="text-center card-header">Breakfast</h5>
        <div className="d-flex justify-content-center align-center flex-column card-body">
            {loading === 2 ? <div className="d-flex justify-content-center"><div className="spinner-border text-primary"></div></div> :
            <>
            <label>Food</label>
            <input required name="breakfastfood"></input>
            <label>Carbs</label>
            <input required name="breakfastcarbs"></input>
            <label>Time</label>
            <input required name="breakfasttime"></input>
            <label>Insulin</label>
            <input required name="breakfastinsulin"></input>
            <label>Sugars</label>
            <input required name="breakfastsugars"></input>
            {nextCard >= 3 ? 
            <button className="mt-3 btn btn-secondary" disabled>Saved</button>
            : <button href='#' ref={containerRef}  onClick={() => nextCardValidate(3)} className="mt-3 btn btn-primary">Next</button>
            }
            </>
        }
        </div>
        </div>
        }


        {nextCard >= 3 &&
        <div ref={containerRef} tabIndex={-1} class="card mt-5 shadow-sm">
        <h5 className="text-center card-header">Snack 1</h5>
        <div className="d-flex justify-content-center align-center flex-column card-body">
        {loading === 3 ? <div className="d-flex justify-content-center"><div className="spinner-border text-primary"></div></div> :
            <>
            <label>Food</label>
            <input required name="snackfood"></input>
            <label>Carbs</label>
            <input required  name="snackcarbs"></input>
            <label>Time</label>
            <input required name="snacktime"></input>
            <label>Insulin</label>
            <input required name="snackinsulin"></input>
            <label>Sugars</label>
            <input required name="snacksugars"></input>
            {nextCard >= 4 ? 
            <button className="mt-3 btn btn-secondary" disabled>Saved</button>
            : <button href='#' ref={containerRef}  onClick={() => nextCardValidate(4)} className="mt-3 btn btn-primary">Next</button>
            }
            </>
        }
        </div>
        </div>
        }   

        
        {nextCard >= 4 &&
        <div ref={containerRef} tabIndex={-1} className="card mt-5 shadow-sm">
        <h5 className="text-center card-header">Lunch</h5>
        <div className="d-flex justify-content-center align-center flex-column card-body">
            {loading === 4 ? <div className="d-flex justify-content-center"><div className="spinner-border text-primary"></div></div> :
            <>
            <label>Food</label>
            <input required name="lunchfood"></input>
            <label>Carbs</label>
            <input required name="lunchcarbs"></input>
            <label>Time</label>
            <input required name="lunchtime"></input>
            <label>Insulin</label>
            <input required name="lunchinsulin"></input>
            <label>Sugars</label>
            <input required name="lunchsugars"></input>
            {nextCard >= 5 ? 
            <button className="mt-3 btn btn-secondary" disabled>Saved</button>
            : <button href='#' ref={containerRef}  onClick={() => nextCardValidate(5)} className="mt-3 btn btn-primary">Next</button>
            }
            </>
            }   
        </div>
        </div>
        }   


    
        {nextCard >= 5 &&
        <div ref={containerRef} tabIndex={-1} class="card mt-5 shadow-sm">
        <h5 className="text-center card-header">Snack 2</h5>
        <div className="d-flex justify-content-center align-center flex-column card-body">
        {loading === 5 ? <div className="d-flex justify-content-center"><div className="spinner-border text-primary"></div></div> :
            <>
            <label>Food</label>
            <input required name="snackfood2"></input>
            <label>Carbs</label>
            <input required name="snackcarbs2"></input>
            <label>Time</label>
            <input required name="snacktime2"></input>
            <label>Insulin</label>
            <input required name="snackinsulin2"></input>
            <label>Sugars</label>
            <input required name="snacksugars2"></input>
            {nextCard >= 6 ? 
            <button className="mt-3 btn btn-secondary" disabled>Saved</button>
            : <button href='#' ref={containerRef}  onClick={() => nextCardValidate(6)}  className="mt-3 btn btn-primary">Next</button>
            }
            </>
        }
        </div>
        </div>
        }

       
        {nextCard >= 6 &&
        <div ref={containerRef} tabIndex={-1} class="card mt-5 shadow-sm">
        <h5 className="text-center card-header">DINNER</h5>
        <div className="d-flex justify-content-center align-center flex-column card-body">
        {loading === 6 ? <div className="d-flex justify-content-center"><div className="spinner-border text-primary"></div></div> :
            <>
            <label>Food</label>
            <input required name="dinnerfood"></input>
            <label>Carbs</label>
            <input required name="dinnercarbs"></input>
            <label>Time</label>
            <input required name="dinnertime"></input>
            <label>Insulin</label>
            <input required name="dinnerinsulin"></input>
            <label>Sugars</label>
            <input required name="dinnersugars"></input>
            {nextCard >= 7 ? 
            <button className="mt-3 btn btn-secondary" disabled>Saved</button>
            : <button href='#' ref={containerRef}  onClick={() => nextCardValidate(7)} className="mt-3 btn btn-primary">Next</button>
            }
            </>
            }
        </div>
        </div>
        }

      
        {nextCard >= 7 &&
        <div ref={containerRef} tabIndex={-1} className="card mt-5 shadow-sm">
        <h5 className="text-center card-header">Snack 3</h5>
        <div className="d-flex justify-content-center align-center flex-column card-body">
        {loading === 7 ? <div className="d-flex justify-content-center"><div className="spinner-border text-primary"></div></div> :
            <>
            <label>Food</label>
            <input required name="snackfood3"></input>
            <label>Carbs</label>
            <input required name="snackcarbs3"></input>
            <label>Time</label>
            <input required name="snacktime3"></input>
            <label>Insulin</label>
            <input required name="snackinsulin3"></input>
            <label>Sugars</label>
            <input required name="snacksugars3"></input>
            {submitLoading ? <div className="d-flex justify-content-center"><div className="spinner-border text-success mt-3"></div></div> :
            <button href='#' ref={containerRef}  className="mt-3 btn btn-success">{recordInserted ? "SUCCESS!" : "Submit"}</button>
            }
            {recordInserted && <button onClick={() => props.renderParent()} className="mt-3 btn btn-success mt-3">Back to home</button>}
            </>
        }
        </div>
        </div>
        }

    
        </form>
    </div>
    </>
  )
}

export default Create;