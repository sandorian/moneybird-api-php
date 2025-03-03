// @ts-check
import { defineConfig } from 'astro/config';
import starlight from '@astrojs/starlight';

import sitemap from '@astrojs/sitemap';

// https://astro.build/config
export default defineConfig({
    site: 'https://moneybird.sandorian.com',
    integrations: [
		sitemap(),
		starlight({
			head: [
				{
					tag: 'meta',
					attrs: { property: 'og:image', content: '/social_preview.png' },
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
					attrs: {name: 'twitter:image', content: '/social_preview.png' },
				},
				{
					tag: 'script',
					attrs: {
					  src: 'https://cdn.usefathom.com/script.js',
					  'data-site': 'MTBSZFOQ',
					  defer: true,
					},
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