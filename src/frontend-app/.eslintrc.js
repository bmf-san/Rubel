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
      "error", "never"
    ],
    "linebreak-style": [
      "error", "unix"
    ],
    "quotes": [
      "error", "double"
    ],
    "semi": ["error", "always"]
  }
};
