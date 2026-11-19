/**
 * Tailwind config for the admin package theme. Kept separate from
 * tailwind.config.js because the admin palette uses different values
 * for the same color names (ink, forest, clay, gold).
 */
module.exports = {
    content: [
        './packages/admin/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                ink: '#28352d',
                forest: '#30483b',
                cream: '#fbf8f1',
                clay: '#b9785d',
                gold: '#c8a66a',
            },
            fontFamily: {
                display: ['Playfair Display', 'serif'],
                sans: ['DM Sans', 'sans-serif'],
            },
            boxShadow: {
                soft: '0 18px 50px rgba(38, 55, 47, .12)',
            },
        },
    },
    plugins: [],
};
