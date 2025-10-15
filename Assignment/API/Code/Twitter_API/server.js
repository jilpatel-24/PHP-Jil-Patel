const express = require('express');
const fetch = require('node-fetch');
const app = express();
const PORT = 3000;

// Replace this with your Twitter Bearer Token
const BEARER_TOKEN = "YOUR_TWITTER_BEARER_TOKEN";

// Enable serving static files (frontend)
app.use(express.static('public'));

// API endpoint to fetch tweets by hashtag
app.get('/api/hashtag/:tag', async (req, res) => {
  const tag = req.params.tag;
  const query = encodeURIComponent(`#${tag}`);
  const url = `https://api.twitter.com/2/tweets/search/recent?query=${query}&tweet.fields=author_id,created_at,text&max_results=10`;

  try {
    const response = await fetch(url, {
      headers: {
        "Authorization": `Bearer ${BEARER_TOKEN}`
      }
    });

    if (!response.ok) {
      const err = await response.json();
      return res.status(response.status).json({ error: err });
    }

    const data = await response.json();
    res.json(data);
  } catch (error) {
    console.error("Error fetching tweets:", error);
    res.status(500).json({ error: "Internal server error" });
  }
});

app.listen(PORT, () => {
  console.log(`Server running on http://localhost:${PORT}`);
});
