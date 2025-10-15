<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>GitHub Profile Viewer</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>GitHub Profile Viewer</h1>

  <div class="search">
    <input type="text" id="username" placeholder="Enter GitHub username">
    <button onclick="fetchGitHubUser()">Search</button>
  </div>

  <div id="profile"></div>
  <div id="repos"></div>
  <canvas id="contributionsChart" width="400" height="200"></canvas>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="script.js"></script>
</body>
</html>
