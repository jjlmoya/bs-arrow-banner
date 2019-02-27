/**
 * BLOCK: bs-arrow-banner
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

import './style.scss';
import './editor.scss';

const {__} = wp.i18n;
const {registerBlockType} = wp.blocks;
const {TextControl} = wp.components;
registerBlockType('bonseo/block-bs-arrow-banner', {
	title: __('Arrow Banner'),
	icon: 'editor-quote',
	category: 'bonseo-blocks',
	keywords: [
		__('bs-arrow-banner'),
		__('BonSeo'),
		__('BonSeo Block'),
	],
	edit: function ({posts, className, attributes, setAttributes}) {
		return (
			<div>
				<h2> Opiniones de Clientes</h2>
				<TextControl
					className={`${className}__title`}
					label={__('Título del banner')}
					value={attributes.title}
					onChange={title => setAttributes({title})}
				/>
				<TextControl
					className={`${className}__content`}
					label={__('Fresa del banner')}
					value={attributes.content}
					onChange={content => setAttributes({content})}
				/>
				<TextControl
					className={`${className}__cta`}
					label={__('CTA')}
					value={attributes.cta}
					onChange={cta => setAttributes({cta})}
				/>
				<TextControl
					className={`${className}__mail`}
					label={__('Email de contacto')}
					value={attributes.mail}
					onChange={mail => setAttributes({mail})}
				/>
			</div>
		);
	},
	save: function () {
		return null;
	}
})
;
