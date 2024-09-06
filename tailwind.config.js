/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./*.{php,html,js}', './template-parts/*.{php,html,js}'],
  theme: {
    extend: {
      fontFamily: {
        tp: ["'TP Fors'", 'sans-serif'],
      },

      fontSize: {
        h1: [
          '5.938rem',
          {
            fontWeight: '400',
            lineHeight: '106%',
            letterSpacing: '0',
          },
        ],
        h1Tablet: [
          '4.5rem',
          // '3.5rem',
          {
            fontWeight: '400',
            lineHeight: '106%',
            letterSpacing: '0',
          },
        ],
        h1Mobile: [
          // '4.875rem',
          '2.125rem',
          {
            fontWeight: '400',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],

        h2: [
          '3.75rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        h2Tablet: [
          '3rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        h2Mobile: [
          '1.625rem',
          {
            fontWeight: '500',
            lineHeight: 'auto',
            letterSpacing: '0',
          },
        ],

        h3: [
          '1.75rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        h3Tablet: [
          '2.25rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        h3Mobile: [
          '1.25rem',
          {
            fontWeight: '500',
            lineHeight: '28px',
            letterSpacing: '0',
          },
        ],

        h4: [
          '1rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0.25rem',
          },
        ],
        h4Tablet: [
          '1.125rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0.25rem',
          },
        ],
        h4Mobile: [
          '1rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0.25rem',
          },
        ],

        h5: [
          '0.875rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        h5Tablet: [
          '1.5rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        h5Mobile: [
          '1.125rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],

        h6: [
          '1.125rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        h6Tablet: [
          '1.75rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        h6Mobile: [
          '1rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],

        h7: [
          '1.375rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        h7Tablet: [
          '1rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        h7Mobile: [
          '1rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],

        h8: [
          '8.75rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        h8Tablet: [
          '11.25rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        h8Mobile: [
          '7.063rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],

        h9: [
          '3.75rem',
          {
            fontWeight: '400',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        h9Tablet: [
          '5rem',
          {
            fontWeight: '400',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        h9Mobile: [
          '4.875rem',
          {
            fontWeight: '400',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],

        h10: [
          '1.625rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],

        b1: [
          '1.75rem',
          {
            fontWeight: '400',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        b1Tablet: [
          '1.875rem',
          {
            fontWeight: '400',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        b1Mobile: [
          '1.25rem',
          {
            fontWeight: '400',
            lineHeight: 'auto',
            letterSpacing: '0',
          },
        ],

        b2: [
          '1.25rem',
          {
            fontWeight: '400',
            lineHeight: '28px',
            letterSpacing: '0',
          },
        ],
        b2Tablet: [
          '1.5rem',
          {
            fontWeight: '400',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        b2Mobile: [
          '1.125rem',
          {
            fontWeight: '400',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],

        b3: [
          '1.125rem',
          {
            fontWeight: '300',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        b3Tablet: [
          '1.375rem',
          {
            fontWeight: '400',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        b3Mobile: [
          '0.875rem',
          {
            fontWeight: '400',
            lineHeight: 'auto',
            letterSpacing: '0',
          },
        ],

        b4: [
          '1rem',
          {
            fontWeight: '300',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        b4Tablet: [
          '1.25rem',
          {
            fontWeight: '400',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        b4Mobile: [
          '0.75rem',
          {
            fontWeight: '400',
            lineHeight: 'auto',
            letterSpacing: '0',
          },
        ],

        textlink: [
          '1.25rem',
          {
            fontWeight: '400',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        textlinkMobile: [
          '1.625rem',
          {
            fontWeight: '400',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],

        cta: [
          '1.125rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        ctaTablet: [
          '1.625rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
        ctaMobile: [
          '1.125rem',
          {
            fontWeight: '500',
            lineHeight: '120%',
            letterSpacing: '0',
          },
        ],
      },

      colors: {
        primary: {
          teal: '#0CB1B1',
          glaciar: '#12D0FF',
          violet: '#411693',
        },

        secondary: {
          green: '#008277',
          carbon: '#345D61',
          aqua: '#d2e9ea',
          deepAqua: '#AFD1D2',
          lilac: '#f3f5fe',
          mpurple: '#c2a2ff',
          glaciar: '#acefff',
          deepLilac: '#dbdeed',
        },

        neutral: {
          nude: '#FFF8F1',
          offwhite: '#f5f5f5',
          nwhite: '#fcfcfc',
          fnude: '#e5e5e5',
          mgray: '#d5d5d5',
          sgray: '#7a7a7a',
          dgray: '#444444',
        },

        states: {
          DEFAULT: '#eb3333',
        },

        cta: {
          dark: '#202020',
          light: '#ffffff',
        },
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
        s16: '8rem',
        s17: '8.5rem',
        s18: '9rem',
        s19: '9.5rem',
        s20: '10rem',
      },

      maxWidth: {
        container: 1136,
        550: 550,
        575: 575,
      },

      container: {
        screens: {
          xl: '1140px',
        },
      },

      screens: {
        lg: '1025px',
        // md: '800px',
      },

      borderRadius: {
        large: '40px',
        card: '20px',
        miniCard: '10px',
        button: '15px',
      },

      backgroundImage: {
        // home
        'what-we-do-desktop':
          "url('/wp-content/themes/accumulus-website/images/home/bg-what-we-do-desktop.png')",
        'what-we-do-tablet':
          "url('/wp-content/themes/accumulus-website/images/home/bg-what-we-do-tablet.png')",
        'what-we-do-mobile':
          "url('/wp-content/themes/accumulus-website/images/home/bg-what-we-do-mobile.png')",
        // about
        'what-we-do-about-tablet':
          "url('/wp-content/themes/accumulus-website/images/about-us/what-we-do-tablet.png')",

        'quote-home-desktop':
          "url('/wp-content/themes/accumulus-website/images/home/bg-quote-home-desktop.png')",
        'quote-home-tablet':
          "url('/wp-content/themes/accumulus-website/images/home/bg-quote-home-tablet.png')",
        'quote-home-mobile':
          "url('/wp-content/themes/accumulus-website/images/home/bg-quote-home-mobile.png')",
        // Purple section - resources page
        'purple-section-desktop':
          "url('/wp-content/themes/accumulus-website/images/resources/bg-purple-desktop.png')",
        'purple-section-tablet':
          "url('/wp-content/themes/accumulus-website/images/resources/bg-purple-tablet.png')",
        'purple-section-mobile':
          "url('/wp-content/themes/accumulus-website/images/resources/bg-purple-mobile.png')",

        // News
        'news-banner-desktop':
          "url('/wp-content/themes/accumulus-website/images/news/bg-news-desktop.webp')",
        'news-banner-tablet':
          "url('/wp-content/themes/accumulus-website/images/news/bg-news-tablet.webp')",
        'news-banner-mobile':
          "url('/wp-content/themes/accumulus-website/images/news/bg-news-mobile.webp')",

        // Get started page
        'get-started-desktop':
          "url('/wp-content/themes/accumulus-website/images/get-started/main-banner-desktop.png')",
        'get-started-tablet':
          "url('/wp-content/themes/accumulus-website/images/get-started/main-banner-tablet.png')",
        'get-started-mobile':
          "url('/wp-content/themes/accumulus-website/images/get-started/main-banner-mobile.png')",

        // Get started block
        'get-started-section-desktop':
          "url('/wp-content/themes/accumulus-website/images/get-started-section/bg-block-get-started-web.png')",
        'get-started-section-tablet':
          "url('/wp-content/themes/accumulus-website/images/get-started-section/bg-block-get-started-tablet.png')",
        'get-started-section-mobile':
          "url('/wp-content/themes/accumulus-website/images/get-started-section/bg-block-get-started-mobile.png')",

        // Case for change page
        'case-for-change-desktop':
          "url('/wp-content/themes/accumulus-website/images/case-for-change/main-banner-desktop.png')",
        'case-for-change-tablet':
          "url('/wp-content/themes/accumulus-website/images/case-for-change/main-banner-tablet.png')",
        'case-for-change-mobile':
          "url('/wp-content/themes/accumulus-website/images/case-for-change/main-banner-mobile.png')",

        // Platform
        'main-platform-desktop':
          "url('/wp-content/themes/accumulus-website/images/platform/bg-main-platform-desktop.png')",
        'main-platform-tablet':
          "url('/wp-content/themes/accumulus-website/images/platform/bg-main-platform-tablet.png')",
        'main-platform-mobile':
          "url('/wp-content/themes/accumulus-website/images/platform/bg-main-platform-mobile.png')",

        // Platform -> Benefits
        'benefits-desktop':
          "url('/wp-content/themes/accumulus-website/images/platform/bg-benefit-desktop.png')",
        'benefits-tablet':
          "url('/wp-content/themes/accumulus-website/images/platform/bg-benefit-tablet.png')",
        'benefits-mobile':
          "url('/wp-content/themes/accumulus-website/images/platform/bg-benefit-mobile.png')",

        // Core capabilities
        'core-capabilities-desktop':
          "url('/wp-content/themes/accumulus-website/images/core-capabilities/bg-core-capabilities.png')",
        'core-capabilities-tablet':
          "url('/wp-content/themes/accumulus-website/images/core-capabilities/bg-core-capabilities-tablet.png')",
        'core-capabilities-mobile':
          "url('/wp-content/themes/accumulus-website/images/core-capabilities/bg-core-capabilities-mobile.png')",

        // Regulator forum
        'regulator-forum-desktop':
          "url('/wp-content/themes/accumulus-website/images/regulator-forum/bg-regulator-forum.png')",
        'regulator-forum-tablet':
          "url('/wp-content/themes/accumulus-website/images/regulator-forum/bg-regulator-forum-tablet.png')",
        'regulator-forum-mobile':
          "url('/wp-content/themes/accumulus-website/images/regulator-forum/bg-regulator-forum-mobile.png')",
        //Quote
        'regulator-quote-desktop':
          "url('/wp-content/themes/accumulus-website/images/regulator-forum/bg-quote-desktop.png')",
        'regulator-quote-tablet':
          "url('/wp-content/themes/accumulus-website/images/regulator-forum/bg-quote-tablet.png')",
        'regulator-quote-mobile':
          "url('/wp-content/themes/accumulus-website/images/regulator-forum/bg-quote-mobile.png')",

        // Regulator form - related
        'increase-feedback-desktop':
          "url('/wp-content/themes/accumulus-website/images/regulator-forum/bg-increase-feedback.png')",
        'increase-feedback-tablet':
          "url('/wp-content/themes/accumulus-website/images/regulator-forum/bg-increase-feedback-tablet.png')",
        'increase-feedback-mobile':
          "url('/wp-content/themes/accumulus-website/images/regulator-forum/bg-increase-feedback-mobile.png')",

        // CASE
        'citation-desktop':
          "url('/wp-content/themes/accumulus-website/images/case-for-change/bg-citations-desktop.png')",
        'citation-tablet':
          "url('/wp-content/themes/accumulus-website/images/case-for-change/bg-citations-tablet.png')",
        'citation-mobile':
          "url('/wp-content/themes/accumulus-website/images/case-for-change/bg-citations-mobile.png')",

        // Events
        'events-general':
          "url('/wp-content/themes/accumulus-website/images/events/bg-default-events.png')",

        // Resources
        'resources-general':
          "url('/wp-content/themes/accumulus-website/images/resources/bg-main-post.png')",

        // 404
        '404-desktop':
          "url('/wp-content/themes/accumulus-website/images/404/bg-404-desktop.png')",
        '404-tablet':
          "url('/wp-content/themes/accumulus-website/images/404/bg-404-tablet.png')",
        '404-mobile':
          "url('/wp-content/themes/accumulus-website/images/404/bg-404-mobile.png')",
      },
    },
  },
  plugins: [],
};
