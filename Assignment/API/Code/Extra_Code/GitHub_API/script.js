async function fetchGitHubUser() 
{
  const username = document.getElementById("username").value;
  if (!username) return alert("Enter a username!");

  const profileDiv = document.getElementById("profile");
  const reposDiv = document.getElementById("repos");
  profileDiv.innerHTML = "Loading...";
  reposDiv.innerHTML = "";

  try 
  {
    
    const userRes = await fetch(`https://api.github.com/users/${username}`);  // fetch user profile
    if (!userRes.ok) throw new Error("User not found!");
    const user = await userRes.json();

    profileDiv.innerHTML = `
      <img src="${user.avatar_url}" width="100" style="border-radius:50%">
      <h2>${user.name || user.login}</h2>
      <p>${user.bio || ""}</p>
      <p>Followers: ${user.followers} | Following: ${user.following}</p>
      <a href="${user.html_url}" target="_blank">View on GitHub</a>
    `;

    
    const reposRes = await fetch(`https://api.github.com/users/${username}/repos?per_page=10&sort=updated`);  // fetch repositories
    const repos = await reposRes.json();

    reposDiv.innerHTML = `<h3>Repositories</h3>`;
    repos.forEach(repo => {
      reposDiv.innerHTML += `
        <div class="repo">
          <h4><a href="${repo.html_url}" target="_blank">${repo.name}</a></h4>
          ⭐ ${repo.stargazers_count} | 🍴 ${repo.forks_count} | 🐛 ${repo.open_issues_count}
        </div>
      `;
    });

    // Contribution data (simulated or via GraphQL)
    generateContributionGraph(username);

  } 
  catch (error) 
  {
    profileDiv.innerHTML = `<p style='color:red;'>${error.message}</p>`;
  }
}

async function generateContributionGraph(username) 
{
  
  const data = Array.from({ length: 12 }, () => Math.floor(Math.random() * 100));   // fetch contribution data

  const ctx = document.getElementById("contributionsChart").getContext("2d");
  new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
      datasets: [{
        label: "Commits per Month",
        data: data,
      }]
    },
    options: 
	{
      scales: { y: { beginAtZero: true } }
    }
  });
}
