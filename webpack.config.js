const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require( 'path' );

// Prefer CopyWebpackPlugin from @wordpress/scripts deps when available.
let CopyWebpackPlugin;
try {
	CopyWebpackPlugin = require( 'copy-webpack-plugin' );
} catch ( e ) {
	CopyWebpackPlugin = null;
}

const config = {
	...defaultConfig,
	entry: {
		'hero/index': path.resolve( __dirname, 'src/blocks/hero/index.js' ),
		'highlight-box/index': path.resolve( __dirname, 'src/blocks/highlight-box/index.js' ),
		'contact-locations/index': path.resolve( __dirname, 'src/blocks/contact-locations/index.js' ),
		'careers/index': path.resolve( __dirname, 'src/blocks/careers/index.js' ),
	},
	output: {
		...defaultConfig.output,
		path: path.resolve( __dirname, 'build/blocks' ),
	},
};

if ( CopyWebpackPlugin ) {
	config.plugins = [
		...( defaultConfig.plugins || [] ),
		new CopyWebpackPlugin( {
			patterns: [
				{ from: 'src/blocks/hero/block.json', to: 'hero/block.json' },
				{ from: 'src/blocks/hero/render.php', to: 'hero/render.php' },
				{ from: 'src/blocks/highlight-box/block.json', to: 'highlight-box/block.json' },
				{ from: 'src/blocks/highlight-box/render.php', to: 'highlight-box/render.php' },
				{ from: 'src/blocks/contact-locations/block.json', to: 'contact-locations/block.json' },
				{ from: 'src/blocks/contact-locations/render.php', to: 'contact-locations/render.php' },
				{ from: 'src/blocks/careers/block.json', to: 'careers/block.json' },
				{ from: 'src/blocks/careers/render.php', to: 'careers/render.php' },
			],
		} ),
	];
}

module.exports = config;
