<?php
/**
 * Front page section: finder.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="finder">
  <div class="container">
    <div>
      <h2>Looking for the right product for your project?</h2>
      <p>Tell us what you're working on — our technical team will recommend the right system.</p>
    </div>
    <form class="finder__form" onsubmit="event.preventDefault(); location.hash='contact';">
      <div class="select">
        <select aria-label="Application area">
          <option>I'm working on…</option>
          <option>Floors</option>
          <option>Walls & façades</option>
          <option>Wet areas & roofs</option>
          <option>Tiles & stone</option>
          <option>Pipes & plumbing</option>
        </select>
      </div>
      <div class="select">
        <select aria-label="Requirement">
          <option>I need…</option>
          <option>Material supply</option>
          <option>Supply & application</option>
          <option>Technical submittals</option>
          <option>Product recommendation</option>
        </select>
      </div>
      <button class="btn btn--dark" type="submit">Find Solution <svg><use href="#i-arrow"/></svg></button>
    </form>
  </div>
</section>
