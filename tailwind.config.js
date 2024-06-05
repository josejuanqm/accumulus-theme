/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{php,html,js}","./template-parts/*.{php,html,js}"],
  theme: {

    extend: {
			fontFamily: {
				tp: ["'TP Fors'", 'sans-serif']
			},

			fontSize: {
				h1: [
					'5.938rem',
					{
						fontWeight: '400',
						lineHeight: '106%',
						letterSpacing: '0'
					}
				],
				h1Tablet: [
					'4.875rem',
					// '3.5rem',
					{
						fontWeight: '400',
						lineHeight: '106%',
						letterSpacing: '0'
					}
				],
				h1Mobile: [
					// '4.875rem',
					'2.25rem',
					{
						fontWeight: '400',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],

				h2: [
					'3.75rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				h2Tablet: [
					'3rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				h2Mobile: [
					'1.625rem',
					{
						fontWeight: '500',
						lineHeight: 'auto',
						letterSpacing: '0'
					}
				],

				h3: [
					'1.75rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				h3Tablet: [
					'2.25rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				h3Mobile: [
					'1.25rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],

				h4: [
					'1.125rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				h4Tablet: [
					'1.25rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				h4Mobile: [
					'1rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],

				h5: [
					'0.875rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				h5Tablet: [
					'1.5rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				h5Mobile: [
					'1.125rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],

				h6: [
					'1.125rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				h6Tablet: [
					'1.75rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				h6Mobile: [
					'1rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],

				h7: [
					'1.375rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				h7Tablet: [
					'1rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				h7Mobile: [
					'1rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],

				h8: [
					'7.5rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				h8Tablet: [
					'13.063rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				h8Mobile: [
					'7.063rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],

				h9: [
					'3.75rem',
					{
						fontWeight: '400',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				h9Tablet: [
					'5rem',
					{
						fontWeight: '400',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				h9Mobile: [
					'4.875rem',
					{
						fontWeight: '400',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],

				b1: [
					'1.75rem',
					{
						fontWeight: '400',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				b1Tablet: [
					'1.875rem',
					{
						fontWeight: '400',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				b1Mobile: [
					'1.25rem',
					{
						fontWeight: '400',
						lineHeight: 'auto',
						letterSpacing: '0'
					}
				],

				b2: [
					'1.25rem',
					{
						fontWeight: '400',
						lineHeight: '28px',
						letterSpacing: '0'
					}
				],
				b2Tablet: [
					'1.625rem',
					{
						fontWeight: '400',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				b2Mobile: [
					'1.125rem',
					{
						fontWeight: '400',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],

				b3: [
					'1.125rem',
					{
						fontWeight: '300',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				b3Tablet: [
					'1.375rem',
					{
						fontWeight: '400',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				b3Mobile: [
					'0.875rem',
					{
						fontWeight: '400',
						lineHeight: 'auto',
						letterSpacing: '0'
					}
				],

				textlink: [
					'1.25rem',
					{
						fontWeight: '400',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				textlinkMobile: [
					'1.625rem',
					{
						fontWeight: '400',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],

				cta: [
					'1.125rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				ctaTablet: [
					'2rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				ctaMobile: [
					'1.125rem',
					{
						fontWeight: '500',
						lineHeight: '120%',
						letterSpacing: '0'
					}
				],
				
			},

			colors: {
				primary: {
					'teal': '#0CB1B1',
					'glaciar': '#12D0FF',
					'violet': '#411693',
				},

				secondary: {
					'green': '#008277',
					'carbon': '#345D61',
					'aqua': '#d2e9ea',
					'deepAqua':'#AFD1D2',
					'lilac': '#f3f5fe',
					'mpurple': '#c2a2ff',
					'glaciar': '#acefff',
					'deepLilac': '#dbdeed',
				},

				neutral: {
					'nude': '#F1ECE5',
					'offwhite': '#f5f5f5',
					'nwhite': '#fcfcfc',
					'fnude': '#e5e5e5',
					'mgray': '#d5d5d5',
					'sgray': '#7a7a7a',
					'dgray': '#444444',
				},

				states: {
					DEFAULT: '#eb3333'
				},

				cta: {
					'dark': '#202020',
					'light': '#ffffff'
				}
			},

			spacing: {
				s1: '0.5rem',
				s2: '1rem',
				s3: '1.5rem',
				s4: '2rem',
				s5: '2.5rem',
				s6: '3rem',
				s7: '3.5rem',
				s8: '4rem',
				s9: '4.5rem',
				s10: '5rem',
				s11: '5.5rem',
				s12: '6rem',
				s13: '6.5rem',
				s14: '7rem',
				s15: '7.5rem',
				s16: '8rem'
			},

			maxWidth: {
        'container': 1136,
				'550': 550,
				'575': 575,
      },

			container: {
				screens: {
					xl: '1140px',
				}
			},

			screens: {
				lg: '1025px'
			},

			borderRadius: {
				card: '20px',
				miniCard: '10px',
				button: '15px'
			},

			backgroundImage: {
        'what-we-do-desktop': "url('/wp-content/themes/accumulus-website/images/home/bg-what-we-do-desktop.png')",
        'what-we-do-tablet': "url('/wp-content/themes/accumulus-website/images/home/bg-what-we-do-tablet.png')",
        'what-we-do-mobile': "url('/wp-content/themes/accumulus-website/images/home/bg-what-we-do-mobile.png')",
      }
		},
  },
  plugins: [],
}

