var Inputmask = require('inputmask');

Inputmask("99-99-9999", {
    "clearIncomplete": true
}).mask($('#birthday'));

Inputmask("99-99-9999", {
    "clearIncomplete": true
}).mask($('#birthday_d'));

Inputmask("99-999", {
    "clearIncomplete": true
}).mask($('#post_code'));

Inputmask("99-999", {
    "clearIncomplete": true
}).mask($('#company_post_code'));

Inputmask("99:99:99", {
    "clearIncomplete": true
}).mask($('#time'));