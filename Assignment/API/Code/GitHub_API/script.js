async function getGitHubUser() 
{
  const username = document.getElementById("username").value.trim();
  const profileDiv = document.getElementById("profile");
  const reposDiv = document.getElementById("repos");

  if (username === "") 
  {
    profileDiv.innerHTML = "<p style='color:red;'>Please enter a username.</p>";
    reposDiv.innerHTML = "";
    return;
  }

  try 
  {
    const userResponse = await fetch(`https://api.github.com/users/${username}`); // fetch user data
    if (!userResponse.ok) throw new Error("User not found");
    const userData = await userResponse.json();

    // Display user profile
    profileDiv.innerHTML = `
      <img src="${userData.avatar_url}" alt="Avatar">
      <h2>${userData.name || userData.login}</h2>
      <p>👥 Followers: ${userData.followers} | Following: ${userData.following}</p>
      <p>📦 Public Repos: ${userData.public_repos}</p>
      <a href="${userData.html_url}" target="_blank">View Profile on GitHub</a>
    `;

    
    const repoResponse = await fetch(`https://api.github.com/users/${username}/repos`);  //fetch repositories
    const repos = await repoResponse.json();

    
    reposDiv.innerHTML = "<h3>Repositories:</h3>";  // display repositories
    let repoHTML = "<div class='repo-list'>";
    repos.forEach(repo => {
      repoHTML += `
        <div class="repo">
          <a href="${repo.html_url}" target="_blank">${repo.name}</a>
          <p>${repo.description ? repo.description : "No description"}</p>
          <p>⭐ ${repo.stargazers_count} | 🍴 ${repo.forks_count}</p>
        </div>
      `;
    });
    repoHTML += "</div>";
    reposDiv.innerHTML += repoHTML;

  } 
  catch (error) 
  {
    profileDiv.innerHTML = `<p style='color:red;'>Error: ${error.message}</p>`;
    reposDiv.innerHTML = "";
  }
}
