ScrollReveal({ 
    reset: true,
    distance: '80px',
    duration: 1000,
    delay: 200 
});

    ScrollReveal().reveal('.titulo-Formulario', {origin: 'top'});
    ScrollReveal().reveal('h5, .col-lg-3, .card-text, .formulario__grupo', {origin: 'bottom'});
    ScrollReveal().reveal('.form-container, .formulario__grupo-input img', {origin: 'left'});
    ScrollReveal().reveal('.formulario__grupo-input', {origin: 'right'});