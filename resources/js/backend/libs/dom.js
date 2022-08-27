export const createButtonLoader = (element, loadingText = 'chargement...') => {
    element.classList.add('disabled')
    element.setAttribute('disabled', 'disabled')
    element.setAttribute('aria-disabled', 'true')
    element.setAttribute('tabindex', '-1')

    let icon = element.querySelector('.icon')
    if (icon) {
        removeClassByPrefix(icon, 'ni-', 'ni-loader')
            .setAttribute('aria-label', 'loader')
    } else {
        element.innerHTML = `
            <em class="icon ni ni-loader" role="img" aria-label="loader"></em>
            <span>${loadingText}</span>
        `
    }
}

export const removeClassByPrefix = (element, prefix, replace = '') => {
    const regex = new RegExp('\\b' + prefix + '[^ ]*[ ]?\\b', 'g');
    element.className = element.className.replace(regex, replace);
    return element;
}

