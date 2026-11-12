<?php
/**
 * Front page section: brands (static fallback, used until brands are published).
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="section section--sand" id="brands">
  <div class="container">
    <div class="section-head reveal">
      <div>
        <span class="eyebrow">Our Product Portfolio</span>
        <h2>Established brands, selected for modern construction.</h2>
      </div>
      <p>International and regional manufacturers chosen to meet the technical, functional and aesthetic requirements of every project.</p>
    </div>

    <div class="brand-tabs reveal">
      <div class="brand-list" role="tablist">
        <button class="is-active" data-brand="laticrete"><span>LATICRETE<small>Tile, stone & resinous systems</small></span><svg><use href="#i-arrow"/></svg></button>
        <button data-brand="dcp"><span>DCP<small>Saudi Arabia · Construction chemicals</small></span><svg><use href="#i-arrow"/></svg></button>
        <button data-brand="gerflor"><span>GERFLOR / BOSTIK<small>Floor coverings & adhesives</small></span><svg><use href="#i-arrow"/></svg></button>
        <button data-brand="wonderfloor"><span>Wonderfloor<small>Vinyl flooring</small></span><svg><use href="#i-arrow"/></svg></button>
        <button data-brand="terraco"><span>Terraco<small>Eco-conscious finishing</small></span><svg><use href="#i-arrow"/></svg></button>
        <button data-brand="triton"><span>Triton Middle East<small>UAE · Sealants & coatings</small></span><svg><use href="#i-arrow"/></svg></button>
        <button data-brand="insuwrap"><span>INSUWRAP PVC<small>Hot-air welded membranes</small></span><svg><use href="#i-arrow"/></svg></button>
        <button data-brand="ezweld"><span>E-Z Weld &amp; HP International<small>PVC solvent cements</small></span><svg><use href="#i-arrow"/></svg></button>
      </div>

      <div class="brand-panels">
        <div class="brand-panel is-active" id="brand-laticrete">
          <div class="brand-panel__body">
            <div class="brand-logo"><img src="https://media.myklaticrete.com/mykl/2024/09/MYK-L-Logo-1-2.svg" alt="LATICRETE"></div>
            <h3>Complete tile, stone &amp; concrete systems</h3>
            <p>A comprehensive range of products and systems supporting residential, commercial, institutional and infrastructure applications.</p>
            <div class="tags"><span>Tile & stone installation</span><span>Masonry</span><span>Resinous & decorative flooring</span><span>Concrete chemicals</span><span>Concrete restoration</span></div>
            <a href="#" class="link-arrow">View LATICRETE range <svg><use href="#i-arrow"/></svg></a>
          </div>
          <div class="brand-panel__media"><img src="https://media.myklaticrete.com/mykl/2026/04/stone-adhesive-1.webp" alt="" loading="lazy"><span class="brand-origin">USA</span></div>
        </div>

        <div class="brand-panel" id="brand-dcp">
          <div class="brand-panel__body">
            <div class="brand-logo"><img src="https://www.dcp-int.com/themes/dcp/images/logo.svg" alt="DCP"></div>
            <h3>Specialised construction &amp; finishing materials</h3>
            <p>Dry-mix building materials, tile adhesives, grouts, renders, plasters, repair products, waterproofing, flooring and sealants for every project type.</p>
            <div class="tags"><span>Dry-mix materials</span><span>Tile adhesives & grouts</span><span>Renders & plasters</span><span>Waterproofing</span><span>Repair</span><span>Sealants</span></div>
            <a href="#" class="link-arrow">View DCP range <svg><use href="#i-arrow"/></svg></a>
          </div>
          <div class="brand-panel__media"><img src="<?php echo esc_url( marhaba_img( 'hero-waterproofing.jpg' ) ); ?>" alt="" loading="lazy" style="object-position:85% center"><span class="brand-origin">Saudi Arabia</span></div>
        </div>

        <div class="brand-panel" id="brand-gerflor">
          <div class="brand-panel__body">
            <div class="brand-logo brand-logo--pair"><img src="https://www.gerflor.com/themes/custom/gerflor_base/logo.svg" alt="GERFLOR"><span class="brand-logo__sep"></span><img src="https://www.bostik.com/files/live/sites/shared_bostik/files/images/Logos/Bostik_Logo_Header.svg" alt="BOSTIK"></div>
            <h3>Floor coverings, adhesives &amp; maintenance</h3>
            <p>Versatile solutions for floor coverings, carpet and wallpaper adhesives, ceramic tile adhesives and floor maintenance.</p>
            <div class="tags"><span>Floor coverings</span><span>Carpet adhesives</span><span>Wallpaper adhesives</span><span>Ceramic tile adhesives</span><span>Floor care</span></div>
            <a href="#" class="link-arrow">View range <svg><use href="#i-arrow"/></svg></a>
          </div>
          <div class="brand-panel__media"><img src="https://media.myklaticrete.com/mykl/2026/04/Mask2-1.webp" alt="" loading="lazy"><span class="brand-origin">France</span></div>
        </div>

        <div class="brand-panel" id="brand-wonderfloor">
          <div class="brand-panel__body">
            <div class="brand-logo"><img src="https://www.wonderfloor.co.in/assets/img/logo/logo.png" alt="Wonderfloor"></div>
            <h3>Recognised vinyl flooring for every space</h3>
            <p>Vinyl floor coverings, PVC geomembranes, artificial leather, PVC films and sheetings for healthcare, sports, hospitality, retail and more.</p>
            <div class="tags"><span>Healthcare</span><span>Sports</span><span>Hotels</span><span>Offices</span><span>Transportation</span><span>Modular buildings</span></div>
            <a href="#" class="link-arrow">View Wonderfloor range <svg><use href="#i-arrow"/></svg></a>
          </div>
          <div class="brand-panel__media"><img src="https://media.myklaticrete.com/mykl/2026/04/masks9-1.webp" alt="" loading="lazy"><span class="brand-origin">India</span></div>
        </div>

        <div class="brand-panel" id="brand-terraco">
          <div class="brand-panel__body">
            <div class="brand-logo"><img class="logo-dark" src="https://b4366279.assetcdn.net/2.0/4366279/wp-content/uploads/2026/01/Terraco-White-Logo-Main.png" alt="Terraco"></div>
            <h3>Environmentally conscious finishes</h3>
            <p>Quality finishes that support durability, comfort and improved energy efficiency across façades, floors and interiors.</p>
            <div class="tags"><span>EIFS / ETICS</span><span>Surface preparation</span><span>Waterproofing</span><span>Repair</span><span>Performance coatings</span><span>Tiling</span></div>
            <a href="#" class="link-arrow">View Terraco range <svg><use href="#i-arrow"/></svg></a>
          </div>
          <div class="brand-panel__media"><img src="https://media.myklaticrete.com/mykl/2026/04/stones-or-tiles-fixing-on-external-facade-1.webp" alt="" loading="lazy"><span class="brand-origin">Global</span></div>
        </div>

        <div class="brand-panel" id="brand-triton">
          <div class="brand-panel__body">
            <div class="brand-logo"><span class="wordmark">TRITON<small>Middle East</small></span></div>
            <h3>High-performance sealants &amp; protective coatings</h3>
            <p>UAE-manufactured sealant and coating solutions engineered for the region's climate and construction demands.</p>
            <div class="tags"><span>Silicone sealants</span><span>Hybrid PU sealants</span><span>Acrylic sealants</span><span>Specialty sealants</span><span>Protective coatings</span></div>
            <a href="#" class="link-arrow">View Triton range <svg><use href="#i-arrow"/></svg></a>
          </div>
          <div class="brand-panel__media"><img src="https://media.myklaticrete.com/mykl/2026/04/images8-1.webp" alt="" loading="lazy"><span class="brand-origin">UAE</span></div>
        </div>

        <div class="brand-panel" id="brand-insuwrap">
          <div class="brand-panel__body">
            <div class="brand-logo"><img src="https://www.saveto.com/sites/default/files/2025-04/insuwrap-colored.svg" alt="INSUWRAP"></div>
            <h3>Hot-air welded PVC waterproofing</h3>
            <p>Homogeneous PVC-to-PVC joints with no adhesives or primers. Stays flexible throughout its service life and can be connected to new material for extensions or repairs.</p>
            <div class="tags"><span>Hot-air welding</span><span>No adhesives</span><span>No primers</span><span>Long-term flexibility</span></div>
            <a href="#" class="link-arrow">View INSUWRAP <svg><use href="#i-arrow"/></svg></a>
          </div>
          <div class="brand-panel__media"><img src="https://media.myklaticrete.com/mykl/2026/04/leaking-bathroom-1.webp" alt="" loading="lazy"><span class="brand-origin">Saudi Arabia</span></div>
        </div>

        <div class="brand-panel" id="brand-ezweld">
          <div class="brand-panel__body">
            <div class="brand-logo brand-logo--pair"><img src="https://e-zweld.com/wp-content/themes/ezw/images/horizontal-logo-color.svg" alt="E-Z Weld"><span class="brand-logo__sep"></span><img src="https://www.hpadhesives.com/wp-content/uploads/2023/06/logo-01.png" alt="HP International"></div>
            <h3>High-strength PVC, CPVC &amp; ABS solvent cements</h3>
            <p>Solvent cements, primers, cleaners, lubricants and thread sealants for pipe-joining — from E-Z Weld (USA) and HP International, a major manufacturer in Asia.</p>
            <div class="tags"><span>PVC</span><span>CPVC</span><span>ABS</span><span>Primers & cleaners</span><span>Thread sealants</span></div>
            <a href="#" class="link-arrow">View solvent cements <svg><use href="#i-arrow"/></svg></a>
          </div>
          <div class="brand-panel__media"><img src="https://media.myklaticrete.com/mykl/2026/04/images1-1.webp" alt="" loading="lazy"><span class="brand-origin">USA · India</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Logo marquee -->
<div class="marquee" aria-hidden="true">
  <div class="marquee__track">
    <span class="marquee__item"><img src="https://media.myklaticrete.com/mykl/2024/09/MYK-L-Logo-1-2.svg" alt=""></span>
    <span class="marquee__item"><img src="https://www.dcp-int.com/themes/dcp/images/logo.svg" alt=""></span>
    <span class="marquee__item"><img src="https://www.gerflor.com/themes/custom/gerflor_base/logo.svg" alt=""></span>
    <span class="marquee__item"><img src="https://www.bostik.com/files/live/sites/shared_bostik/files/images/Logos/Bostik_Logo_Header.svg" alt=""></span>
    <span class="marquee__item"><img src="https://www.wonderfloor.co.in/assets/img/logo/logo.png" alt=""></span>
    <span class="marquee__item"><img src="https://www.saveto.com/sites/default/files/2025-04/insuwrap-colored.svg" alt=""></span>
    <span class="marquee__item"><img class="logo-dark" src="https://b4366279.assetcdn.net/2.0/4366279/wp-content/uploads/2026/01/Terraco-White-Logo-Main.png" alt=""></span>
    <span class="marquee__item">TRITON</span>
    <span class="marquee__item"><img src="https://e-zweld.com/wp-content/themes/ezw/images/horizontal-logo-color.svg" alt=""></span>
    <span class="marquee__item"><img src="https://www.hpadhesives.com/wp-content/uploads/2023/06/logo-01.png" alt=""></span>
    <span class="marquee__item"><img src="https://www.romusworld.com/bundles/romusfront/img/logo-Romus_195x59-web_GB.png" alt=""></span>
    <!-- duplicate for seamless loop -->
    <span class="marquee__item"><img src="https://media.myklaticrete.com/mykl/2024/09/MYK-L-Logo-1-2.svg" alt=""></span>
    <span class="marquee__item"><img src="https://www.dcp-int.com/themes/dcp/images/logo.svg" alt=""></span>
    <span class="marquee__item"><img src="https://www.gerflor.com/themes/custom/gerflor_base/logo.svg" alt=""></span>
    <span class="marquee__item"><img src="https://www.bostik.com/files/live/sites/shared_bostik/files/images/Logos/Bostik_Logo_Header.svg" alt=""></span>
    <span class="marquee__item"><img src="https://www.wonderfloor.co.in/assets/img/logo/logo.png" alt=""></span>
    <span class="marquee__item"><img src="https://www.saveto.com/sites/default/files/2025-04/insuwrap-colored.svg" alt=""></span>
    <span class="marquee__item"><img class="logo-dark" src="https://b4366279.assetcdn.net/2.0/4366279/wp-content/uploads/2026/01/Terraco-White-Logo-Main.png" alt=""></span>
    <span class="marquee__item">TRITON</span>
    <span class="marquee__item"><img src="https://e-zweld.com/wp-content/themes/ezw/images/horizontal-logo-color.svg" alt=""></span>
    <span class="marquee__item"><img src="https://www.hpadhesives.com/wp-content/uploads/2023/06/logo-01.png" alt=""></span>
    <span class="marquee__item"><img src="https://www.romusworld.com/bundles/romusfront/img/logo-Romus_195x59-web_GB.png" alt=""></span>
  </div>
</div>
