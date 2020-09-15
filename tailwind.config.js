const _ = require('lodash')
const plugin = require('tailwindcss/plugin')

module.exports = {
  purge: [
    './*.php',
    './template-parts/*.php',
    './src/css/*.css',
    './src/css/**/*.css',
  ],
  theme: {
    colors: {
      transparent: "transparent",
      inherit: "inherit",
      black: "#131716",
      white: "#ffffff",

      "dark-brown": "#a35d43",
      "darker-brown": "#55382f",
      "light-brown": "#bb905c",
      "orange": "#d97f28",
      "green": "#00AC3E",
      "dark-green": "#1c8878",
      "light-green": "#8ec63f",

      "gray": "#999999",
    },
    container: {
      center: true
    },
    fontFamily: {
      sans: ["Open Sans", "Helvetica Neue", "Helvetica", "Arial", "sans-serif"],
      serif: ["Sentinel A", "Sentinel B", "Bookman Old Style Regular", "serif"]
    },
    extend: {
      minHeight: {
        '24': '6rem',
        '48': '12rem',
        '64': '16rem',
        '80': '20rem',
        '96': '24rem',
        '112': '28rem',
        '128': '32rem',
        '144': '36rem',
        '160': '40rem',
        '176': '44rem',
        '184': '46rem',
        '200': '50rem',
        '224': '56rem'
      },
    },
  },
  variants: {},
  plugins: [
    plugin(function ({ addUtilities, theme, addComponents }) {

      function hexToRGB(h) {
        let r = 0, g = 0, b = 0;

        if (h.length == 4) {
          r = "0x" + h[1] + h[1];
          g = "0x" + h[2] + h[2];
          b = "0x" + h[3] + h[3];

        } else if (h.length == 7) {
          r = "0x" + h[1] + h[2];
          g = "0x" + h[3] + h[4];
          b = "0x" + h[5] + h[6];
        }

        return +r + "," + +g + "," + +b
      }

      const defaultColors = theme('colors');

      const overlayGenerators = [
        (color, name) => ({
          [`.bg-${name}-overlay-10`] : { backgroundColor: `rgba(${hexToRGB(color)},0.1)`},
          [`.bg-${name}-overlay-20`] : { backgroundColor: `rgba(${hexToRGB(color)},0.2)`},
          [`.bg-${name}-overlay-30`] : { backgroundColor: `rgba(${hexToRGB(color)},0.3)`},
          [`.bg-${name}-overlay-40`] : { backgroundColor: `rgba(${hexToRGB(color)},0.4)`},
          [`.bg-${name}-overlay-50`] : { backgroundColor: `rgba(${hexToRGB(color)},0.5)`},
          [`.bg-${name}-overlay-60`] : { backgroundColor: `rgba(${hexToRGB(color)},0.6)`},
          [`.bg-${name}-overlay-70`] : { backgroundColor: `rgba(${hexToRGB(color)},0.7)`},
          [`.bg-${name}-overlay-80`] : { backgroundColor: `rgba(${hexToRGB(color)},0.8)`},
          [`.bg-${name}-overlay-90`] : { backgroundColor: `rgba(${hexToRGB(color)},0.9)`},
        }),
      ]

      const overlayUtilities = _.flatMap(overlayGenerators, generator => {
        return _.flatMap(defaultColors, generator)
      })

      addUtilities(overlayUtilities, ['responsive', 'hover', 'group-hover'])

      const buttons = {
        '.btn': {
          padding: `${theme('spacing.3')} ${theme('spacing.5')}`,
          borderRadius: theme('borderRadius.default'),
          borderWidth: theme('borderWidth.default'),
          fontSize: theme('fontSize.lg')
        },
        '.btn-orange': {
          backgroundColor: theme('colors.orange'),
          color: theme('colors.white'),
          borderColor: theme('colors.black'),
          '&:hover': {
            backgroundColor: theme('colors.white'),
            color: theme('colors.orange')
          },
        }
      }

      addComponents(buttons)

      const textShadows = {
        '.text-shadow' : {
          textShadow: '5px 5px 5px rgba(0, 0, 0, 0.3), 10px 10px 10px rgba(0, 0, 0, 0.4)'
        },
        '.text-shadow-lg' : {
          textShadow: '-3px 3px 18.2px rgba(0, 0, 0, 0.25)'
        },
        '.text-shadow-sm' : {
          textShadow: '-1px 1px 18.2px rgba(0, 0, 0, 0.25)'
        },
      }

      addComponents(textShadows, {
        variants: ['responsive', 'hover'],
      })

    })

  ]
}
