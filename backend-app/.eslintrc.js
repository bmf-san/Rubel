module.exports = {
  "env": {
    "browser": true,
    "es6": true
  },
  'extends': ['plugin:react/recommended'],
  "parserOptions": {
    "ecmaFeatures": {
      "experimentalObjectRestSpread": true,
      "jsx": true
    },
    "sourceType": "module"
  },
  "plugins": ["react"],
  "rules": {
    "object-curly-spacing": [
      "error", "always"
    ],
    "indent": [
      "error", "tab"
    ],
    "linebreak-style": [
      "error", "unix"
    ],
    "quotes": [
      "error", "double"
    ],
    "semi": ["error", "never"]
  }
};
