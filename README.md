
## Quick: Test Google Tag Manager with ?#google-wcc-debug

To quickly test Google Tag Manager (GTM) when you see `?#google-wcc-debug` in the URL, append the fragment to any public page URL and reload.

- Example URL:

  - `https://www.example.com/page.html?#google-wcc-debug`

- Steps:
  1. Open the page URL with `?#google-wcc-debug` appended.
  2. Open your browser DevTools and watch the Network/Console for GTM requests and any debug messages.
  3. Use GTM Preview/Debug (Tag Assistant) to verify tags fire as expected.

- Notes:
  - The fragment is added by external tools/extensions; the site code shouldn't rely on it.

