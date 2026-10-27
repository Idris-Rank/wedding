/**
 * Tailwind config for the public invitation theme.
 * Source of truth for the palette that used to live inline in
 * application/views/home.blade.php; built by 'npm run build:css'.
 * Admin pages use tailwind.admin.config.js (different palette values).
 */
module.exports = {
    content: [
        './application/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                ivory: '#fbf8f0',
                sand: '#eee5d4',
                sage: '#8b9789',
                forest: '#26372f',
                deep: '#1d2924',
                clay: '#874b36',
                ink: '#2d302b',
                gold: '#b99452',
                champagne: '#dfc894',
                sogan: '#762f25',
                wood: '#5c3928',
                jogja: {
                    50: '#fbf8f1',
                    100: '#f4ead6',
                    300: '#d6b878',
                    500: '#a87a32',
                    700: '#6d431c',
                    900: '#2d1b12',
                },
            },
            fontFamily: {
                display: ['Cormorant Garamond', 'Georgia', 'serif'],
                sans: ['DM Sans', 'system-ui', 'sans-serif'],
            },
            boxShadow: {
                soft: '0 20px 60px rgba(45, 27, 18, .12)',
            },
            keyframes: {
                fadeUp: {
                    '0%': { opacity: '0', transform: 'translateY(28px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                musicBar: {
                    '0%': { height: '5px' },
                    '100%': { height: '15px' },
                },
            },
            animation: {
                'fade-up': 'fadeUp 1s ease-out both',
                'music-bar': 'musicBar .8s ease-in-out infinite alternate',
            },
        },
    },
    plugins: [],
};
