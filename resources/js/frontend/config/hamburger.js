const mobMenu = document.querySelector("[data-navigation]");
const btnHumb = document.querySelector("[data-toggle-navigation]");
const overlayM = document.querySelector("[data-overlay-navigation]");

const toggleNavigation = () => {
    let overlay_aria_state = overlayM.getAttribute("aria-istoggle");
    if (overlay_aria_state === "true") {
        overlayM.setAttribute("aria-istoggle", "false");
        btnHumb.classList.remove("humbergerIsToggle");
        overlayM.classList.remove("openOverlayOnMob");
        mobMenu.classList.remove("openNavBarOnMob");
        document.body.classList.add("overflow-y-auto");
        return;
    }
    btnHumb.classList.add("humbergerIsToggle");
    overlayM.classList.add("openOverlayOnMob");
    mobMenu.classList.add("openNavBarOnMob");
    document.body.classList.remove("overflow-y-auto");
    overlayM.setAttribute("aria-istoggle", "true");
};

btnHumb.addEventListener("click", (e) => {
    e.preventDefault();

    toggleNavigation();
});

overlayM.addEventListener("click", (e) => {
    e.preventDefault();
    toggleNavigation();
});

const modals = document.querySelectorAll("[data-modal]");

if (modals) {
    modals.forEach((modal) => {
        const toggleModal = () => {
            modal.classList.toggle("opacity-0");
            modal.classList.toggle("invisible");
            document.body.classList.toggle("overflow-y-auto");
        };

        if (
            document.querySelector(
                "[data-toggle-" + modal.getAttribute("data-modal-id") + "]"
            )
        ) {
            document
                .querySelector(
                    "[data-toggle-" + modal.getAttribute("data-modal-id") + "]"
                )
                .addEventListener("click", (e) => {
                    e.preventDefault();
                    toggleModal();
                });
        }

        modal
            .querySelector("[data-modal-overlay]")
            .addEventListener("click", (e) => {
                e.preventDefault();
                toggleModal();
            });
    });
}

const filterBox = document.querySelector("[data-filter-box]");

if (filterBox) {
    document
        .querySelector("[data-open-filterBox]")
        .addEventListener("click", (e) => {
            e.preventDefault();
            filterBox.classList.toggle("-translate-x-full");
            document.body.classList.toggle("overflow-y-auto");
        });

    filterBox
        .querySelector("[data-close-filter]")
        .addEventListener("click", (e) => {
            e.preventDefault();
            filterBox.classList.add("-translate-x-full");
            document.body.classList.add("overflow-y-auto");
        });
    filterBox
        .querySelector("[data-overlay-filter]")
        .addEventListener("click", (e) => {
            e.preventDefault();
            filterBox.classList.add("-translate-x-full");
            document.body.classList.add("overflow-y-auto");
        });
}

const costumSelectBoxs = document.querySelectorAll("[data-costum-select]");

if (costumSelectBoxs) {
    costumSelectBoxs.forEach((costumSelectBox) => {
        const costListItems = costumSelectBox.querySelector(
            "[data-costum-select-list-box]"
        );
        const inputValCost = costumSelectBox.querySelector("[fetch-selected]");

        const toggleBoxList = () => {
            costumSelectBox
                .querySelector("[data-costum-select-container]")
                .classList.toggle("translate-y-4");
            costumSelectBox
                .querySelector("[data-costum-select-container]")
                .classList.toggle("invisible");
        };

        inputValCost.addEventListener("click", (e) => {
            e.preventDefault();
            toggleBoxList();
        });

        let itemSelected = costListItems.querySelector("[selected-val]");
        inputValCost.value = itemSelected.innerHTML;

        costListItems
            .querySelectorAll("[data-costum-liste-item]")
            .forEach((listItem) => {
                listItem.addEventListener("click", (e) => {
                    e.preventDefault();
                    inputValCost.value = listItem.innerHTML;
                    toggleBoxList();
                });
            });
    });
}

const paramBox = document.querySelector("[data-param-box]");
if (paramBox) {
    const paramOverlay = paramBox.querySelector("[data-param-overlay]");
    const btnOpen = document.querySelector("[data-openparam]");

    const btnClose = paramBox.querySelector("[data-close-param]");

    const toggleParam = () => {
        paramBox.classList.toggle("invisible");
        paramBox.classList.toggle("translate-x-full");
        document.body.classList.toggle("overflow-y-auto");
    };

    if (btnOpen) {
        btnOpen.addEventListener("click", (e) => {
            e.preventDefault();
            toggleParam();
        });
    }
    if (btnClose) {
        btnClose.addEventListener("click", (e) => {
            e.preventDefault();
            toggleParam();
        });
    }
    paramOverlay.addEventListener("click", (e) => {
        e.preventDefault();
        toggleParam();
    });
}

const languesSwitcher = document.querySelector("[data-langues]");
if (languesSwitcher) {
    const langueFetch = languesSwitcher.querySelector(
        "[data-fetch-selected-lang]"
    );
    const languesOptions = languesSwitcher.querySelectorAll("[data-lang]");

    langueFetch.querySelector("img").src = languesSwitcher
        .querySelector("[default-lang]")
        .querySelector("[lang-img]").src;
    langueFetch.querySelector("h3").innerHTML = languesSwitcher
        .querySelector("[default-lang]")
        .getAttribute("langue-abbrev");


    langueFetch.addEventListener("click", (e) => {
        e.preventDefault();
        languesSwitcher
            .querySelector("[data-langues-listbox]")
            .classList.toggle("invisible");
        languesSwitcher
            .querySelector("[data-langues-listbox]")
            .classList.toggle("opacity-0");
        languesSwitcher
            .querySelector("[data-langues-listbox]")
            .classList.toggle("translate-y-5");
    });
    languesOptions.forEach((langueOption) => {
        langueOption.addEventListener("click", (e) => {
            e.preventDefault();
            langueFetch.querySelector("img").src =
                langueOption.querySelector("[lang-img]").src;
            langueFetch.querySelector("h3").innerHTML =
                langueOption.getAttribute("langue-abbrev");
            languesSwitcher
                .querySelector("[data-langues-listbox]")
                .classList.add("invisible", "opacity-0", "translate-y-5");
        });
    });
}

btnHumb.addEventListener("click", (e) => {
    e.preventDefault();

    toggleNavigation();
});

overlayM.addEventListener("click", (e) => {
    e.preventDefault();
    console.log("");
    toggleNavigation();
});

