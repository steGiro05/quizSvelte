// tailwind.config.js
const colors = require('tailwindcss/colors');

module.exports = {
	content: [
		'./src/**/*.svelte',
		'./src/**/*.html',
		'./src/**/*.js'
		// Add more file paths as needed
	],
	theme: {
		colors: {
			primary: '#FF9051',
			secondary: '#3D1D9D',
			white: colors.white,
			black: colors.black,
			bOne: '#008000',
			bTwo: '#FF0000',
			bThree: '#263CFF',
			bFour: '#FFA826',
			trasparent: colors.transparent,
			green: '#008000',
			red: '#FF0000'
			// ...
		}
	}
	// other Tailwind configurations...
};
