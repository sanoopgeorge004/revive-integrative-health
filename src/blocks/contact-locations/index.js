import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import {
	PanelBody,
	TextControl,
	TextareaControl,
	Button,
	Card,
	CardBody,
	CardHeader,
} from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import metadata from './block.json';

const EMPTY_HOURS = {
	heading: '',
	content: '',
};

const EMPTY_LOCATION = {
	name: '',
	address: '',
	note: '',
	hours: [ { ...EMPTY_HOURS } ],
	phone: '',
	fax: '',
	mapUrl: '',
	mapTitle: '',
	footnote: '',
};

function updateLocation( locations, index, patch ) {
	return locations.map( ( location, i ) =>
		i === index ? { ...location, ...patch } : location
	);
}

function updateHours( locations, locationIndex, hoursIndex, patch ) {
	return locations.map( ( location, i ) => {
		if ( i !== locationIndex ) {
			return location;
		}
		const hours = ( location.hours || [] ).map( ( item, hi ) =>
			hi === hoursIndex ? { ...item, ...patch } : item
		);
		return { ...location, hours };
	} );
}

function Edit( { attributes, setAttributes } ) {
	const { sectionTitle, locations = [] } = attributes;
	const blockProps = useBlockProps( { className: 'contact-locations section-pad' } );

	const addLocation = () => {
		setAttributes( {
			locations: [ ...locations, { ...EMPTY_LOCATION, hours: [ { ...EMPTY_HOURS } ] } ],
		} );
	};

	const removeLocation = ( index ) => {
		setAttributes( {
			locations: locations.filter( ( _, i ) => i !== index ),
		} );
	};

	const addHours = ( locationIndex ) => {
		const location = locations[ locationIndex ];
		const hours = [ ...( location.hours || [] ), { ...EMPTY_HOURS } ];
		setAttributes( {
			locations: updateLocation( locations, locationIndex, { hours } ),
		} );
	};

	const removeHours = ( locationIndex, hoursIndex ) => {
		const location = locations[ locationIndex ];
		const hours = ( location.hours || [] ).filter( ( _, i ) => i !== hoursIndex );
		setAttributes( {
			locations: updateLocation( locations, locationIndex, { hours } ),
		} );
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Section', 'revive-integrative-health' ) }>
					<TextControl
						label={ __( 'Section title', 'revive-integrative-health' ) }
						value={ sectionTitle }
						onChange={ ( value ) => setAttributes( { sectionTitle: value } ) }
					/>
				</PanelBody>
			</InspectorControls>

			<section { ...blockProps }>
				<div className="container">
					<h2 className="contact-locations__title text-center">
						{ sectionTitle || __( 'Locations & Hours', 'revive-integrative-health' ) }
					</h2>

					<div className="contact-locations__list" style={ { display: 'grid', gap: '1.5rem' } }>
						{ locations.map( ( location, index ) => (
							<Card key={ index }>
								<CardHeader>
									<strong>
										{ location.name ||
											__( 'Location', 'revive-integrative-health' ) +
												` ${ index + 1 }` }
									</strong>
									<Button
										isDestructive
										variant="link"
										onClick={ () => removeLocation( index ) }
										disabled={ locations.length <= 1 }
									>
										{ __( 'Remove', 'revive-integrative-health' ) }
									</Button>
								</CardHeader>
								<CardBody>
									<TextControl
										label={ __( 'Location name', 'revive-integrative-health' ) }
										value={ location.name }
										onChange={ ( value ) =>
											setAttributes( {
												locations: updateLocation( locations, index, {
													name: value,
												} ),
											} )
										}
									/>
									<TextareaControl
										label={ __( 'Address', 'revive-integrative-health' ) }
										help={ __(
											'One line per row (line breaks are preserved).',
											'revive-integrative-health'
										) }
										value={ location.address }
										onChange={ ( value ) =>
											setAttributes( {
												locations: updateLocation( locations, index, {
													address: value,
												} ),
											} )
										}
									/>
									<TextControl
										label={ __( 'Note (optional)', 'revive-integrative-health' ) }
										value={ location.note }
										onChange={ ( value ) =>
											setAttributes( {
												locations: updateLocation( locations, index, {
													note: value,
												} ),
											} )
										}
									/>

									{ ( location.hours || [] ).map( ( hoursItem, hoursIndex ) => (
										<div
											key={ hoursIndex }
											style={ {
												borderTop: '1px solid #ddd',
												marginTop: '1rem',
												paddingTop: '1rem',
											} }
										>
											<div
												style={ {
													display: 'flex',
													justifyContent: 'space-between',
													alignItems: 'center',
													marginBottom: '0.5rem',
												} }
											>
												<strong>
													{ __( 'Hours block', 'revive-integrative-health' ) }{ ' ' }
													{ hoursIndex + 1 }
												</strong>
												<Button
													isDestructive
													variant="link"
													onClick={ () => removeHours( index, hoursIndex ) }
												>
													{ __( 'Remove hours', 'revive-integrative-health' ) }
												</Button>
											</div>
											<TextControl
												label={ __( 'Heading', 'revive-integrative-health' ) }
												value={ hoursItem.heading }
												onChange={ ( value ) =>
													setAttributes( {
														locations: updateHours(
															locations,
															index,
															hoursIndex,
															{ heading: value }
														),
													} )
												}
											/>
											<TextareaControl
												label={ __( 'Hours content', 'revive-integrative-health' ) }
												help={ __(
													'One line = paragraph. Multiple lines = bullet list.',
													'revive-integrative-health'
												) }
												value={ hoursItem.content }
												onChange={ ( value ) =>
													setAttributes( {
														locations: updateHours(
															locations,
															index,
															hoursIndex,
															{ content: value }
														),
													} )
												}
											/>
										</div>
									) ) }

									<Button
										variant="secondary"
										onClick={ () => addHours( index ) }
										style={ { marginTop: '0.75rem' } }
									>
										{ __( 'Add hours block', 'revive-integrative-health' ) }
									</Button>

									<TextControl
										label={ __( 'Phone (optional)', 'revive-integrative-health' ) }
										value={ location.phone }
										onChange={ ( value ) =>
											setAttributes( {
												locations: updateLocation( locations, index, {
													phone: value,
												} ),
											} )
										}
									/>
									<TextControl
										label={ __( 'Fax / phone note (optional)', 'revive-integrative-health' ) }
										value={ location.fax }
										onChange={ ( value ) =>
											setAttributes( {
												locations: updateLocation( locations, index, {
													fax: value,
												} ),
											} )
										}
									/>
									<TextControl
										label={ __( 'Map embed URL', 'revive-integrative-health' ) }
										help={ __(
											'Google Maps embed URL (include output=embed).',
											'revive-integrative-health'
										) }
										value={ location.mapUrl }
										onChange={ ( value ) =>
											setAttributes( {
												locations: updateLocation( locations, index, {
													mapUrl: value,
												} ),
											} )
										}
									/>
									<TextControl
										label={ __( 'Map title (accessibility)', 'revive-integrative-health' ) }
										value={ location.mapTitle }
										onChange={ ( value ) =>
											setAttributes( {
												locations: updateLocation( locations, index, {
													mapTitle: value,
												} ),
											} )
										}
									/>
									<TextareaControl
										label={ __( 'Footnote (optional)', 'revive-integrative-health' ) }
										value={ location.footnote }
										onChange={ ( value ) =>
											setAttributes( {
												locations: updateLocation( locations, index, {
													footnote: value,
												} ),
											} )
										}
									/>
								</CardBody>
							</Card>
						) ) }

						<Button variant="primary" onClick={ addLocation }>
							{ __( 'Add location', 'revive-integrative-health' ) }
						</Button>
					</div>
				</div>
			</section>
		</>
	);
}

registerBlockType( metadata.name, {
	edit: Edit,
	save: () => null,
} );
