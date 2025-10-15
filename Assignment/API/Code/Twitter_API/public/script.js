async function searchHashtag() {
  const tag = document.getElementById('hashtagInput').value.trim();
  const tweetsDiv = document.getElementById('tweets');
  tweetsDiv.innerHTML = "Loading...";

  if (!tag) {
    tweetsDiv.innerHTML = "Please enter a hashtag.";
    return;
  }

  try {
    const resp = await fetch(`/api/hashtag/${tag}`);
    const json = await resp.json();

    if (json.error) {
      tweetsDiv.innerHTML = `Error: ${JSON.stringify(json.error)}`;
      return;
    }

    const tweets = json.data || [];
    if (tweets.length === 0) {
      tweetsDiv.innerHTML = "No tweets found for this hashtag.";
      return;
    }

    let html = "<ul>";
    tweets.forEach(t => {
      html += `<li><strong>${t.created_at}</strong>: ${t.text}</li>`;
    });
    html += "</ul>";
    tweetsDiv.innerHTML = html;

  } catch (err) {
    console.error("Error:", err);
    tweetsDiv.innerHTML = "An error occurred fetching tweets.";
  }
}
