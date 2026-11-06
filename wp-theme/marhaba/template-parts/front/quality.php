<?php
/**
 * Front page section: quality.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="section">
  <div class="container">
    <div class="section-head reveal">
      <div>
        <span class="eyebrow">Quality &amp; Capability</span>
        <h2>Quality you can rely on, capacity you can count on.</h2>
      </div>
    </div>
    <div class="quality">
      <div class="q-card reveal">
        <img src="https://media.myklaticrete.com/mykl/2026/04/images5-1-1.webp" alt="" loading="lazy">
        <div class="q-card__body">
          <h3>Quality Assurance</h3>
          <p>We source from reputed, established manufacturers. Quality checks are carried out at supplier level and through our own internal processes.</p>
          <a href="#" class="btn btn--ghost">Our Quality Approach <svg><use href="#i-arrow"/></svg></a>
        </div>
      </div>
      <div class="q-card reveal">
        <img src="<?php echo esc_url( marhaba_img( 'who.jpg' ) ); ?>" alt="" loading="lazy">
        <div class="q-card__body">
          <h3>Office &amp; Warehousing</h3>
          <p>Organised storage for our full range of finishing materials, chemicals and flooring — backed by our own delivery fleet.</p>
          <div class="q-card__meta">
            <div><strong>1,200 m²</strong><span>Storage facility</span></div>
            <div><strong>200 m²</strong><span>A/C chemical storage</span></div>
            <div><strong>7</strong><span>Fleet vehicles</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
