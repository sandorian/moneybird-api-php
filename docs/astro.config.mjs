// @ts-check
import { defineConfig } from 'astro/config';
import starlight from '@astrojs/starlight';

// The image path that will be appended to the site URL
const socialPreviewImagePath = '/social_preview.png';

// https://astro.build/config
export default defineConfig({
	site: 'https://moneybird.sandorian.com',
	integrations: [
		starlight({
			head: [
				{
					tag: 'meta',
					attrs: { property: 'og:image', content: socialPreviewImagePath },
				},
				{
					tag: 'meta',
					attrs: { property: 'og:image:width', content: '1200' },
				},
				{
					tag: 'meta',
					attrs: { property: 'og:image:height', content: '630' },
				},
				{
					tag: 'meta',
					attrs: { name: 'twitter:card', content: 'summary_large_image' },
				},
				{
					tag: 'meta',
					attrs: {name: 'twitter:image', content: socialPreviewImagePath },
				},
			],
			title: 'moneybird-api-php',
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
