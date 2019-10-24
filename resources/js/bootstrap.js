window._ = require('lodash')
window.Popper = require('popper.js').default;
let token = window.token = document.head.querySelector('meta[name="csrf-token"]');
