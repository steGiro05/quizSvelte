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
			white: colors.white
			// ...
		}
	}
	// other Tailwind configurations...
};
