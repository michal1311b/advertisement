var toggle_icon = document.getElementById('theme-toggle');
var body = document.getElementsByTagName('body')[0];
var sideNav = document.getElementsByClassName('side-nav');
var nav = document.getElementsByTagName('nav')[0];
var langDropdown = document.getElementsByClassName('lang-dropdown');
var content = document.getElementById('app');
var card = document.getElementsByClassName('card');
var li = document.getElementsByClassName('list-group-item');
var table = document.getElementsByClassName('table')[0];
var sun_class = 'icon-sun';
var moon_class = 'icon-moon';
let cookie = document.cookie.includes('theme=dark;');

toggle_icon.addEventListener('click', function() {
    if (toggle_icon.classList.contains(sun_class)) {
        toggle_icon.classList.add(moon_class);
        toggle_icon.classList.remove(sun_class);

        unsetDarkTheme();
        setCookie('theme', 'light');
    }
    else {
        toggle_icon.classList.add(sun_class);
        toggle_icon.classList.remove(moon_class);

        setDarkTheme();
        setCookie('theme', 'dark');
    }
});

const hours = new Date().getHours();
const isNightTime = hours > 6 && hours < 20;

if(cookie || !isNightTime) {
    setDarkTheme();
} else {
    unsetDarkTheme();
}

function setDarkTheme() {
    body.classList.add('dark-theme');
    content.classList.add('dark-theme');
    for (let item of sideNav) {
        item.classList.add('dark-theme');
    }
    nav.classList.add('dark-theme');
    
    for (let item of langDropdown) {
        item.classList.add('dark-theme');
    }
    for (let item of card) {
        item.classList.add('dark-theme');
    }
    for (let item of li) {
        item.classList.add('dark-theme');
        item.classList.add('border');
        item.classList.add('border-white');
    }

    if(table !== undefined) {
        table.classList.add('dark-theme');
    }
}

function unsetDarkTheme() {
    body.classList.remove('dark-theme');
    content.classList.remove('dark-theme');
    for (let item of sideNav) {
        item.classList.remove('dark-theme');
    }
    nav.classList.remove('dark-theme');
    for (let item of langDropdown) {
        item.classList.remove('dark-theme');
    }

    for (let item of card) {
        item.classList.remove('dark-theme');
    }

    for (let item of li) {
        item.classList.remove('dark-theme');
        item.classList.remove('border');
        item.classList.remove('border-white');
    }
    if(table !== undefined) {
        table.classList.remove('dark-theme');
    }
}

function setCookie(name, value) {
    var d = new Date();
    d.setTime(d.getTime() + (365*24*60*60*1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}