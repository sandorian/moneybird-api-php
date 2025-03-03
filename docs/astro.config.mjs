// @ts-check
import { defineConfig } from 'astro/config';
import starlight from '@astrojs/starlight';

// https://astro.build/config
export default defineConfig({
	site: 'https://sandorian.github.io/moneybird-api-php',
	integrations: [
		starlight({
			title: 'moneybird php',
			logo: {
				src: './src/assets/logos_brief.svg',
				alt: 'Moneybird logo',
				replacesTitle: true,
			},
			components: {
				Footer: './src/components/Footer.astro',
			},
			customCss: [
				'./src/styles/custom.css',
			],
			social: {
				github: 'https://github.com/sandorian/moneybird-api-php',
			},
			editLink: {
				baseUrl: 'https://github.com/sandorian/moneybird-api-php/edit/main/docs/',
			},
			sidebar: [
				{
					label: 'Getting started',
					items: [
						// Each item here is one entry in the navigation menu.
						{ label: 'Authentication', slug: 'guides/authentication' },
						{ label: 'Pagination', slug: 'guides/pagination' },
					],
				},
				{
					label: 'Endpoints',
					autogenerate: { directory: 'reference' },
				},
			],
		}),
	],
});
