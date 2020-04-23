import React from 'react'


export default function Chart(props) {
    return (
    <>
        <img src={require('./chart.png')} />
        <button onClick={() => {props.renderParent()}}className="btn btn-danger">Back to Home</button>
    </>
    )
}
