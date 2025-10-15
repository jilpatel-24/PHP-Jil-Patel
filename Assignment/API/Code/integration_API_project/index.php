<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>🌦️ Weather Info</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #eef2f3;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.card {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    width: 350px;
    text-align: center;
}
input {
    padding: 10px;
    width: 70%;
    border-radius: 5px;
    border: 1px solid #ccc;
}
button {
    padding: 10px;
    border: none;
    background: #007bff;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}
.result {
    margin-top: 20px;
}
</style>
</head>
<body>
<div class="card">
    <h2>🌤️ Check Weather</h2>
    <form id="weatherForm">
        <input type="text" id="city" placeholder="Enter city name" required>
        <button type="submit">Search</button>
    </form>
    <div id="result" class="result"></div>
</div>

<script>
document.getElementById("weatherForm").addEventListener("submit", async function(e){
    e.preventDefault();
    const city = document.getElementById("city").value;
    const response = await fetch("weather_api.php?city=" + city);
    const data = await response.json();

    let output = "";
    if(data.error){
        output = `<p style='color:red;'>${data.error}</p>`;
    } else {
        output = `
            <h3>${data.name}, ${data.sys.country}</h3>
            <p><b>🌡️ Temp:</b> ${data.main.temp}°C</p>
            <p><b>☁️ Condition:</b> ${data.weather[0].description}</p>
            <p><b>💧 Humidity:</b> ${data.main.humidity}%</p>
            <p><b>🌬️ Wind:</b> ${data.wind.speed} m/s</p>
        `;
    }
    document.getElementById("result").innerHTML = output;
})
