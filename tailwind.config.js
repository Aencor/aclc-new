/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./wp-content/themes/codebymonk/**/*.{php,html,js}"],
  theme: {
    extend: {
      colors: {
        aclc: {
          red: '#E81D2D',
          amber: '#F5D93E',
          green: '#00A84F',
          gold: '#EBAB21',
          kn: '#001722',
          navy: '#1F3A5F',
          navysoft: '#E7EDF4',
          fuego: '#C2602A',
          shgreen: '#1A5632',
          ink: '#16222B',
          muted: '#5A6875',
          line: '#E1E7ED',
          paper: '#FFFFFF',
        },
      },
      fontFamily: {
        display: ['Fraunces', 'Georgia', 'serif'],
        body: ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
        mono: ['"Space Mono"', 'monospace'],
      },
    },
  },
  plugins: [],
}
