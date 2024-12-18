$(document).ready(function () {
    $('#project-form').on('submit', function (e) {
        e.preventDefault(); // Previene il comportamento predefinito del form

        const formData = $(this).serialize(); // Serializza i dati del form

        // Invia i dati al server tramite AJAX
        $.ajax({
            url: 'add_project.php',
            method: 'POST',
            data: formData,
            success: function (response) {
                const project = JSON.parse(response);

                // Aggiunge il nuovo progetto alla lista senza ricaricare
                $('#project-list ul').prepend(`
                    <li>
                        <h3>${project.titolo}</h3>
                        <p>${project.descrizione}</p>
                        ${project.url_immagine ? `<img src="${project.url_immagine}" alt="Immagine Progetto">` : ''}
                        <a href="${project.link_progetto}">Visita il Progetto</a>
                    </li>
                `);

                // Reset del form
                $('#project-form')[0].reset();
            },
            error: function () {
                alert('Errore durante l\'aggiunta del progetto. Riprova.');
            }
        });
    });
});
