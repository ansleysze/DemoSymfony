module.exports = {
  entry: {
    keenicons: [
      {
        src: ['src/vendors/keenicons/**/style.css'],
        dist: 'dist/assets/vendors/keenicons/styles.bundle.css',
        bundle: true,
      },
      {
        src: [
          'src/vendors/keenicons/duotone/fonts',
          'src/vendors/keenicons/filled/fonts',
          'src/vendors/keenicons/outline/fonts',
          'src/vendors/keenicons/solid/fonts',
        ],
        dist: 'dist/assets/vendors/keenicons/fonts',
      }
    ],
    '@form-validation': [
      {
        src: ['src/vendors/@form-validation/umd/styles'],
        dist: 'dist/assets/vendors/@form-validation',
      },
      {
        src: [
          'src/vendors/@form-validation/umd/bundle/popular.min.js',
          'src/vendors/@form-validation/umd/bundle/full.min.js',
          'src/vendors/@form-validation/umd/plugin-bootstrap5/index.min.js',
        ],
        dist: 'dist/assets/vendors/@form-validation/form-validation.bundle.js',
        bundle: true,
      },
    ],
    leaflet: [
      {
        src: ['node_modules/leaflet/dist/leaflet.css'],
        dist: 'dist/assets/vendors/leaflet/leaflet.bundle.css',
        bundle: true,
      },
      {
        src: [
          'node_modules/leaflet/dist/leaflet.js',
          'node_modules/esri-leaflet/dist/esri-leaflet.js',
          'node_modules/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.js',
        ],
        dist: 'dist/assets/vendors/leaflet/leaflet.bundle.js',
        bundle: true,
      },
    ],
    apexcharts: [
      {
        src: ['node_modules/apexcharts/dist/apexcharts.css'],
        dist: 'dist/assets/vendors/apexcharts/apexcharts.css',
      },
      {
        src: ['node_modules/apexcharts/dist/apexcharts.min.js'],
        dist: 'dist/assets/vendors/apexcharts/apexcharts.min.js',
      },
    ],
    prismjs: [
      {
        src: [
          'node_modules/prismjs/prism.js',
          'node_modules/prismjs/components/prism-markup.js',
          'node_modules/prismjs/components/prism-markup-templating.js',
          'node_modules/prismjs/components/prism-bash.js',
          'node_modules/prismjs/components/prism-javascript.js',
          'node_modules/prismjs/components/prism-css.js',
          'node_modules/prismjs/plugins/normalize-whitespace/prism-normalize-whitespace.js',
          'src/vendors/prismjs/prismjs.init.js'
        ],
        dist: 'dist/assets/vendors/prismjs/prismjs.min.js',
        bundle: true,
      }
    ],
    clipboard: [
      {
        src: ['node_modules/clipboard/dist/clipboard.min.js'],
        dist: 'dist/assets/vendors/clipboard/clipboard.min.js'
      }
    ]
  }
};