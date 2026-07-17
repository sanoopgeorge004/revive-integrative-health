import { registerBlockType } from '@wordpress/blocks';
import {
	useBlockProps,
	InspectorControls,
	MediaUpload,
	MediaUploadCheck,
} from '@wordpress/block-editor';
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

const EMPTY_JOB = {
	title: '',
	jobPostingLabel: '',
	location: '',
	position: '',
	clienteleAgeRange: '',
	imageUrl: '',
	imageId: 0,
	imageAlt: '',
	aboutUs: '',
	roleOverview: '',
	keyResponsibilities: '',
	whatWeOffer: '',
	qualifications: '',
	joinUs: '',
	equalOpportunity: '',
	applyLabel: 'Apply Now',
	applyUrl: '#contact',
};

function updateJob( jobs, index, patch ) {
	return jobs.map( ( job, i ) => ( i === index ? { ...job, ...patch } : job ) );
}

function JobFields( { job, index, jobs, setAttributes } ) {
	const set = ( patch ) =>
		setAttributes( { jobs: updateJob( jobs, index, patch ) } );

	return (
		<>
			<TextControl
				label={ __( 'Job title', 'revive-integrative-health' ) }
				value={ job.title }
				onChange={ ( value ) => set( { title: value } ) }
			/>
			<TextControl
				label={ __( 'Job posting label', 'revive-integrative-health' ) }
				help={ __(
					'Shown under the title, e.g. “Job Posting: …”',
					'revive-integrative-health'
				) }
				value={ job.jobPostingLabel }
				onChange={ ( value ) => set( { jobPostingLabel: value } ) }
			/>
			<TextControl
				label={ __( 'Location', 'revive-integrative-health' ) }
				value={ job.location }
				onChange={ ( value ) => set( { location: value } ) }
			/>
			<TextControl
				label={ __( 'Position', 'revive-integrative-health' ) }
				value={ job.position }
				onChange={ ( value ) => set( { position: value } ) }
			/>
			<TextControl
				label={ __( 'Clientele age range', 'revive-integrative-health' ) }
				value={ job.clienteleAgeRange }
				onChange={ ( value ) => set( { clienteleAgeRange: value } ) }
			/>

			<MediaUploadCheck>
				<MediaUpload
					onSelect={ ( media ) =>
						set( {
							imageId: media.id,
							imageUrl: media.url,
							imageAlt: media.alt || job.imageAlt || '',
						} )
					}
					allowedTypes={ [ 'image' ] }
					value={ job.imageId }
					render={ ( { open } ) => (
						<div style={ { marginBottom: '1rem' } }>
							{ job.imageUrl ? (
								<img
									src={ job.imageUrl }
									alt={ job.imageAlt }
									style={ {
										display: 'block',
										width: '100%',
										maxWidth: '280px',
										height: 'auto',
										marginBottom: '0.5rem',
										borderRadius: '4px',
									} }
								/>
							) : null }
							<Button onClick={ open } variant="secondary">
								{ job.imageUrl
									? __( 'Replace image', 'revive-integrative-health' )
									: __( 'Select image', 'revive-integrative-health' ) }
							</Button>
							{ job.imageUrl ? (
								<Button
									isDestructive
									variant="link"
									onClick={ () =>
										set( { imageId: 0, imageUrl: '', imageAlt: '' } )
									}
									style={ { marginLeft: '0.75rem' } }
								>
									{ __( 'Remove image', 'revive-integrative-health' ) }
								</Button>
							) : null }
						</div>
					) }
				/>
			</MediaUploadCheck>

			<TextareaControl
				label={ __( 'About us', 'revive-integrative-health' ) }
				value={ job.aboutUs }
				onChange={ ( value ) => set( { aboutUs: value } ) }
				rows={ 4 }
			/>
			<TextareaControl
				label={ __( 'Role overview', 'revive-integrative-health' ) }
				value={ job.roleOverview }
				onChange={ ( value ) => set( { roleOverview: value } ) }
				rows={ 4 }
			/>
			<TextareaControl
				label={ __( 'Key responsibilities', 'revive-integrative-health' ) }
				help={ __( 'One item per line.', 'revive-integrative-health' ) }
				value={ job.keyResponsibilities }
				onChange={ ( value ) => set( { keyResponsibilities: value } ) }
				rows={ 5 }
			/>
			<TextareaControl
				label={ __( 'What we offer', 'revive-integrative-health' ) }
				help={ __( 'One item per line.', 'revive-integrative-health' ) }
				value={ job.whatWeOffer }
				onChange={ ( value ) => set( { whatWeOffer: value } ) }
				rows={ 5 }
			/>
			<TextareaControl
				label={ __( 'Qualifications', 'revive-integrative-health' ) }
				help={ __( 'One item per line.', 'revive-integrative-health' ) }
				value={ job.qualifications }
				onChange={ ( value ) => set( { qualifications: value } ) }
				rows={ 4 }
			/>
			<TextareaControl
				label={ __( 'Join us / closing', 'revive-integrative-health' ) }
				value={ job.joinUs }
				onChange={ ( value ) => set( { joinUs: value } ) }
				rows={ 3 }
			/>
			<TextareaControl
				label={ __( 'Equal opportunity note', 'revive-integrative-health' ) }
				value={ job.equalOpportunity }
				onChange={ ( value ) => set( { equalOpportunity: value } ) }
				rows={ 2 }
			/>
			<TextControl
				label={ __( 'Apply button label', 'revive-integrative-health' ) }
				value={ job.applyLabel }
				onChange={ ( value ) => set( { applyLabel: value } ) }
			/>
			<TextControl
				label={ __( 'Apply button URL', 'revive-integrative-health' ) }
				value={ job.applyUrl }
				onChange={ ( value ) => set( { applyUrl: value } ) }
			/>
		</>
	);
}

function Edit( { attributes, setAttributes } ) {
	const { sectionTitle, jobs = [] } = attributes;
	const blockProps = useBlockProps( { className: 'careers-section section-pad' } );

	const addJob = () => {
		setAttributes( { jobs: [ ...jobs, { ...EMPTY_JOB } ] } );
	};

	const removeJob = ( index ) => {
		setAttributes( { jobs: jobs.filter( ( _, i ) => i !== index ) } );
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
					<h2 className="careers-section__title text-center">
						{ sectionTitle || __( 'Open Positions', 'revive-integrative-health' ) }
					</h2>

					<div style={ { display: 'grid', gap: '1.5rem' } }>
						{ jobs.map( ( job, index ) => (
							<Card key={ index }>
								<CardHeader>
									<strong>
										{ job.title ||
											__( 'Job post', 'revive-integrative-health' ) +
												` ${ index + 1 }` }
									</strong>
									<Button
										isDestructive
										variant="link"
										onClick={ () => removeJob( index ) }
										disabled={ jobs.length <= 1 }
									>
										{ __( 'Remove', 'revive-integrative-health' ) }
									</Button>
								</CardHeader>
								<CardBody>
									<JobFields
										job={ job }
										index={ index }
										jobs={ jobs }
										setAttributes={ setAttributes }
									/>
								</CardBody>
							</Card>
						) ) }

						<Button variant="primary" onClick={ addJob }>
							{ __( 'Add job post', 'revive-integrative-health' ) }
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
