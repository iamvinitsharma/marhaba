<?php
/**
 * Front page section: audience.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="section section--sand center">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Solutions Customised for You</span>
      <h2>Whoever you are, we've got your project covered.</h2>
    </div>
    <div class="aud-tabs reveal" role="tablist">
      <button class="aud-tab is-active" data-aud="architects"><svg><use href="#i-compass"/></svg>Architects &amp; Consultants</button>
      <button class="aud-tab" data-aud="contractors"><svg><use href="#i-hardhat"/></svg>Contractors &amp; Applicators</button>
      <button class="aud-tab" data-aud="retail"><svg><use href="#i-store"/></svg>Retailers</button>
      <button class="aud-tab" data-aud="owners"><svg><use href="#i-key"/></svg>Developers &amp; Owners</button>
    </div>

    <div class="aud-panel is-active reveal" id="aud-architects" style="text-align:left">
      <div class="aud-panel__media"><img src="<?php echo esc_url( marhaba_img( 'consultant.jpg' ) ); ?>" alt="" loading="lazy"></div>
      <div class="aud-panel__body">
        <h3>Specify with confidence</h3>
        <p>Technical data, submittals and system recommendations that match your design intent and project specifications.</p>
        <ul><li>Technical submittals &amp; data sheets</li><li>System & product recommendations</li><li>Manufacturer coordination</li></ul>
        <a href="#contact" class="btn btn--dark">Request Submittals <svg><use href="#i-arrow"/></svg></a>
      </div>
    </div>
    <div class="aud-panel" id="aud-contractors" style="text-align:left">
      <div class="aud-panel__media"><img src="https://www.dcp-int.com/sites/default/files/custom-files/ContactBlock_Image.jpg" alt="" loading="lazy"></div>
      <div class="aud-panel__body">
        <h3>Materials on site, on time</h3>
        <p>Project material supply with delivery and logistics support — or let our applicators handle installation for you.</p>
        <ul><li>Project material supply</li><li>Delivery &amp; logistics support</li><li>Supply &amp; application services</li></ul>
        <a href="#contact" class="btn btn--dark">Get a Project Quote <svg><use href="#i-arrow"/></svg></a>
      </div>
    </div>
    <div class="aud-panel" id="aud-retail" style="text-align:left">
      <div class="aud-panel__media"><img src="<?php echo esc_url( marhaba_img( 'who.jpg' ) ); ?>" alt="" loading="lazy"></div>
      <div class="aud-panel__body">
        <h3>Reliable stock for your shelves</h3>
        <p>Join 300+ retail outlets across Bahrain supplied by our dedicated sales team, with regular service and consistent product availability.</p>
        <ul><li>Dedicated retail sales executives</li><li>Consistent product availability</li><li>Regular customer service visits</li></ul>
        <a href="#contact" class="btn btn--dark">Become a Retail Partner <svg><use href="#i-arrow"/></svg></a>
      </div>
    </div>
    <div class="aud-panel" id="aud-owners" style="text-align:left">
      <div class="aud-panel__media"><img src="https://media.myklaticrete.com/mykl/2026/04/masks4-1.webp" alt="" loading="lazy"></div>
      <div class="aud-panel__body">
        <h3>One partner, fewer handovers</h3>
        <p>Integrated supply and application that keeps your project on spec, on budget and on schedule.</p>
        <ul><li>Integrated supply &amp; application</li><li>Quality-checked materials</li><li>Long-term partnership approach</li></ul>
        <a href="#contact" class="btn btn--dark">Discuss Your Project <svg><use href="#i-arrow"/></svg></a>
      </div>
    </div>
  </div>
</section>
