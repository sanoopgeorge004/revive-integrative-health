import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, MediaUpload, MediaUploadCheck, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, Button, TextControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import metadata from './block.json';

function Edit( { attributes, setAttributes } ) {
	const {
		titleBefore,
		titleEmphasis,
		titleAfter,
		ctaLabel,
		ctaUrl,
		imageUrl,
		imageAlt,
	} = attributes;

	const blockProps = useBlockProps( { className: 'hero' } );
	const fallbackImage = '';

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Hero settings', 'revive-integrative-health' ) }>
					<TextControl
						label={ __( 'CTA URL', 'revive-integrative-health' ) }
						value={ ctaUrl }
						onChange={ ( value ) => setAttributes( { ctaUrl: value } ) }
					/>
					<MediaUploadCheck>
						<MediaUpload
							onSelect={ ( media ) =>
								setAttributes( {
									imageId: media.id,
									imageUrl: media.url,
									imageAlt: media.alt || '',
								} )
							}
							allowedTypes={ [ 'image' ] }
							value={ attributes.imageId }
							render={ ( { open } ) => (
								<Button onClick={ open } variant="secondary">
									{ imageUrl
										? __( 'Replace background image', 'revive-integrative-health' )
										: __( 'Select background image', 'revive-integrative-health' ) }
								</Button>
							) }
						/>
					</MediaUploadCheck>
				</PanelBody>
			</InspectorControls>
			<section { ...blockProps }>
				<figure className="hero__background">
					{ imageUrl || fallbackImage ? (
						<img
							src={ imageUrl || fallbackImage }
							alt={ imageAlt }
							className="hero__background-image"
						/>
					) : (
						<div className="hero__background-image" style={ { minHeight: '16rem', background: '#434460' } } />
					) }
					<span className="hero__background-overlay" aria-hidden="true" />
				</figure>
				<span className="hero__bottom-brush" aria-hidden="true" />
				<div className="hero__content">
					<h1 className="hero__title">
						<RichText
							tagName="span"
							value={ titleBefore }
							onChange={ ( value ) => setAttributes( { titleBefore: value } ) }
							placeholder={ __( 'Begin', 'revive-integrative-health' ) }
							allowedFormats={ [] }
						/>{ ' ' }
						<RichText
							tagName="span"
							className="hero__title-emphasis"
							value={ titleEmphasis }
							onChange={ ( value ) => setAttributes( { titleEmphasis: value } ) }
							placeholder={ __( 'Your', 'revive-integrative-health' ) }
							allowedFormats={ [] }
						/>{ ' ' }
						<RichText
							tagName="span"
							value={ titleAfter }
							onChange={ ( value ) => setAttributes( { titleAfter: value } ) }
							placeholder={ __( 'Wellness Journey', 'revive-integrative-health' ) }
							allowedFormats={ [] }
						/>
					</h1>
					<RichText
						tagName="a"
						className="btn-revive btn-revive--primary hero__cta"
						value={ ctaLabel }
						onChange={ ( value ) => setAttributes( { ctaLabel: value } ) }
						placeholder={ __( 'Book Online', 'revive-integrative-health' ) }
						allowedFormats={ [] }
					/>
				</div>
			</section>
		</>
	);
}

registerBlockType( metadata.name, {
	edit: Edit,
	save: () => null,
} );
