export default {
  async fetch(request) {
    const urlParams = new URL(request.url).searchParams;
    const id = urlParams.get("id") || 1;

    const apiUrl = `https://high-kora.com:443/TOD/WEB/BEIN/api.php?id=${id}`;

    const response = await fetch(apiUrl, {
      headers: {
        "User-Agent": "Mozilla/5.0 (Linux; Android 10; K)",
        "Referer": `https://high-kora.com/TOD/WEB/BEIN/bs${id}.php`
      }
    });

    const text = await response.text();
    return new Response(text.replace(/\\\//g, "/"), {
      headers: {
        "Content-Type": "application/json",
        "Access-Control-Allow-Origin": "*",
        "Access-Control-Allow-Methods": "GET, OPTIONS"
      }
    });
  }
}