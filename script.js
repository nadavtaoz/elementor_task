$(document).ready(() => {

    const serverUrl = '/nadav/server.php';
    const overlay = $('#overlay');
    const popupContainer = $('#popup-container');

    /**
     * Open the popup and fetch info from the server
     * @param id
     */
    window.openPopup = (id) => {
        overlay.css('visibility', 'visible');
        overlay.fadeTo('fast', 1);

        $.get(`${serverUrl}?id=${id}`)
            .then(res => popupContainer.text(res))
            .catch(err => {
                let msg = `Error: ${err.responseJSON}`;
                popupContainer.text(msg);
                console.error(msg);
            });
    }

    /**
     * Close the popup
     */
    window.closePopup = () => {
        overlay.fadeTo('fast', 0);
        overlay.css('visibility', 'hidden');
    }
})
