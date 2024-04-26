function showAlert(message, alertType, duration) {
    const alertElement = `
        <div class="alert alert-${alertType} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `;

    $('#alertContainer').html(alertElement);

    setTimeout(function() {
        $('.alert').alert('close'); // Закрываем alert
    }, duration);
}