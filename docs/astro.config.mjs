// @ts-check
import { defineConfig } from 'astro/config';
import starlight from '@astrojs/starlight';

// https://astro.build/config
export default defineConfig({
	integrations: [
		starlight({
			title: 'moneybird php',
			logo: {
				src: './src/assets/moneybird_logo.svg',
				alt: 'Moneybird logo',
				replacesTitle: true,
			},
			customCss: [
				'./src/styles/custom.css',
			],
			social: {
				github: 'https://github.com/sandorian/moneybird-api-php',
			},
			sidebar: [
				{
					label: 'Getting started',
					items: [
						// Each item here is one entry in the navigation menu.
						{ label: 'Authentication', slug: 'guides/authentication' },
					],
				},
				{
					label: 'EndpointReference',
					autogenerate: { directory: 'reference' },
				},
			],
		}),
	],
});
