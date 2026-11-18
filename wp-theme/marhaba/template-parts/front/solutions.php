<?php
/**
 * Front page section: solutions (core business cards).
 *
 * Card titles come from marhaba_solutions() so they match the Solutions dropdown;
 * images, tags and descriptions are set below. Each card has an id (#solution-{slug})
 * that the dropdown links to.
 *
 * @package Marhaba
 */

defined( 'ABSPATH' ) || exit;

$marhaba_l   = 'https://media.myklaticrete.com/mykl/2026/04/';
$marhaba_ltc = 'https://cdn-global.laticrete.com/-/media/project/laticrete-international/';

$marhaba_cards = array(
	'building-finishing' => array( $marhaba_l . 'Mask6-1.webp', __( 'Supply & Application', 'marhaba' ), __( 'Building Finishing Materials', 'marhaba' ), __( 'Interior and exterior finishing materials for retail and project requirements — renders, plasters, adhesives, grouts, sealants and more.', 'marhaba' ) ),
	'pvc-flooring'       => array( $marhaba_l . 'masks6-1.webp', __( 'Rolls & Tiles', 'marhaba' ), '', __( 'Commercial, healthcare, institutional and residential vinyl flooring, professionally installed.', 'marhaba' ) ),
	'carpet-laminate'    => array( $marhaba_l . 'masks7-1.webp', __( 'Luxury Finishes', 'marhaba' ), '', __( 'Luxury carpet in roll and tile formats with laminated floor parquet solutions.', 'marhaba' ) ),
	'colour-plaster'     => array( $marhaba_l . 'Mask3-1.webp', __( 'Walls & Façades', 'marhaba' ), '', __( 'Coloured plasters, renders and textured finishes for interior and exterior walls.', 'marhaba' ) ),
	'epoxy-flooring'     => array( $marhaba_ltc . 'middle-east/images/artworks/slides/floor-design2.png', __( 'Industrial & Commercial', 'marhaba' ), '', __( 'Seamless epoxy floor coating systems for demanding commercial and industrial spaces.', 'marhaba' ) ),
	'multi-sport'        => array( 'https://www.wonderfloor.co.in/wd_admin/c_images/braavo_img-1.png', __( 'Courts, Gyms & Schools', 'marhaba' ), __( 'Multi-Sport Flooring System', 'marhaba' ), __( 'Acrylic, vinyl, wooden and rubber sports surfaces for indoor and outdoor courts, gyms and multi-purpose halls.', 'marhaba' ) ),
	'sound-insulation'   => array( $marhaba_ltc . 'shared/images/sub-categories/sound-control.png', __( 'Floors & Walls', 'marhaba' ), '', __( 'Acoustic underlays and sound control systems that reduce impact and airborne noise between floors and rooms.', 'marhaba' ) ),
	'waterproofing'      => array( $marhaba_l . 'images3-1-1.webp', __( 'Building & Infrastructure', 'marhaba' ), __( 'Waterproofing Systems', 'marhaba' ), __( 'Membranes, coatings and systems for roofs, wet areas, basements and infrastructure.', 'marhaba' ) ),
	'tiles-stone'        => array( $marhaba_l . 'tile-adhesive-1-1.webp', __( 'Install & Care', 'marhaba' ), '', __( 'Tile and stone adhesives, grouts and care products with application support.', 'marhaba' ) ),
	'solvent-cements'    => array( $marhaba_l . 'images9-1.webp', __( 'USA & India', 'marhaba' ), '', __( 'PVC, CPVC and ABS solvent cements, primers and cleaners from E-Z Weld and HP International.', 'marhaba' ) ),
	'entrance-mats'      => array( marhaba_img( 'app-masonry.webp' ), __( 'ROMUS & More', 'marhaba' ), '', __( 'ROMUS entrance doormats and professional tools for flooring and finishing work.', 'marhaba' ) ),
);
?>
<section class="section" id="solutions">
	<div class="container">
		<div class="section-head reveal">
			<div>
				<span class="eyebrow"><?php esc_html_e( 'Our Core Business', 'marhaba' ); ?></span>
				<h2><?php esc_html_e( 'Complete building finishing & construction solutions.', 'marhaba' ); ?></h2>
			</div>
			<a href="<?php echo esc_url( marhaba_anchor( 'contact' ) ); ?>" class="btn btn--outline"><?php esc_html_e( 'Ask for a Product', 'marhaba' ); ?> <?php echo marhaba_icon( 'i-arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
		</div>

		<div class="solutions">
			<?php
			$marhaba_first = true;
			foreach ( marhaba_solutions() as $marhaba_slug => $marhaba_solution ) :
				if ( ! isset( $marhaba_cards[ $marhaba_slug ] ) ) {
					continue;
				}
				list( $marhaba_image, $marhaba_tag, $marhaba_title, $marhaba_text ) = $marhaba_cards[ $marhaba_slug ];
				$marhaba_title = $marhaba_title ? $marhaba_title : $marhaba_solution[0];
				?>
				<a href="<?php echo esc_url( marhaba_anchor( 'contact' ) ); ?>" id="solution-<?php echo esc_attr( $marhaba_slug ); ?>" class="solution<?php echo $marhaba_first ? ' solution--feature' : ''; ?> reveal">
					<div class="solution__img"><img src="<?php echo esc_url( $marhaba_image ); ?>" alt="" loading="lazy"></div>
					<div class="solution__body">
						<span class="solution__tag"><?php echo esc_html( $marhaba_tag ); ?></span>
						<h3><?php echo esc_html( $marhaba_title ); ?></h3>
						<p><?php echo esc_html( $marhaba_text ); ?></p>
						<span class="link-arrow"><?php esc_html_e( 'Enquire', 'marhaba' ); ?> <?php echo marhaba_icon( 'i-arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
					</div>
				</a>
				<?php
				$marhaba_first = false;
			endforeach;
			?>
		</div>
	</div>
</section>
