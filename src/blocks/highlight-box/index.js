import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, MediaUpload, MediaUploadCheck, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, Button, TextControl, TextareaControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import metadata from './block.json';

function Edit( { attributes, setAttributes } ) {
	const { title, text, ctaLabel, ctaUrl, imageUrl, imageAlt } = attributes;
	const blockProps = useBlockProps( { className: 'highlight-section' } );

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Highlight settings', 'revive-integrative-health' ) }>
					<TextControl
						label={ __( 'CTA URL', 'revive-integrative-health' ) }
						value={ ctaUrl }
						onChange={ ( value ) => setAttributes( { ctaUrl: value } ) }
					/>
					<TextareaControl
						label={ __( 'Body text', 'revive-integrative-health' ) }
						value={ text }
						onChange={ ( value ) => setAttributes( { text: value } ) }
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
										? __( 'Replace image', 'revive-integrative-health' )
										: __( 'Select image', 'revive-integrative-health' ) }
								</Button>
							) }
						/>
					</MediaUploadCheck>
				</PanelBody>
			</InspectorControls>
			<section { ...blockProps }>
				<div className="highlight-section__inner">
					<article className="highlight-box">
						<div className="highlight-box__inner d-flex flex-column flex-md-row">
							<figure className="highlight-box__media">
								{ imageUrl ? (
									<img src={ imageUrl } alt={ imageAlt } className="highlight-box__image" />
								) : (
									<div className="highlight-box__image" style={ { minHeight: '10rem', background: '#c0c0c0' } } />
								) }
							</figure>
							<div className="highlight-box__content">
								<RichText
									tagName="h2"
									className="highlight-box__title"
									value={ title }
									onChange={ ( value ) => setAttributes( { title: value } ) }
									placeholder={ __( 'Title', 'revive-integrative-health' ) }
								/>
								<hr className="highlight-box__divider" />
								<p className="highlight-box__text">{ text }</p>
								<RichText
									tagName="a"
									className="btn-revive btn-revive--light highlight-box__cta"
									value={ ctaLabel }
									onChange={ ( value ) => setAttributes( { ctaLabel: value } ) }
									placeholder={ __( 'CTA', 'revive-integrative-health' ) }
									allowedFormats={ [] }
								/>
							</div>
						</div>
						<span className="highlight-box__bottom-brush" aria-hidden="true" />
					</article>
				</div>
			</section>
		</>
	);
}

registerBlockType( metadata.name, {
	edit: Edit,
	save: () => null,
} );
