---
name: add-new-content
description: Create a new SEO-friendly browser game page for games.addeos.com, on a seasonal or trending theme. Use when the user asks for a new game, a new game page, or a new SEO page/guide on the games site.
---

You are an SEO expert and a front-end game developer. On this site every game **is** the
SEO page: one landing page per game at `/g/<slug>`, with a title, a meta description,
a playable game and a short descriptive text. Pick a theme people are searching for right
now and build a small, polished game around it.

## How a game page works

- Games are rows in the `games` table of the **committed** SQLite database
  `database/database.sqlite` (deploys use this file; there are no seeders or migrations to
  add for a new game).
- Columns: `name`, `slug` (unique), `short_description`, `description`, `html`, `css`,
  `js`, `created_at`, `updated_at`.
- `/g/{slug}` (`GameController` → `resources/views/game.blade.php`) renders:
  - `<title>` = `name`, `<meta name="description">` = `short_description`, canonical URL;
  - the game: `{!! html !!}`, then `<style>{!! css !!}</style>`, then `<script>{!! js !!}</script>`;
  - share buttons (hidden until a game ends) that read `#hiddenScore`;
  - `{!! description !!}` (HTML) under the game, then the CSS/HTML/JS source shown as code.
- The home page lists every game (newest `created_at` first) and `/sitemap.xml` lists every
  slug automatically. Nothing else needs to change to publish a game.

## 1. Pick the theme

- Check what exists: `sqlite3 database/database.sqlite "select id, name, slug, created_at from games order by id"`.
  Never duplicate a game mechanic + theme pair; a known mechanic in a fresh theme is fine.
- Use WebSearch ("standard" mode) to tie the game to the moment (today's date is in your
  context): upcoming holidays and events (Halloween, Christmas, Valentine's Day, Easter,
  summer, back to school, the Olympics, a World Cup…), seasons, and trending games or
  memes that people search for ("<event> game online", "free <theme> game").
- Balance the catalogue: if a theme already has 3+ games, prefer another angle or mechanic
  (e.g. a word or puzzle game rather than another reflex game).
- Pick a mechanic that is fun in under a minute and works on **both mobile (touch) and
  desktop (mouse/keyboard)**: catch, dodge, flap, memory, shuffle, whack, match, quick
  maths, word or reaction games.
- Choose a primary keyword (e.g. "halloween game online") and tell the user the theme,
  mechanic and keyword in one or two lines before building.

## 2. Write the page fields

- `name`: ≤ 60 characters, keyword near the start, an emoji or two like the recent games,
  e.g. `🦇 Bat Flap - Halloween Game 🌕`.
- `slug`: lowercase kebab-case, keyword-bearing, unique (e.g. `bat-flap`).
- `short_description`: the meta description, 110–160 characters, one emoji at most at the
  start, states what you do and invites to play on mobile or desktop.
- `description`: HTML, one or two `<p>` paragraphs (60–120 words) that tell the little story,
  the goal, the controls and how the game ends, ending with a question that invites to play
  again. No `<h1>` (the game HTML has it).

## 3. Write the game

Conventions (copy them from a recent game, e.g.
`sqlite3 database/database.sqlite "select html, css, js from games where slug='bat-flap'"`):

- **HTML**: a wrapper `<div class="<prefix>-game">` with `<h1>` (the game name), an
  `.instructions` line, a score line, the play area (`<canvas>` or a grid of elements), a
  message line and a `Start` button. Prefix every id and class with a short game prefix
  (`bat`, `ghost`…) so nothing clashes with the layout.
- **CSS**: scoped to the prefixed classes; play area `max-width: 100%` and
  `touch-action: manipulation` so it fits phones and taps don't zoom.
- **JS**: plain browser JavaScript, no libraries, no imports. It runs at the end of the body,
  so the DOM is already there.
  - Update the hidden score on every point: `document.getElementById('hiddenScore').value = score;`
  - On game over show the share buttons: `document.querySelector('.share-buttons').style.display = 'flex';`
    and hide them again when a new game starts (`'none'`), resetting `hiddenScore` to 0.
  - Support touch (`touchstart` with `preventDefault`), mouse and keyboard where it makes sense.
  - Use `requestAnimationFrame` with **frame-rate independent** movement (scale by elapsed
    time), and let the player start when ready (e.g. wait for the first tap).
  - Difficulty ramps up gradually; one clear lose condition; show the final score in the
    message and keep a best score in `localStorage` (wrapped in `try/catch`).
  - Do not use backtick template literals with `${}` inside text that could be mangled when
    inserting the row; build strings with `+` (see commit `e4c19c7`, which restored values
    lost that way).

## 4. Insert the row

Insert with a PHP script through Laravel (parameter binding, so quotes and `${}` survive),
not by hand-written SQL, e.g. a temporary script in the scratchpad run with `php`:

```php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
Illuminate\Support\Facades\DB::table('games')->insert([
    'name' => $name, 'slug' => $slug, 'short_description' => $short,
    'description' => $description,
    'html' => file_get_contents($dir . '/game.html'),
    'css' => file_get_contents($dir . '/game.css'),
    'js' => file_get_contents($dir . '/game.js'),
    'created_at' => now(), 'updated_at' => now(),
]);
```

To fix a game later, `update` the same row and bump `updated_at` (it feeds the sitemap
`lastmod`).

## 5. Verify

- `node --check` the JS file before inserting it.
- Request the page through the app and check it returns 200 and contains the game:
  `php artisan serve` (or the Docker setup), then `curl -s localhost:8000/g/<slug> | grep -c '<prefix>-game'`
  and `curl -s localhost:8000/sitemap.xml | grep <slug>`.
- Play it once in a browser if one is available (desktop and a narrow mobile width): start,
  score, lose, share buttons appear, restart works.

## 6. Report

Tell the user the theme, keyword, URL (`https://games.addeos.com/g/<slug>`) and how it was
checked. Do not commit unless asked (`cp` commits and pushes). The commit contains
`database/database.sqlite` only.
