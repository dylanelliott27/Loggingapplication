const mysql = require('mysql');
const express = require('express');
const app = express();
const fs = require('fs');
const cors = require('cors');
const bodyParser = require('body-parser');
const multer = require('multer');
const upload = multer();
const port = process.env.PORT || 2000;
const path = require("path");

if (process.env.NODE_ENV !== 'production') {
    require('dotenv').config()
  }

app.use(bodyParser.json()); // support json encoded bodies
app.use(bodyParser.urlencoded({ extended: true })); 
app.use(cors());

if (process.env.NODE_ENV === 'production') {
    // Serve any static files
    app.use(express.static(path.join(__dirname, 'client/build')));
  // Handle React routing, return all requests to React app
    app.get('*', function(req, res) {
      res.sendFile(path.join(__dirname, 'client/build', 'index.html'));
    });
  }


app.get('/api/retrieve', (req, res) => {
    const connection = mysql.createConnection({
        host : process.env.HOST,
        ssl  : {
            ca : fs.readFileSync(__dirname + process.env.SSL)
        },
        user : process.env.USER,
        password : process.env.PASS,
        database : process.env.DB
    })
    console.log(req.query);
    connection.connect(() => {
        console.log("connection made to mysql");
    })
    
    connection.query(`SELECT * from Diabeteslogs where date = '${req.query.date}'`, (error, results, fields) => {
        if(error) throw error;
        var normalResults = results.map((results, index) => {
            return Object.assign({}, results);
        });
        console.log(normalResults);
        /*results.forEach(row => {
            console.log(row.carbs);
        })*/
        res.send(normalResults);
    })
    
    connection.end();
})

app.listen(port, () => {
    console.log("hello");
})

app.post('/api/insert', upload.none(), (req, res) => {
    const forminfo = Object.assign({}, req.body);
    const query1 = `insert into Diabeteslogs (date, mealtype, food, carbs, time, insulin, sugars) VALUES ('${forminfo.date}', 'Breakfast', '${forminfo.breakfastfood}', '${forminfo.breakfastcarbs}', '${forminfo.breakfasttime}', '${forminfo.breakfastinsulin}', '${forminfo.breakfastsugars}');`;
    const query2 = `insert into Diabeteslogs (date, mealtype, food, carbs, time, insulin, sugars) VALUES ('${forminfo.date}', 'Snack 1', '${forminfo.snackfood}', '${forminfo.snackcarbs}', '${forminfo.snacktime}', '${forminfo.snackinsulin}', '${forminfo.snacksugars}');`;
    const query3 = `insert into Diabeteslogs (date, mealtype, food, carbs, time, insulin, sugars) VALUES ('${forminfo.date}', 'Lunch', '${forminfo.lunchfood}', '${forminfo.lunchcarbs}', '${forminfo.lunchtime}', '${forminfo.lunchinsulin}', '${forminfo.lunchsugars}');`;
    const query4 = `insert into Diabeteslogs (date, mealtype, food, carbs, time, insulin, sugars) VALUES ('${forminfo.date}', 'Snack 2', '${forminfo.snackfood2}', '${forminfo.snackcarbs2}', '${forminfo.snacktime2}', '${forminfo.snackinsulin2}', '${forminfo.snacksugars2}');`;
    const query5 = `insert into Diabeteslogs (date, mealtype, food, carbs, time, insulin, sugars) VALUES ('${forminfo.date}', 'Dinner', '${forminfo.dinnerfood}', '${forminfo.dinnercarbs}', '${forminfo.dinnertime}', '${forminfo.dinnerinsulin}', '${forminfo.dinnersugars}');`;
    const query6 = `insert into Diabeteslogs (date, mealtype, food, carbs, time, insulin, sugars) VALUES ('${forminfo.date}', 'Snack 3', '${forminfo.snackfood3}', '${forminfo.snackcarbs3}', '${forminfo.snacktime3}', '${forminfo.snackinsulin3}', '${forminfo.snacksugars3}');`;
    //console.log(req.body);

    console.log(forminfo);

    const connection = mysql.createConnection({
        host : process.env.HOST,
        ssl  : {
            ca : fs.readFileSync(__dirname + process.env.SSL)
        },
        user : process.env.USER,
        password : process.env.PASS,
        database : process.env.DB,
        multipleStatements: true
    })


    connection.connect(() => {
        console.log("connection made to mysql");
    })
    
    connection.query(`${query1} ${query2} ${query3} ${query4} ${query5} ${query6}`, [1,2,3,4,5,6], (error, results, fields) => {
        if(error) throw error;
        res.status(200).send();
    })
    
    connection.end();
})