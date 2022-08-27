import { parse } from 'filepond';

const ready = (callback) => {
    if (document.readyState !== "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
};

ready(() => {
    parse(document.body);
});
