
//   ------------- numbers counter -----------------//

$(document).ready(function () {
    $(".counter").counterUp({
        delay: 10,
        time: 1200,
    });
});

// ---------------------- aos (animation on scroll) --------------------//

window.addEventListener('load', () => {
    AOS.init({
        duration: 500,
        easing: 'fade-up',
        once: true,
        mirror: false
    })
});

//---------------------- jquery fancybox plugin -------------------------// 

$(document).ready(function () {
    $("a.gallery-item").fancybox({
        // Options for the Fancybox plugin
        loop: true
    });
});

// ----------------------- clients carousel -------------------//

$('.owl-carousel.client').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 1200,
    responsive: {
        0: {
            items: 2
        },
        600: {
            items: 3
        },
        1000: {
            items: 6
        }
    }
})

// ------------- sticky navbar on scroll ---------------- //

$(window).scroll(function () {
    if ($(window).scrollTop()) {
        $(".navbar").addClass("sticky")
    }
    else {
        $(".navbar").removeClass("sticky")
    }
})

// ------------- switch between dark and light mode ---------------- //

// Function to toggle between light and dark mode
function toggleDarkMode() {
    const body = document.body;
    const icon = document.getElementById('mode-icon');

    // Toggle the dark mode class
    body.classList.toggle('dark-mode');

    // Toggle the icon
    if (body.classList.contains('dark-mode')) {
        icon.classList.remove('bi-moon-fill');
        icon.classList.add('bi-sun-fill');
    } else {
        icon.classList.remove('bi-sun-fill');
        icon.classList.add('bi-moon-fill');
    }

    // Save the user's preference to localStorage
    const isDarkMode = body.classList.contains('dark-mode');
    localStorage.setItem('dark-mode', isDarkMode);
}

// Check if user's preference is stored in localStorage
const isDarkModeSaved = localStorage.getItem('dark-mode');

// Apply the saved preference (if available)
if (isDarkModeSaved === 'true') {
    document.body.classList.add('dark-mode');
} else {
    document.body.classList.remove('dark-mode');
}

// Update the icon based on the saved preference
const icon = document.getElementById('mode-icon');
if (icon) {
    if (isDarkModeSaved === 'true') {
        icon.classList.add('bi-sun-fill');
    } else {
        icon.classList.add('bi-moon-fill');
    }
}

// Add event listener to the mode toggle button
const modeToggle = document.getElementById('mode-toggle');
if (modeToggle) {
    modeToggle.addEventListener('click', toggleDarkMode);
}




// ================== portfolio filter ====================== //

$(document).ready(function () {

    // initialize Isotope
    var $grid = $('.row.portfolio-row').isotope({
        itemSelector: '.col-lg-4',
        layoutMode: 'fitRows'
    });

    // filter items on button click
    $('.filters').on('click', 'a', function () {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
    });

});

function rotateIcon(iconId) {
    const icon = document.getElementById(iconId);
    icon.classList.toggle('rotated');
}
// ---------------- back to top button -------------------- //
// REMOVIDO


