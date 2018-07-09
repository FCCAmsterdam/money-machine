/*jshint esversion: 6 */

let records = {
  records: [{
      "amount": -44,
      "date": "2018-05-21",
      "category": "Groceries",
      "description": "Bread and vegetables"
    },
    {
      "amount": 1200,
      "date": "2018-05-20",
      "category": "Salary",
      "description": "Monthly salary from Acme"
    },
    {
      "amount": -32,
      "date": "2018-05-18",
      "category": "Fun money",
      "description": "Eating snacks with friends"
    },
    {
      "amount": -3,
      "date": "2018-05-14",
      "category": "Groceries",
      "description": "Toothpaste"
    },
  ]
};

window.addEventListener("load", function() {

  function loadData() {
    return records;
  }

  function updateTable() {
    // we read the form data in an ugly way now
    let rowData = {
      'date': document.getElementById("date").value,
      'description': document.getElementById("description").value,
      'category': document.getElementById("category").value,
      'amount': document.getElementById("amount").value
    };

    let newRow = appendRow(table, rowData);
  }

  function sendData() {
    // Now we send the data to the backend.
    var XHR = new XMLHttpRequest();

    // Bind the FormData object and the form element
    var FD = new FormData(form);

    // Define what happens on successful data submission
    XHR.addEventListener("load", function(event) {
      alert(event.target.responseText);
    });

    // Define what happens in case of error
    XHR.addEventListener("error", function(event) {
      alert('Oops! Something went wrong.');
    });

    // Set up our request
    XHR.open("POST", "http://httpbin.org/post");

    // The data sent is what the user provided in the form
    XHR.send(FD);
  }

  // Access the form element...
  var form = document.getElementById("add_record");

  // ...and take over its submit event.
  form.addEventListener("submit", function(event) {
    event.preventDefault();

    sendData();
    updateTable();
  });

  function update(table, data) {
    for (let row of data.records) {
      appendRow(table, row);
    }
  }

  function appendRow(table, rowData) {
    let newRow = table.insertRow(-1);
    newRow.insertCell(-1).innerText = rowData.date;
    newRow.insertCell(-1).innerText = rowData.category;
    newRow.insertCell(-1).innerText = rowData.description;
    newRow.insertCell(-1).innerText = rowData.amount;
    return newRow;
  }

  let table = document.getElementById("records");

  update(table, loadData());


  // You can get and set dates with moment objects
  var picker = new Pikaday({
    field: document.getElementById('date'),
    firstDay: 1, // Week starts on Monday
    defaultDate: moment().toDate(), //14 Mar 2015
    setDefaultDate: true,
    minDate: new Date(2000, 0, 1),
    maxDate: new Date(),
    yearRange: [2000, 2020],
  });
  //picker.setMoment(moment().dayOfYear(366));

});
