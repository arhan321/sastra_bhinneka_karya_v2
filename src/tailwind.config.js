/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./app/**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        'sbk': {
          'red': '#CC0000',
          'red-dark': '#990000',
          'red-light': '#FF3333',
          'black': '#0D0D0D',
          'dark': '#1A1A1A',
          'gray': '#2D2D2D',
          'gray-mid': '#6B7280',
          'gray-light': '#F8F8F8',
          'gray-border': '#E5E7EB',
        }
      },
      fontFamily: {
        'sans': ['Inter', 'sans-serif'],
        'heading': ['Montserrat', 'sans-serif'],
      },
      borderRadius: {
        '4xl': '2rem',
        '5xl': '3rem',
      },
      boxShadow: {
        'red': '0 8px 30px rgba(204,0,0,0.15)',
        'red-lg': '0 20px 60px rgba(204,0,0,0.25)',
        'soft': '0 4px 24px rgba(0,0,0,0.06)',
        'card': '0 8px 40px rgba(0,0,0,0.08)',
      },
      animation: {
        'fade-up': 'fadeUp 0.7s ease-out forwards',
        'fade-in': 'fadeIn 0.5s ease-out forwards',
        'slide-right': 'slideRight 0.6s ease-out forwards',
        'float': 'float 3s ease-in-out infinite',
        'pulse-red': 'pulseRed 2s ease-in-out infinite',
      },
      keyframes: {
        fadeUp: {
          '0%': { opacity: '0', transform: 'translateY(40px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        slideRight: {
          '0%': { opacity: '0', transform: 'translateX(-30px)' },
          '100%': { opacity: '1', transform: 'translateX(0)' },
        },
        float: {
          '0%,100%': { transform: 'translateY(0px)' },
          '50%': { transform: 'translateY(-12px)' },
        },
        pulseRed: {
          '0%,100%': { boxShadow: '0 0 0 0 rgba(204,0,0,0.4)' },
          '50%': { boxShadow: '0 0 0 12px rgba(204,0,0,0)' },
        },
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}