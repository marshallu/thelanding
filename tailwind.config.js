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
      green: "#00AC3E",
      white: "#ffffff",
      yellow: "#F3D03E",
      beige: "#D5CB9F",
      purple: "#830065",
      teal: "#4298B5",
      orange: "#E87722",

      "green-darker": "#007129",
      "green-dark": "#029F3B",
      "green-bright": "#08cd4f",

    },
    container: {
      center: true
    },
    fontFamily: {
      sans: ["Open Sans", "Helvetica Neue", "Helvetica", "Arial", "sans-serif"],
      serif: ["Sentinel A", "Sentinel B", "Bookman Old Style Regular", "serif"]
    },
    extend: {},
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

      const arrowGenerators = [
        (color, name) => ({
          [`.${name}-arrow-t`] : { margin: 'auto', height: 0, width: 0, borderLeft: `${theme('spacing.8')} solid transparent`, borderRight: `${theme('spacing.8')} solid transparent`, borderTop: `${theme('spacing.8')} solid ${color}` },
          [`.${name}-arrow-t-lg`] : { margin: 'auto', height: 0, width: 0, borderLeft: `${theme('spacing.12')} solid transparent`, borderRight: `${theme('spacing.12')} solid transparent`, borderTop: `${theme('spacing.12')} solid ${color}` },
          [`.${name}-arrow-t-sm`] : { margin: 'auto', height: 0, width: 0, borderLeft: `${theme('spacing.3')} solid transparent`, borderRight: `${theme('spacing.3')} solid transparent`, borderTop: `${theme('spacing.3')} solid ${color}` },
          [`.${name}-arrow-b`] : { margin: 'auto', height: 0, width: 0, borderLeft: `${theme('spacing.8')} solid ${color}`, borderRight: `${theme('spacing.8')} solid ${color}`, borderTop: `${theme('spacing.8')} solid transparent` },
          [`.${name}-arrow-b-lg`] : { margin: 'auto', height: 0, width: 0, borderLeft: `${theme('spacing.12')} solid ${color}`, borderRight: `${theme('spacing.12')} solid ${color}`, borderTop: `${theme('spacing.12')} solid transparent` },
          [`.${name}-arrow-b-sm`] : { margin: 'auto', height: 0, width: 0, borderLeft: `${theme('spacing.3')} solid ${color}`, borderRight: `${theme('spacing.3')} solid ${color}`, borderTop: `${theme('spacing.3')} solid transparent` },
        }),
      ]

      const arrowUtilities = _.flatMap(arrowGenerators, generator => {
        return _.flatMap(defaultColors, generator)
      })

      addUtilities(arrowUtilities, ['responsive', 'hover', 'group-hover'])

      const buttons = {
        '.btn': {
          padding: `${theme('spacing.2')} ${theme('spacing.4')}`,
          borderRadius: theme('borderRadius.default'),
          borderWidth: theme('borderWidth.default'),
        },
        '.btn-white': {
          backgroundColor: theme('colors.white'),
          color: theme('colors.orange'),
          borderColor: theme('colors.black'),
          '&:hover': {
            backgroundColor: theme('colors.orange'),
            color: theme('colors.white')
          },
        },
        '.btn-orange': {
          backgroundColor: theme('colors.orange'),
          color: theme('colors.white'),
          borderColor: theme('colors.black'),
          '&:hover': {
            backgroundColor: theme('colors.white'),
            color: theme('colors.orange')
          },
        },
        '.btn-green': {
          backgroundColor: theme('colors.green'),
          color: theme('colors.black'),
          borderColor: theme('colors.green'),
          '&:hover': {
            backgroundColor: theme('colors.black'),
            color: theme('colors.green'),
            borderColor: theme('colors.black'),
          },
        },
      }

      addComponents(buttons)
    })

  ]
}
