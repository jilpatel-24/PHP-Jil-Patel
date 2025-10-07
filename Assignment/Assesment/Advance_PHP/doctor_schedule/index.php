<html>
<head>
  <meta charset="UTF-8">
  <title>Doctor Schedule Manager</title>
  <style>
    body { font-family: Arial; margin: 20px; }
    table { border-collapse: collapse; width: 100%; margin-top: 20px; }
    th, td { border: 1px solid #ddd; padding: 8px; }
    th { background: #f4f4f4; }
  </style>
</head>
<body>
  <h2>Upload Doctor Schedules (CSV)</h2>
  <form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file" accept=".csv" required>
    <button type="submit">Upload</button>
  </form>

  <h2>Search / Filter</h2>
  <label>Department: <input type="text" id="department"></label>
  <label>Availability: <input type="text" id="availability"></label>
  <button onclick="searchSchedules()">Search</button>

  <h2>Results</h2>
  <table id="results">
    <thead>
      <tr>
        <th>Name</th>
        <th>Department</th>
        <th>Availability</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>

  <script>
    function searchSchedules() {
      let dept = document.getElementById("department").value;
      let avail = document.getElementById("availability").value;
	   
	   
      fetch(`search.php?department=${dept}&availability=${avail}`) // send a GET request to 'search.php' with the department and availability as query parameters
        .then(res => res.json()) // convert the response to JSON format
		
		// once the data is received, process it
        .then(data => {
          let tbody = document.querySelector("#results tbody");
          tbody.innerHTML = "";
		  
		  // Loop through each record (d) in the fetched data array
          data.forEach(d => {
            let row = `<tr>
              <td>${d.name}</td>
              <td>${d.department}</td>
              <td>${d.availability}</td>
            </tr>`;
            tbody.innerHTML += row;
          });
        });
    }
  </script>
</body>
</html>
