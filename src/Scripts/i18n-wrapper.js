'use strict';
var fs = require('fs');

for (let j = 0; j < process.argv.length; j++) {
    console.log(j + ' -> ' + (process.argv[j]));
}

let i18n = fs.readFileSync( process.argv[2], 'utf-8');

i18n = JSON.parse(i18n.toString().replace('export default ', ''));
console.log(i18n);

const keys = Object.keys(i18n);

const countriesSymbols = ['en', 'pl'];

const modules = keys.filter(x => !countriesSymbols.includes(x));
const symbols = keys.filter(x => countriesSymbols.includes(x));

let translations = {};

symbols.forEach(function(symbol) {
    translations[symbol] = i18n[symbol];
});

modules.forEach(function(module) {
    Object.keys(i18n[module]).forEach(function(symbol) {
        translations[symbol] = {...translations[symbol], ...i18n[module][symbol]};
    });
});

var json = JSON.stringify(translations, null, 4);

fs.writeFile('myjsonfile.js', 'export default ' + json, 'utf8');
